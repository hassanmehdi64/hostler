@extends('Dashboard.master-layout')
@section('content')
@if(session('message'))
<div style="width:100%; padding:7px; color: #ffffff; background-color: rgba(209, 79, 18, 0.555); text-align: center" id="messageAlert">
 <span> {{ session('message') }}</span>
</div>
@endif


<script>
    // Check if the message alert exists
    var messageAlert = document.getElementById('messageAlert');
    if (messageAlert) {
        // Add a duration of 5000ms (5 seconds)
        setTimeout(function () {
            messageAlert.remove();
        }, 4000); // Adjust the duration as needed
    }
</script>

    <div class="dashboard">

        <a href="{{ route('add-hostel') }}">
            <div class="card card-add">
                <div class="icon">
                    <i class="ri-home-7-fill"></i>
                </div>
                <div class="name">Add Hostel</div>
            </div>
        </a>

        @if(Auth::user()->role ==0 )
        <a href="{{ route('showhostel') }}">
            <div class="card card-edit">
                <div class="icon">
                    <i class="ri-edit-box-fill"></i>
                </div>
                <div class="name">Edit Hostel</div>
            </div>
        </a>
@endif
        @if(auth()->user()->role  == 1)
        <a href="{{ route('view_blog') }}">
            <div class="card card-blog">
                <div class="icon">
                    <i class="ri-file-edit-fill"></i> <!-- Remix Icon for "Manage Blog" -->
                </div>
                <div class="name">Blogs</div>
            </div>
        </a>

        <a href="{{ route('view-galleries') }}">
            <div class="card card-gallery">
                <div class="icon">
                    <i class="ri-image-fill"></i> <!-- Remix Icon for "Manage Gallery" -->
                </div>
                <div class="name">Manage Gallery</div>
            </div>
        </a>



        <a href="{{ route('settings') }}">
            <div class="card card-settings">
                <div class="icon">
                    <i class="ri-settings-2-fill"></i> <!-- Remix Icon for "Settings" -->
                </div>
                <div class="name">Settings</div>
            </div>
        </a>


        <a href="{{ route('users-manage') }}">
            <div class="card card-users">
                <div class="icon">
                    <i class="ri-shield-user-line"></i> <!-- Remix Icon for "Settings" -->
                </div>
                <div class="name">Manage Users</div>
            </div>
        </a>

@endif


        <a href="{{ route('profile') }}">
            <div class="card card-profile">
                <div class="icon">
                    <i class="ri-user-follow-fill"></i>
                </div>
                <div class="name">Profile</div>
            </div>
        </a>






        <a href="{{ route('logout') }}">
            <div class="card card-logout">
                <div class="icon">
                    <i class="ri-logout-box-line"></i>
                </div>
                <div class="name">Logout</div>
            </div>
        </a>
    </div>
@endsection
