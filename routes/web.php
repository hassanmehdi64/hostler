<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HostelController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SetupController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FeedbackController;
use App\Http\Controllers\Frontend\HostelsViewController;
use App\Http\Controllers\Manager\HostelManagerController;
use App\Http\Controllers\Profile\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| The route file is grouped by feature so the public website, auth flow,
| and dashboard tools are easier to scan and maintain.
|
*/

// ==================== Public Website ====================

Route::get('/', [HostelsViewController::class, 'index']);
Route::get('/about', [HostelsViewController::class, 'about']);
Route::get('/gallery', [HostelsViewController::class, 'gallery']);
Route::get('/blogs', [HostelsViewController::class, 'blog']);
Route::get('/contact', [HostelsViewController::class, 'contact'])->name('contact');
Route::get('/hostel/{category}', [HostelsViewController::class, 'categoryHostel'])->name('categoryhostel');
Route::get('/blog/{id}/{title}', [HostelsViewController::class, 'blogDetail'])->name('blogdetail');
Route::get('all-hostels', [HostelsViewController::class, 'hostels'])->name('hostels');
Route::get('hostel-detail/{id}', [HostelsViewController::class, 'hostelsDetail'])->name('hostel-detail');
Route::get('search', [HostelsViewController::class, 'search'])->name('searchhere');

// ==================== Public Forms ====================

Route::get('feedback', [FeedbackController::class, 'create'])->name('submitfeedback');
Route::post('feedback', [FeedbackController::class, 'store'])->name('donefeedaback');
Route::post('contact', [ContactController::class, 'store'])->name('contactus');
Route::get('adduser', [SetupController::class, 'seedDefaults']);
Route::get('/settings', [SettingsController::class, 'show'])->name('settings');
Route::post('setting-update', [SettingsController::class, 'update'])->name('setting-update');

// ==================== Guest Authentication ====================

Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'showRegisterForm']);
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('login', [AuthController::class, 'showLoginForm']);
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

// ==================== Protected Dashboard ====================

Route::middleware('auth')->group(function () {
    Route::get('messages', [MessageController::class, 'index'])->name('messages');
    Route::get('feedbacks', [AdminFeedbackController::class, 'index'])->name('feedbacks');
    Route::get('feedback-delete/{id}', [AdminFeedbackController::class, 'destroy'])->name('feedbacksdelete');

    Route::get('/users', [UserManagementController::class, 'index'])->name('users-manage');
    Route::post('user-manage/{id}', [UserManagementController::class, 'updateStatus']);
    Route::get('user-manage-hostel', [UserManagementController::class, 'userHostels']);

    Route::get('cms', [DashboardController::class, 'cms'])->name('cms');
    Route::get('dashoard-home', [DashboardController::class, 'home'])->name('dashboard_home');
    Route::get('add-hostel', [DashboardController::class, 'createHostelForm'])->name('add-hostel');
    Route::post('add-hostel', [DashboardController::class, 'storeHostel'])->name('add-hostel');
    Route::get('hostels-list', [DashboardController::class, 'listHostels'])->name('hostels-list');

    Route::get('delete-hostel', [HostelController::class, 'destroy'])->name('delete-hostel');
    Route::get('edit-hostel', [HostelController::class, 'edit'])->name('edit-hostel');
    Route::post('updated-hostel', [HostelController::class, 'update'])->name('updated-hostel');

    Route::get('add-blog', [BlogController::class, 'create'])->name('newblogadd');
    Route::post('add-blog', [BlogController::class, 'store'])->name('add_blog');
    Route::get('view-blog', [BlogController::class, 'index'])->name('view_blog');
    Route::get('delete-blog', [BlogController::class, 'destroy'])->name('delete-blog');
    Route::get('edit-blog', [BlogController::class, 'edit'])->name('edit-blog');
    Route::post('updated-blog/{id}', [BlogController::class, 'update'])->name('updated-blog');

    Route::get('add-gallery/{id}/{name}', [GalleryController::class, 'create'])->name('add_gallery');
    Route::get('view-gallery/{id}/{name}', [GalleryController::class, 'hostelGallery'])->name('galleryhostel');
    Route::get('view-galleries', [GalleryController::class, 'index'])->name('view-galleries');
    Route::post('add-gallery/{id}', [GalleryController::class, 'store']);
    Route::get('gallaries/edit/{id}', [GalleryController::class, 'edit'])->name('editgallary');
    Route::get('delete-gallery', [GalleryController::class, 'destroy'])->name('deletegallary');
    Route::put('update-gallery/{id}', [GalleryController::class, 'update'])->name('update-gallery');

    Route::get('user-profile', [UserProfileController::class, 'show'])->name('profile-setting');
    Route::post('user-profile', [UserProfileController::class, 'store'])->name('profile-update');
    Route::post('users', [UserProfileController::class, 'indexUsers'])->name('users');
    Route::get('update-users/{id}/{name}', [UserProfileController::class, 'edit'])->name('updateuser');
    Route::post('update-users/{id}', [UserProfileController::class, 'update'])->name('update-user');
    Route::get('delete-users/{id}', [UserProfileController::class, 'destroy'])->name('deleteuser');

    Route::get('hostel/manager/profile', [HostelManagerController::class, 'profile'])->name('managerprofile');
    Route::get('hostel/manager/hostel-view/', [HostelManagerController::class, 'showHostel'])->name('showhostel');

    Route::get('add-room/{id}/{name}', [RoomController::class, 'create'])->name('addroom');
    Route::post('add-room/{id}', [RoomController::class, 'store'])->name('roomadddone');
    Route::get('view-rooms/{id}', [RoomController::class, 'index'])->name('viewroom');

    Route::get('profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
