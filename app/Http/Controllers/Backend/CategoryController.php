<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
        /*===========================================
    CATEGORY PAGE VIEW PAGE
    ===========================================*/

    public function ctrCategoryView(){
        $categories = Category::orderBy('id','DESC')->get();
        return view('pages.category.category_view',compact('categories'));
    } //End Method

    /*===========================================
    ADD CATEGORY
    ===========================================*/

    public function ctrCategoryStore(Request $request){
        $request->validate([
         'name'=>'required',
         'image'=>'required',
        ],[
           'name.required'=>'Saisir le nom de la categorie',
           'image.required'=>'Inserer une Image',
        ]);

        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(52,52)->save('upload/categories/'.$name_gen);
            $save_url = 'upload/categories/'.$name_gen;

            Category::insert([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ','-',$request->name)),
                'image'=> $save_url,
                'desc1'=>$request->desc,
                'img_url'=> config('app.url').$save_url,
                'others'=> $request->top,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' =>'Category Inserted Successfully',
                'alert-type'=>'success'
            );

        }else{
            Category::insert([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ','-',$request->name)),
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' =>'Category Inserted Without Image Successfully',
                'alert-type'=>'success'
            );
        }

        return redirect()->back()->with($notification);

    } //End Method

    /*===========================================
    EDIT CATEGORY
    ===========================================*/

    public function ctrCategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('pages.category.category_edit',compact('category'));
    } //End Method

    /*===========================================
    UPDAPTE CATEGORY
    ===========================================*/

    public function ctrCategoryUpdate(Request $request){
        $id = $request->id;
        $old_img = $request->old_img; 

        $update_category = Category::findorFail($id);
        $update_category->name = $request->name;
        $update_category->desc1 = $request->desc;
        $update_category->slug = strtolower(str_replace(' ','-',$request->name));

        if($request->file('image')){
            @unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(52,52)->save('upload/categories/'.$name_gen);
            $save_url = 'upload/categories/'.$name_gen;
            $update_category['image'] = $save_url;
            $update_category['img_url'] = config('app.url').$save_url;
        }

        $update_category->save();

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notification);

    } //End Method

    /*===========================================
    DELETE CATEGORY
    ===========================================*/

    public function ctrCategoryDelete($id){
        $delete_category = Category::findOrFail($id);
        $cat_img = $delete_category->image;
        @unlink($cat_img);
        $delete_category->delete();

        $notification = array(
            'message' =>'Category Deleted Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('all.category')->with($notification);
    } //End Method
}
