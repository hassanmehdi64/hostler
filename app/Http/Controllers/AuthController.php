<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    //register task
    public function registerform(){




        return view('frontend.Auth.register');
    }



    public function register(){



 request()->validate([
    'email' => 'required|unique:users',
    'password' => 'required',
]);


     $done =  User::create([
        'name' => request()->name ,
        'email' => request()->email ,
        'phone' => '' ,
        'address' => '',
        'password' => Hash::make(request()->password ),
        'role' => 0,
        'status' => 0,
      ]);

      if($done){
        return redirect('/login');
      }
      else{
        return back()->with('message' , 'Please Check Your Credentails ');
      }
    }

    // login task
    public function loginform(){


        return view('frontend.Auth.login');
    }


function dologin(){



    request()->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if(Auth::attempt([
        'email' => request()->email,
        'password' => request()->password
    ])){
        return redirect('/dashoard-home');
    }
    else{
        return redirect('/login');

    }

}



function logout(){

    Auth::logout();

    return redirect('/login');

}


function profile()  {

    $edituser = Auth::user();

    return view('Dashboard.HostelManagerPages.profile-view', compact('edituser'));

}

}
