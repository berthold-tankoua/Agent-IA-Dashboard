<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AutoPublish;
use App\Models\Category;
use App\Models\Formation;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     /*===========================================
    HOME PAGE VIEW PAGE
    ===========================================*/
    public function index(){
      
        $about = About::where('id',1)->first();

        return view('welcome', compact('about')); 

    } //End Method



}
