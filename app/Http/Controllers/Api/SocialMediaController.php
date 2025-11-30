<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\MediaPost;
use Illuminate\Support\Facades\Session;
use App\Models\MediaComment;

class SocialMediaController extends Controller
{

    public function GetUserInfo($userId){

        $pageId = '107858398796400' ?? null;
        $instaId = '17841457091857896';
        $access_token = 'EAAJUPSxVmIIBPKNh1GzUhSWqaIbMxPwjvU6tiw9CQOcnOmNlYfvpUAn1rmvBI3DWL9t7LXpXN7v3Ab2TlDQZAVNMNLQj2DddqBTxS80t768ysUZCikFaiLJRDohHzKxwIIHZBVPcsGrcuTIzCWgdDchQfc7OOgxzFFysoq0D2Im0UDZCN0pH0bpO4ZCzJVcASqErkU7ZAv8fa2jLtZBg70ZD';

        return [
            'pageId' => $pageId,
            'instaId' => $instaId,
            'access_token' => $access_token,
        ];

    }

    public function GetAllPosts($id){
        $posts = MediaPost::where('user_id', $id)->where('status', 'Attente')->latest()->get();
        return response()->json($posts);
    }
    public function GetAllComments($id){
        $comments = MediaComment::where('user_id', $id)->where('status', 'Attente')->wherenotnull('message')->latest()->get();
        return response()->json($comments);
    }

    public function CommentUpdate(Request $request,$id){

        if ($request->status) {
            MediaComment::findOrFail($id)->update([
                'status' => 'Terminé',
                'updated_at'    => Carbon::now()
            ]); 
        }
        return response('success');  
    }  

    public function facebookGetAllComments($userId){
        $comments = MediaComment::where('user_id', $userId)->where('status', 'Attente')->where('social_media', 'facebook')->latest()->get();
        return response()->json($comments);
    }

    public function facebookMediaPostStore($userId){
        $credential= $this->GetUserInfo($userId);
  
        $response = Http::get("https://graph.facebook.com/v19.0/" . $credential['pageId'] . "/posts", [
            'fields' => 'id,message,created_time',
            'limit' => 5,
            'access_token' => $credential['access_token']
        ]);

        if (!$response->successful()) {
            Log::error('Erreur récupération posts Facebook', ['response' => $response->body()]);
            return response()->json([
                'error' => 'Erreur lors de la récupération des publications.',
                'details' => $response->json()
            ], 400);
        }
      
        foreach ($response->json()['data'] as $post) {
            $postId = $post['id'];

            if (!MediaPost::where('post_id', $postId)->exists()) {
                MediaPost::create([
                    'user_id'      => $userId,
                    'social_media' => 'facebook',
                    'post_id'      => $postId,
                    'message'      => 'Publication Facebook',
                    'status'       => 'Attente',
                    'created_at'   => Carbon::now(),
                    'updated_at'   => Carbon::now(),
                ]);
            }
        }

        return response('success');
    }

    public function facebookMediaCommentStore($userId){
        $posts = MediaPost::where('user_id', $userId)->latest()->get();
        $credential= $this->GetUserInfo($userId);
        foreach ($posts as $post) {
            $postId = $post->post_id;

            $response = Http::get("https://graph.facebook.com/v19.0/{$postId}/comments", [
                'fields' => 'id,message,created_time',
                'limit' => 5,
                'access_token' => $credential['access_token']
            ]);

            if (!$response->successful()) {
                Log::error("Erreur récupération commentaires du post {$postId}", ['response' => $response->body()]);
                continue; // on passe au suivant
            }

            foreach ($response->json()['data'] as $comment) {
                $commentId = $comment['id'];

                if (!MediaComment::where('comment_id', $commentId)->exists()) {
                    MediaComment::create([
                        'user_id'      => $userId,
                        'social_media' => 'facebook',
                        'post_id'      => $postId,
                        'comment_id'   => $commentId,
                        'message'      => $comment['message'] ?? '',
                        'status'       => 'Attente',
                        'created_at'   => Carbon::now(),
                    ]);
                }
            }
        }

        return response('success');
    }

    public function facebookCommentUpdate(Request $request,$id){

        if ($request->status) {
            MediaComment::findOrFail($id)->where('social_media', 'facebook')->update([
                'status' => 'Terminé',
                'updated_at'    => Carbon::now()
            ]); 
        }
        return response('success');  
    }

    public function instagramGetAllComments($userId){
        $comments = MediaComment::where('user_id', $userId)->where('status', 'Attente')->where('social_media', 'instagram')->latest()->get();
        return response()->json($comments);
    }

    public function instagramMediaPostStore($userId){
        $credential= $this->GetUserInfo($userId);
        $response = Http::get("https://graph.facebook.com/v19.0/" . $credential['instaId'] . "/media", [
            'limit' => 5,
            'access_token' => $credential['access_token']
        ]);

        if (!$response->successful()) {
            Log::error('Erreur récupération posts Instagram', ['response' => $response->body()]);
            return response()->json([
                'error' => 'Erreur lors de la récupération des publications.',
                'details' => $response->json()
            ], 400);
        }
      
        foreach ($response->json()['data'] as $post) {
            $postId = $post['id'];

            if (!MediaPost::where('post_id', $postId)->exists()) {
                MediaPost::create([
                    'user_id'      => $userId,
                    'social_media' => 'instagram',
                    'post_id'      => $postId,
                    'message'      =>  'publication Instagram',
                    'status'       => 'Attente',
                    'created_at'   => Carbon::now(),
                 
                ]);
            }
        }

        return response('success');
    }

    public function instagramMediaCommentStore($userId){
        $credential= $this->GetUserInfo($userId);
        $posts = MediaPost::where('user_id', $userId)->where('social_media', 'instagram')->latest()->get();
        foreach ($posts as $post) {
            $postId = $post->post_id;

            $response = Http::get("https://graph.facebook.com/v19.0/{$postId}/comments", [
                'fields' => 'id,text',
                'limit' => 5,
                'access_token' => $credential['access_token']
            ]);

            if (!$response->successful()) {
                Log::error("Erreur récupération commentaires du post {$postId}", ['response' => $response->body()]);
                continue; // on passe au suivant
            }
            

            foreach ($response->json()['data'] as $comment) {
                $commentId = $comment['id'];

                if (!MediaComment::where('comment_id', $commentId)->exists()) {
                    MediaComment::create([
                        'user_id'      => $userId,
                        'social_media' => 'instagram',
                        'post_id'      => $postId,
                        'comment_id'   => $commentId,
                        'message'      => $comment['text'] ?? '',
                        'status'       => 'Attente',
                        'created_at'   => Carbon::now(),
                    ]);
                }
            }
        }

        return response('success');
    }

    public function instagramCommentUpdate(Request $request,$id){

        if ($request->status) {
            MediaComment::findOrFail($id)->where('social_media', 'instagram')->update([
                'status' => 'Terminé',
                'updated_at'    => Carbon::now()
            ]); 
        }
        return response('success');  
    }
}
