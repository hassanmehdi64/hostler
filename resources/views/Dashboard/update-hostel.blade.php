@extends('Dashboard.master-layout')
@section('content')

{{-- update hostel  --}}

@if($hostel)
<div class="main-block" id="register-hostel">
          <form action="{{ route('updated-hostel', ['id'=>$hostel->id]) }}" method="POST"
            enctype="multipart/form-data"
            >
            @csrf
            <div class="title">
              <i class="fas fa-pencil-alt"></i>
              <h2>Update Hostel</h2>   </div>

  <div style="margin-bottom: 20px">
     <a style="text-decoration: none; padding-right: 20px;margin-left: 14px" href="{{ route('add_gallery', ['id'=>$hostel->id , 'name'=>$hostel->name]) }}">Add Galllery</a>
   <a style="text-decoration: none" href="{{ route('galleryhostel', ['id'=>$hostel->id , 'name'=>$hostel->name]) }}">View Galllery</a>
  </div>


  <div style="margin-bottom: 20px">
    <a style="text-decoration: none; padding-right: 20px;margin-left: 14px" href="{{ route('addroom', ['id'=>$hostel->id , 'name'=>$hostel->name]) }}">Add New Room</a>

     <a style="text-decoration: none; padding-right: 20px;margin-left: 14px" href="{{ route('viewroom', ['id'=>$hostel->id]) }}">View Rooms</a>
 </div>


            <div class="info">
              <label for="">Hostel Name </label>

              <input class="fname" type="text" name="name" value="{{ $hostel->name }}" >
              <label for="">Location</label>
              <input type="text" name="location" value="{{ $hostel->location }}">
              <label for="">Hostel Manager</label>
              <input type="text" name="hostel_manager_name" value="{{ $hostel->hostel_manager_name }}">
              <label for="">Phone Number </label>
              <input type="" name="phone" value="{{ $hostel->phone }}">
              <label for="">Mobile Number</label>
              <input type="" name="mobile_number" value="{{ $hostel->mobile_number }}">
              <label for="">Email </label>
              <input type="email" name="email" value="{{ $hostel->email }}">

             <label for="">Select Gender</label>
              <select name="gender" id="" >
                <option value="Male">Boys</option>
                <option value="Female">Girls</option>
              </select>

              <label for="">Rent Per Bed Price</label>
              <input type="number" name="hostel_rent" value="{{ $hostel->hostel_rent }}">

              <label for="">Hostel Image</label>
              <input type="file" name="hostel_image" value="{{ $hostel->hostel_image }}">

            </div>

            <button type="submit" href="/">Submit</button>
          </form>
</div>
@endif
        </div>



@endsection
