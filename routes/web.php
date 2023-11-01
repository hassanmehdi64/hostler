<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController ;
use App\Http\Controllers\frontend\HostelsViewController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\HostelManager;
use App\Http\Controllers\usersController;
use App\Http\Controllers\UsersmanageController;
use App\Models\Blog;
use App\Models\ContactUs;
use App\Models\Hostels;
use App\Models\RoomSystem;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// working for dashboard

Route::get('messages' , function (){
    $messages  =  ContactUs::all();


return view('Dashboard.clientmessages' , compact('messages'));

    // return view('' , );
})->name('messages');


Route::get('feedbacks' , function (){
    $feedbacks  =  \App\Models\Feedback::all();


return view('Dashboard.feedbacks' , compact('feedbacks'));

    // return view('' , );
})->name('feedbacks');



Route::get('feedback-delete/{id}' , function ($id){
      \App\Models\Feedback::destroy($id);

      return back()->with('message' , "Removed Successfully");



    // return view('' , );
})->name('feedbacksdelete');









// working from hompage


Route::get('feedback' , function (){

    return view('Dashboard.submitfeedback');

})->name('submitfeedback');

Route::post('feedback' , function (){

if(request()->hasFile('profile')){

  $file =   request()->file('profile');
  $filename =  $file->getClientOriginalName();
  $path = 'feedbackimages/';
  $name = $path . $filename;
  $file->move($path ,  $name);



  \App\Models\Feedback::create([
    'name'  => request('name'),
    'profile' =>  $name,
    'feedback' =>  request('feedback'),
  ]);


return back()->with('message' , 'Feedback Submitted Successfully');

}
})->name('donefeedaback');



Route::post('contact' , function (){

// return  request()->all();

\App\Models\ContactUs::create(request()->all());

return back()->with('message' , "You Form Submitted Successfully We will Reach You Soon!");

})->name('contactus');




// worked
Route::get('adduser' , function (){


    Settings::create([
        'name' => "name",
        'logo' => "logo",
        'email' => "email",
        'description' => "description",
        'facebook' => "facebook",
        'linkedin' => "linkedin",
        'twitter' => "twitter",
        'phone' => "phone",
    ]);

    User::create([
        'name' => 'test',
        'email' => 'test@gmail.com',
        'password' => Hash::make('test'),
        'phone' => 'phone',
        'address' => 'address',
        'role' => 1,
        'status' => 1

    ]);
});







Route::get('/hostel/{category}', [HostelsViewController::class, 'categoryhostel'])->name('categoryhostel');




Route::get('/', [HostelsViewController::class, 'index']);


Route::get('search', function (Request $request) {

if(!$request->input('search')){

  return redirect()->back();

}

    $keywords = $request->input('search');
    $gender = $request->input('gender');
    $location = $request->input('location');

    // Initialize a query builder for the 'Hostels' model
    $query = Hostels::query();

    // Perform a multi-keyword search
    if (!empty($keywords)) {
        $query->where(function ($query) use ($keywords) {
            $query->where('name', 'like', "%$keywords%")
                  ->orWhere('location', 'like', "%$keywords%")
                  ->orWhere('gender', 'like', "%$keywords%");
        });
    }

    // Filter by gender and location
    if (!empty($gender)) {
        $query->where('gender', $gender);
    }

    if (!empty($location)) {
        $query->where('location', $location);
    }

    // Get the results
     $results = $query->get();
    $settings = Settings::find(1);


    return view('frontend.search-results', compact('results' , 'settings'));
})->name('searchhere');





Route::get('/about', [HostelsViewController::class, 'about']);
Route::get('/gallery', [HostelsViewController::class, 'gallery']);
Route::get('/blogs', [HostelsViewController::class, 'blog']);
Route::get('all-hostels', [HostelsViewController::class, 'hostels'])->name('hostels');

Route::get('hostel-detail/{id}', [HostelsViewController::class, 'hostelsdetail'])->name('hostel-detail');


Route::get('/blog/{id}/{title}', [HostelsViewController::class, 'blogdetail'])->name('blogdetail');


Route::get('/settings', [HostelsViewController::class, 'settings'])->name('settings');
Route::post('setting-update' , function (){


    if(request()->hasFile('logo')){

   $file =       request()->file('logo');
   $filename =  $file->getClientOriginalName();

   $path = 'logos/';
   $name  = $path . $filename;
   $file->move($path , $name);
    }else{
       $settings =  Settings::find(1);
        $name =  $settings->logo;
    }

    Settings::where('id' , 1)->update([
        'name' => request('title'),
        'logo' => $name,
        'email' => request('email'),
        'description' => request('description'),
        'facebook' => request('facebook'),
        'linkedin' => request('linkedin'),
        'twitter' => request('twitter'),
        'phone' => request('phone'),
    ]);


    return back()->with('message' , "Settings Updated");

})->name('setting-update');

Route::get('/contact', [HostelsViewController::class, 'contact'])->name('contact');


// auth system
Route::middleware('guest')->group(function (){
    Route::get('register' , [AuthController::class , 'registerform']);
    Route::post('register' , [AuthController::class , 'register'])->name('register');
Route::get('login' , [AuthController::class , 'loginform']);
    Route::post('login' , [AuthController::class , 'dologin'])->name('login');
});

// auth system end


Route::middleware('auth')->group(function () {

//    manage user table
    Route::get('/users' , function(){

if(Auth::user()->role != 1){
    return back();
}

        return view('Dashboard.users' , ['users' => User::all()]);
    })->name('users-manage');


    // manage user post methoid
    Route::post('user-manage/{id}' , function ($id){

         User::where('id' , $id)->update([
            'status' => request('status')
        ]);

         return back()->with('message' , 'User Updated Successfully');

    });


    // user update hostel
    Route::get('user-manage-hostel' , function () {

$user   =   User::find(Auth::user()->id);

$hostel =   $user->addhostel()->get();

return view('Dashboard.user-update-hostel' , ['hostele' => $hostel]);


    });



    // cms routes
    Route::get('cms' , [DashboardController::class , 'cms'])->name('cms');


    // Route::get('my-dashboard' ,[DashboardController::class , 'dashboard'])->name('dashboard');
    Route::get('dashoard-home' ,[DashboardController::class , 'dashboard_home'])->name('dashboard_home');
    Route::get('add-hostel' , [DashboardController::class , 'index'])->name('add-hostel');
    Route::post('add-hostel' , [DashboardController::class , 'store'])->name('add-hostel');
    Route::get('hostels-list' , [DashboardController::class , 'hostels'])->name('hostels-list');

    Route::get('delete-hostel' , [HostelController::class , 'deletehostel'])->name('delete-hostel');
    Route::get('edit-hostel' , [HostelController::class , 'edithostel'])->name('edit-hostel');
    Route::post('updated-hostel' , [HostelController::class , 'updatedhostel'])->name('updated-hostel');

   //ADD Blogs
    Route::get('add-blog' , [BlogController::class , 'add_blog'])->name('newblogadd');
    Route::post('add-blog' , [BlogController::class , 'store'])->name('add_blog');
    Route::get('view-blog' , [BlogController::class , 'view_blog'])->name('view_blog');

    Route::get('delete-blog' , [BlogController::class , 'deleteblog'])->name('delete-blog');
    Route::get('edit-blog' , [BlogController::class , 'editblog'])->name('edit-blog');
    Route::post('updated-blog/{id}' , [BlogController::class , 'updateblog'])->name('updated-blog');

   //ADD Gallery
    Route::get('add-gallery/{id}/{name}' , [GalleryController::class , 'showgallery'])->name('add_gallery');
    Route::get('view-gallery/{id}/{name}' , [GalleryController::class , 'galleryhostel'])->name('galleryhostel');



    Route::get('view-galleries' , [GalleryController::class , 'viewgallaris'])->name('view-galleries');
    Route::post('add-gallery/{id}' , [GalleryController::class , 'store']);

    Route::get('gallaries/edit/{id}' , [GalleryController::class , 'editgallary'])->name('editgallary');
    Route::get('delete-gallery', [GalleryController::class , 'deletegallary'])->name('deletegallary');
    Route::put('update-gallery/{id}' , [GalleryController::class , 'updategallary'])->name('update-gallery');


    // hostel routs
    Route::get('hostel' , [HostelController::class , 'hostels']);

// Profile
    Route::get('user-profile' , [usersController::class, 'index'])->name('profile-setting');
    Route::post('user-profile' , [usersController::class, 'store'])->name('profile-update');
    Route::post('users' , [usersController::class, 'users'])->name('users');
    Route::get('update-users/{id}/{name}' , [usersController::class, 'updateuser'])->name('updateuser');
    Route::post('update-users/{id}' , [usersController::class, 'updateusernow'])->name('update-user');
    Route::get('delete-users/{id}' , [usersController::class, 'deleteuser'])->name('deleteuser');


 // Hostels manger routes
    Route::get('hostel/manager/profile' , [HostelManager::class, 'profile'])->name('managerprofile');
    Route::get('hostel/manager/hostel-view/' , [HostelManager::class, 'showhostel'])->name('showhostel');
    // Route::get('hostel/manager/hostel-update/{id}' , [HostelManager::class, 'edit'])->name('manageredithostel');
    // Route::get('hostel/manager/hostel-create' , [HostelManager::class, 'create'])->name('manageraddhostel');

    Route::get('add-room/{id}/{name}' , function ($id , $name){

        $hostels_id = $id;
        return view('Dashboard.add-room' , compact('hostels_id'));
    })->name('addroom');



    Route::post('add-room/{id}' , function ($id){


if(request()->hasFile('image')){

$file =  request()->file('image');
$filename = $file->getClientOriginalName();

$path = 'roomimages/';

$name = $path . $filename;
$file->move($path , $filename);


}else{
    $name = "";
}
      
    RoomSystem::create([
        'name' => request('name'),
        'num' => request('num'),
        'image' => $name,
        'hostels_id' => $id
    ]);


    return back()->with('message'  , 'New Room Added Successfully');

    })->name('roomadddone');







    Route::get('view-rooms/{id}' , function ($id ){



  $rooms  =     \App\Models\RoomSystem::where('hostels_id' , $id)->get(); 


        return view('Dashboard.viewrooms' , compact('rooms'));
    })->name('viewroom');





    Route::get('profile' , [AuthController::class , 'profile'])->name('profile');
    Route::get('logout' , [AuthController::class , 'logout'])->name('logout');



});




