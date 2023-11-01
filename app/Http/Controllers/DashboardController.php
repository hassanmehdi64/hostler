<?php

namespace App\Http\Controllers;

use Algolia\AlgoliaSearch\RetryStrategy\Host;
use App\Models\Hostels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{







    function dashboard() {

        return view('Dashboard.master-layout');
    }


    function dashboard_home() {

        return view('Dashboard.dashboard');
    }

    function index() {

        $user =  Auth::user();

        if($user->role == 0 && $user->status == 1){
           $found =  Hostels::where('user_id' , $user->id)->first();
           if($found){
            return redirect(route('dashboard_home'))->with('message' , 'Hostel Exist Go To Edit Section');
           }

    }


        if($user->role == 0 && $user->status == 0){
                return back()->with('message' , 'You Account is not Active Yet');
        }

        if($user->role == 1 && $user->status == 0){
            return back()->with('message' , 'You are Not Active Admin');
         }



        $addhostel = 'add hostel';
        return view('Dashboard.add-hostel' , compact('addhostel'));
    }


    function store(Request $request)
    {

        $user =  Auth::user();

        if($user->role == 0 && $user->status == 1){
           $found =  Hostels::where('user_id' , $user->id)->first();
           if($found){
            return back()->with('message' , 'Hostel Exist Go To Edit Section');
           }
    }


        if(Auth::user()->role == 0 && Auth::user()->status == 0){
            return redirect('hostel/manager/hostel-view')->with('message' , 'Account  is Not Active Yet');
        }



        $request->validate([
            "email" => 'required|unique:hostels',
            "name" => 'required',
            "location" => 'required',
            "hostel_manager_name" => 'required',
            "phone" => 'required',
            "mobile_number" => 'required',
            "email" => 'required',
            "gender" => 'required',
            "hostel_rent" => 'required',
            "hostel_image" =>    'required',

        ]);


    if( $request->hasfile('hostel_image')){

  $file = $request->file('hostel_image');

  $filename = $file->getClientOriginalName();

  $path = 'hostels/';
  $name  = $path . $filename;

  $file->move($path, $name);

  $user_id =  Auth::user()->id;

        $addhostel = new Hostels();
        $addhostel->name = $request['name'];
        $addhostel->location = $request['location'];
        $addhostel->hostel_manager_name = $request['hostel_manager_name'];
        $addhostel->phone = $request['phone'];
        $addhostel->mobile_number = $request['mobile_number'];
        $addhostel->email = $request['email'];
        $addhostel->gender = $request['gender'];
        $addhostel->hostel_rent = $request['hostel_rent'];
        $addhostel->hostel_image =  $name;
        $addhostel->user_id =  $user_id;
        $addhostel->save();

        return redirect()->back()->with('message', 'New Hostel added successfully');
    }
    return redirect()->back()->with('message', 'Something went wrong');

}





        function hostels(){

            $hostels =   Hostels::all();
            return view('Dashboard.hostels-list' , compact('hostels'));
        }

        function cms()  {

           return view('Dashboard.cms');
        }


        function setting()  {

            return view();

        }

}

