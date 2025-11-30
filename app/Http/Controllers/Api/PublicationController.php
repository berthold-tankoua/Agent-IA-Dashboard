<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AutoPublish;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    //
    public function PublicationList($user_id){

        $user = User::where('id', $user_id)->first();
        $publications = AutoPublish::where('user_id',$user->id)->latest()->get();
        return response()->json([
            'user' => $user->only(['email','phone']),
            'publications' => $publications
        ]);
    }

    public function PublicationItem($id){

        $publication = AutoPublish::where('id',$id)->first();
        return response()->json([
            'publication' => $publication->only(['title','description','media_url','social_media'])
        ]);
    }

    public function PublicationMediaUpdate(Request $request,$id){
        // $url= 'https://i.ibb.co/9mrtBWNK/file.jpg';
        $url= $request->fileurl;
        $response = Http::get($url);

        if (!$response->successful()) {
            return response()->json(['error' => 'Échec du téléchargement'], 400);
        }

        if ($request->extension=='image') {
            $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
            $filename = uniqid() . '.' . $extension;
            $path = 'upload/medias/images' . $filename;
            file_put_contents($path, $response->body());
            $url = 'upload/medias/images' . $filename;
        }elseif($request->extension=='video') {
            $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'mp4';
            $filename = uniqid() . '.' . $extension;
            $path = 'upload/medias/videos' . $filename;
            file_put_contents($path, $response->body());
            $url = 'upload/medias/videos' . $filename;
        }else{

        }

        AutoPublish::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'media_url' => $url,
            'status' => 'Attente',
            'updated_at'    => Carbon::now()
         ]);

         $publication = AutoPublish::where('id',$id)->first();
         Notification::insert([
            'user_id'  => $publication->user_id,
            'post_id'  => $publication->id,
            'media_type'  => $publication->extension,
            'description'   => 'Modification du media via IA a été appliquée avec succès',
            'status'   => 'Attente',
            'created_at'    => Carbon::now(),
         ]);

         return response('success');

    }

    public function PublicationUpdate(Request $request,$id){

        if ($request->status) {
            AutoPublish::findOrFail($id)->update([
                'status' => 'Publié',
                'updated_at'    => Carbon::now()
            ]);
        } elseif($request->title && $request->description) {
            AutoPublish::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => 'Attente',
                'updated_at'    => Carbon::now()
            ]);

            $publication = AutoPublish::where('id',$id)->first();
            Notification::insert([
                'user_id'  => $publication->user_id,
                'post_id'  => $publication->id,
                'media_type'  => $publication->extension,
                'description'   => 'Modification texte via IA a été appliquée avec succès',
                'status'   => 'Attente',
                'created_at'    => Carbon::now(),
            ]);
        }
        return response('success');
    }
}
