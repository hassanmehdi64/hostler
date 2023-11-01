<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Hostels;
use App\Models\Settings;

class HostelsViewController extends Controller
{
    public function index(){
  $blog =       Blog::latest()->limit(5)->get();
    $settings =  Settings::find(1);
  $feedbacks =   \App\Models\Feedback::all();

        return view('frontend.index' , compact('blog'  , 'settings' , 'feedbacks'));
    }



    public function gallery(){

        $gallaries =  Gallery::all();
        $settings =  Settings::find(1);
        return view('frontend.gallery' , ['gallaries' => $gallaries,
'settings' => $settings    ]);
    }



    public function contact(){
         $settings =  Settings::find(1);
        return view('frontend.contact' , compact('settings'));
    }



    function blog(){
         $settings =  Settings::find(1);
         $blogs =    Blog::all();

        return view('frontend.blog' , compact('settings' , 'blogs'));
    }

    function blogdetail($id , $title)  {

      $blog =   Blog::find($id);
 $settings =  Settings::find(1);

        return view('frontend.blogdetail' , compact('blog' , 'settings'));

    }


    function hostels()  {

   $hostels =      Hostels::all();
    $settings =  Settings::find(1);
        return view('frontend.all-hostel' , compact('hostels' , 'settings'));

    }


    function hostelsdetail($id)  {

    $hostel =      Hostels::find($id);
     $settings =  Settings::find(1);
   $rooms  =    \App\Models\RoomSystem::where('hostels_id' , $hostel->id)->get();

     $gallaries =  Gallery::where('hostel_id' , $id)->get();

        return view('frontend.hostel-detail' , compact('hostel' , 'settings' , 'gallaries' , 'rooms'));

    }

    public function about(){

      $hostels=   Hostels::limit(8)->get();
      $blog=   Blog::limit(8)->get();
       $settings =  Settings::find(1);

        return view('frontend.about', compact('hostels' , 'blog' , 'settings'));
            }




            function settings() {


               $settings =  Settings::find(1);


                return view('Dashboard.websitesettings' , compact('settings'));
            }




function categoryhostel($category)
{



$hostels= Hostels::where('location' , $category)->get();
$settings = Settings::find(1);

return  view('frontend.search-hostels' , compact('hostels' , 'settings'));

}

}
