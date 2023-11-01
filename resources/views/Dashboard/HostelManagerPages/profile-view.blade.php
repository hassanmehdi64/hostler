
@extends('Dashboard.master-layout')
@section('content')


@isset($user)
<div class="user-container">
    @if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
    @endif
    <div class="user-content">
        <h1 id="profile-update-Heading">Profile Update</h1>
        <form id="profileForm" action="{{ route('profile-update') }}"  method="POST" enctype="multipart/form-data">
@csrf
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" value="{{ $user->name }}" name="name" required>
            </div>


            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="{{ $user->email }}" required>
            </div>

          


            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{ $user->phone }}" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="{{ $user->address }}" required>
            </div>

            <div class="form-group">
                <label for="profileImage">Profile Image:</label>
                <input type="file" id="profileImage" name="profileImage"  required>
            </div>

            <button type="submit" id="updateButton">Update Profile</button>
        </form>
    </div>
</div>

@endisset



{{-- edit user  --}}

@isset($edituser)
<div class="user-container">
    <div class="user-content">
        <h1 id="profile-update-Heading">Profile Update</h1>
        <form id="profileForm" action="{{ route('update-user' , $edituser->id) }}"  method="POST" enctype="multipart/form-data">
@csrf
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" value="{{ $edituser->name }}" name="name" required>
            </div>


            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" readonly name="email" value="{{ $edituser->email }}" required>
            </div>


   <div class="form-group">
                <label for="email">Profile:</label>
                <input type="file" id="email" name="image" value="" required>
            </div>


            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{ $edituser->phone }}" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="{{ $edituser->address }}" required>
            </div>

      

            @if(Auth::user()->role == 1)
            <div class="form-group">
                <label for="address">Status:</label>

                <select name="status" id="">
                    <option value="">Choose Status</option>
                    <option value="1">Active</option>
                    <option value="0">De-Active</option>
                </select>
            </div>


            <div class="form-group">
                <label for="address">Role:</label>
                <select name="role" id="">
                    <option value="">Choose role</option>
                    <option value="1">Admin</option>
                    <option value="0">Hostel Manager</option>
                </select>
            </div>
            @endif

            <button type="submit" id="updateButton">Update Profile</button>
        </form>
    </div>
</div>

@endisset


@endsection

