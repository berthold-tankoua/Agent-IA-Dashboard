<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AutoPublish;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublicationController extends Controller
{
    public function PublicationTextView(){

        $publications = AutoPublish::where('extension','text')->latest()->get();
        return view('backend.publication.text.publication_view', compact('publications'));

    } //End Method
    public function PublicationTextAdd($item){

        $publications = AutoPublish::latest()->get();
        return view('backend.publication.text.publication_add', compact('publications','item'));

    } //End Method

    public function PublicationImageView(){

        $publications = AutoPublish::where('extension','image')->latest()->get();
        return view('backend.publication.image.publication_view', compact('publications'));

    } //End Method
    public function PublicationImageAdd($item){

        $publications = AutoPublish::latest()->get();
        return view('backend.publication.image.publication_add', compact('publications','item'));

    } //End Method

    public function PublicationVideoView(){

        $publications = AutoPublish::where('extension','video')->latest()->get();
        return view('backend.publication.video.publication_view', compact('publications'));

    } //End Method
    public function PublicationVideoAdd($item){

        $publications = AutoPublish::latest()->get();
        return view('backend.publication.video.publication_add', compact('publications','item'));

    } //End Method

    public function PublicationView(){

        $publications = AutoPublish::latest()->get();

        return view('backend.publication.publication_view', compact('publications'));

    } //End Method

    public function PublicationStore(Request $request){
        $request->validate([
            'title'=>'required',
            ],[
            'title.required'=>'saisir un titre',
        ]);

        $extension = $request->media_type;

        // Récupère tous les fichiers en une fois pour éviter les appels répétés
        $medias = $request->file('media');
        for ($i = 0; $i < count($request->title); $i++) {
            $mediaUrl = null;
            $modif = false;

            if (isset($medias[$i])) {
                $media = $medias[$i];
                $extension_raw = $media->getClientOriginalExtension();
                $name_gen = hexdec(uniqid()) . '.' . $extension_raw;

                $destinationPath = $extension === 'image'
                ? 'upload/medias/images/'
                : 'upload/medias/videos/';

                $media->move($destinationPath, $name_gen);
                $media_url = $destinationPath . $name_gen;

            }
            if ($extension === 'image' && !empty($request->modif_img[$i])) {
                $modif = true;
            }
            $publish_at = $request->publish_at ?? Carbon::now();
            $status = $request->publish_at ? 'Attente' : 'Prioritaire';
            // Insertion en base
            AutoPublish::insert([
                'user_id'         => Auth::id(),
                'title'         => $request->title[$i],
                'slug'          => strtolower(str_replace(' ', '-', $request->title[$i])),
                'prompt'        => $request->prompt[$i],
                'description'   => $request->description[$i],
                'media_url'     => $media_url,
                'modif_img'     => $modif,
                'extension'     => $extension,
                'status'        => $status,
                'social_media'  => $request->social_media,
                'publish_at'    => $publish_at,
                'created_at'    => Carbon::now(),
            ]);
        }

        $notification = array(
			'message' => 'Publication effectuée avec succès',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function PublicationDetail($id){

        $publication = AutoPublish::findOrFail($id);
        return view('backend.publication.publication_detail', compact('publication'));

    } //End Method
    public function PublicationEdit($id){
        $publication = AutoPublish::findOrFail($id);
        if ($publication->extension=='image') {
              return view('backend.publication.image.publication_edit', compact('publication'));
        } elseif($publication->extension=='video') {
              return view('backend.publication.video.publication_edit', compact('publication'));
        }else{
            return view('backend.publication.text.publication_edit', compact('publication'));
        }

    } //End Method
    public function PublicationUpdate(Request $request){

        $id = $request->id;
        $extension = $request->extension;
        $old_img = $request->old_img;
        $media = $request->file('media');

        if ($request->hasFile('media')) {
            @unlink($old_img);
            $extension_raw = $media->getClientOriginalExtension();
            // Détermine le type de fichier (image ou vidéo)
            if ($extension == 'image') {
                $modif_img = $request->modif_img;
                $destinationPath = 'upload/medias/images/';
            } elseif($extension == 'video') {
                $modif_img = null;
                $destinationPath = 'upload/medias/videos/';
            }else
            $name_gen = hexdec(uniqid()) . '.' . $extension_raw;
            $media->move($destinationPath, $name_gen);
            $media_url = $destinationPath . $name_gen;
        } else {
           $media_url =$old_img;
        }

        $publish_at = $request->publish_at ?? Carbon::now();
        $status = $request->publish_at ? 'Attente' : 'Prioritaire';

        $publication = AutoPublish::findOrFail($id);

        $data = [
            'title'        => $request->title,
            'slug'         => str()->slug($request->title),
            'prompt'       => $request->prompt,
            'description'  => $request->description,
            'social_media' => $request->social_media,
            'status'       => $status,
            'publish_at'   => $publish_at,
            'created_at'   => Carbon::now(),
        ];

        // Si c’est une image ou vidéo, on ajoute les champs liés au média
        if (in_array($extension, ['image', 'video'])) {
            $data['media_url'] = $media_url;
            $data['modif_img'] = $modif_img;
        }

        $publication->update($data);

        $notification = array(
            'message' =>'Mise à jour effectuée avec succès',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function PublicationDelete($id){

        $item = AutoPublish::findOrFail($id);

        unlink($item->media_url);
        AutoPublish::findOrFail($id)->delete();

        $notification = array(
            'message' =>'Publication Supprimé avec succès',
            'alert-type'=>'info'
        );
        return redirect()->route('publication.view')->with($notification);

    } //End Method

    public function downloadImageFromUrl(Request $request){
        $url = 'https://i.ibb.co/9mrtBWNK/file.jpg';

        $filename = uniqid() . '.' . pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
        $directory = 'upload/medias';
        $fullPath = $directory . '/' . $filename;

        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        if (!is_writable($directory)) {
            return response()->json(['error' => 'Le dossier n\'est pas accessible en écriture'], 500);
        }

        $data = @file_get_contents($url);

        if ($data === false || strlen($data) < 100) {
            return response()->json(['error' => 'Image vide ou inaccessible'], 400);
        }

        $handle = fopen($fullPath, 'w');

        if (!$handle) {
            return response()->json(['error' => 'Impossible d’ouvrir le fichier pour écriture'], 500);
        }

        fwrite($handle, $data);
        fclose($handle);

        return response()->json([
            'url' => asset('upload/medias/' . $filename),
            'filename' => $filename
        ]);
    }
}
