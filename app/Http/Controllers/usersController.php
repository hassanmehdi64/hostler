<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profileDetails;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
   function index( $id, $name){

     $user =  Auth::user();
    return view('Dashboard.HostelManagerPages.profile-view' , compact('user'));
   }


   function store(Request $request)
   {
       // Validate input
       $validatedData = $request->validate([
           'name' => 'required',
           'email' => 'required|email',
           'phone' => 'required',
           'address' => 'required',
           'image' => 'required|file|mimes:png,jpg',
       ]);

       // Handle image upload
       if($request->hasfile('image')){

        $file =  $request->file('image');
        $filename =  $file->getClientOriginalName();


        $path = 'images';
        $thename= $path . $filename;
    $file->move(public_path($path), $filename);


        profileDetails::create([
        "name" => request('name'),
        "email" => request('email'),
        "phone" => request('phone'),
        "address" =>  request('address'),
        "profile_image" =>$thename,
    ]);

    return back()->with('message', 'Profile Updated Successfuly.');

}

    }

function users()  {
    
 

  $users =   User::all();

  return  view('Dashboard.users' , compact('users'));

}

function updateuser($id , $name)  {

$edituser =  User::find($id);
    return view('Dashboard.HostelManagerPages.profile-view' , compact('edituser'));
}

function updateusernow($id  ,Request $request) {

    request()->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'address' => 'required',
    ]);






// Handle image upload
       if(request()->hasfile('image')){
        $file =  $request->file('image');
        $filename =  $file->getClientOriginalName();


        $path = 'images/';
        $thename= $path . $filename;
    $file->move(public_path($path), $filename);
}else{
    $thename = "image not  set ";
}



 $user =  User::find($id);

if($user->role == 0){

     User::where('id'  ,$id)->update([
        'name' => request('name'),
        'email' => request('email'),
        'image' => $thename,
        'phone' => request('phone'),
        'address' => request('address'),
      
    ]); 
 }else{
     User::where('id'  ,$id)->update([
        'name' => request('name'),
        'email' => request('email'),
        'image' => $thename,
        'phone' => request('phone'),
        'address' => request('address'),
        'status' => request('status'),
        'role' => request('role'),
    ]);
 }


   return   redirect(route('users'))->with('message' , "updated ");

}


function deleteuser($id)  {

   $user =   User::find($id);
    if($user->role == 1){

   return   redirect(route('users'))->with('message' , "Cannot Delete Admin ");
    }else{
        User::destroy($id);
   return   redirect(route('users'))->with('message' , "Deleted Succesfuly ");

    }




}
}
