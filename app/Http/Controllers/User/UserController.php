<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AutoPublish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserLoginView(){
        return view('auth.login');
    }

    function check(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:1|max:15'
        ]);
        $creds = $request->only('email','password');
        if(Auth::guard('web')->attempt($creds, $request->remember_me)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('user.login')->with('fail','Error');
        }
    }
    public function UserDashboard(){
        $publications = AutoPublish::latest()->get();
        return view('user.dashboard',compact('publications'));
    }
    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

    
}
