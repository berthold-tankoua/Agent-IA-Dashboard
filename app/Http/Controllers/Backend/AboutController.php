<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Image;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    
    public function AboutView(){
        $abouts = About::latest()->get();
        return view('pages.about.about_view',compact('abouts'));
    } //End Method

    /*===========================================
    ADD ABOUT
    ===========================================*/

    public function AboutStore(Request $request){
        $request->validate([
        'phone'=>'required',
        'email'=>'required',
        'desc1'=>'required',

        ],[
            'phone'=>'saisir le numero telephone',
            'email'=>'saisir l email de l entreprise',
            'desc1'=>'saisir la description de l entreprise',
        ]);

           $about_img = $request->file('about_img');
            $name_gen = hexdec(uniqid()).'.'.$about_img->getClientOriginalExtension();
            Image::make($about_img)->resize(260,260)->save('upload/abouts/'.$name_gen);
            $save_url = 'upload/abouts/'.$name_gen;

            About::insert([
                'phone'=>$request->phone,
                'email'=>$request->email,
                'title1'=>$request->title1,
                'desc1'=>$request->desc1,
                'exp_count'=>$request->exp_count,
                'proj_count'=>$request->proj_count,
                'hcust_count'=>$request->hcust_count,
                'ucust_count'=>$request->ucust_count,
                'facebook_link'=>$request->flink,
                'instagram_link'=>$request->ilink,
                'linkeldin_link'=>$request->llink,
                'gitlab_link'=>$request->gitlink,
                'about_img'=>$save_url,
                'img_url'=> config('app.url').$save_url,
            ]);

            $notification = array(
                'message' =>'A propos inserer avec succes',
                'alert-type'=>'success'
            );

        return redirect()->back()->with($notification);
        
    } //End Method

    /*===========================================
    EDIT BRAND
    ===========================================*/

    public function AboutEdit($id){
        $about = About::findOrFail($id);
        return view('pages.about.about_edit',compact('about'));
    } //End Method

    public function AboutUpdate(Request $request){
        $about_id = $request->id;
        $old_img = $request->old_img; 

        $about_img = $request->file('about_img');

        if($request->file('about_img')){
            $name_gen = hexdec(uniqid()).'.'.$about_img->getClientOriginalExtension();
            Image::make($about_img)->resize(260,260)->save('upload/abouts/'.$name_gen);
            $save_url = 'upload/abouts/'.$name_gen;
            @unlink($old_img);
            About::findOrFail($about_id)->update([
                'phone'=>$request->phone,
                'email'=>$request->email,
                'title1'=>$request->title1,
                'desc1'=>$request->desc1,
                'exp_count'=>$request->exp_count,
                'proj_count'=>$request->proj_count,
                'hcust_count'=>$request->hcust_count,
                'ucust_count'=>$request->ucust_count,
                'facebook_link'=>$request->flink,
                'instagram_link'=>$request->ilink,
                'linkeldin_link'=>$request->llink,
                'gitlab_link'=>$request->gitlink,
                'about_img'=>$save_url,
                'img_url'=> config('app.url').$save_url,
            ]);
        }else{
            About::findOrFail($about_id)->update([
                'phone'=>$request->phone,
                'email'=>$request->email,
                'title1'=>$request->title1,
                'desc1'=>$request->desc1,
                'exp_count'=>$request->exp_count,
                'proj_count'=>$request->proj_count,
                'hcust_count'=>$request->hcust_count,
                'ucust_count'=>$request->ucust_count,
                'facebook_link'=>$request->flink,
                'instagram_link'=>$request->ilink,
                'linkeldin_link'=>$request->llink,
                'gitlab_link'=>$request->gitlink,
            ]);
        }

        $notification = array(
            'message' =>'Mise à jour effectuer avec succes',
            'alert-type'=>'info'
        );

        return redirect()->back()->with($notification);

    } //End Method
}
