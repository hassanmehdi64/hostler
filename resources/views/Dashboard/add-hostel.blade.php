@extends('Dashboard.master-layout')
@section('content')

@if(session('message'))
<div style="width:100%; padding:7px; color: #ffffff; background-color: rgba(32, 141, 5, 0.555); text-align: center" id="messageAlert">
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


<div class="main-block" id="register-hostel">
          <form action="{{ url('add-hostel')  }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
              <i class="fas fa-pencil-alt"></i>
              <h2>Register New Hostel</h2>
            </div>
            <div class="info">
              <label for="">Hostel Name </label>
              <input class="fname" type="text" name="name" placeholder="Full name" >
              <label for="">Location</label>
              <input type="text" name="location" placeholder="Enter Hostel Location">
              <label for="">Hostel Manager</label>
              <input type="text" name="hostel_manager_name" placeholder="Hostel Manager Name">
              <label for="">Phone Number </label>
              <input type="" name="phone" placeholder="Enter Contact Number">
              <label for="">Mobile Number</label>
              <input type="" name="mobile_number" placeholder="Enter Contact Number">
              <label for="">Email </label>
              <input type="email" name="email" placeholder="Enter Email">
              @error('email')
                  <span style="color: red;">{{ $message }}</span>
              @enderror


             <label for="">Select Gender</label>
              <select name="gender" id="">
                <option value="Male">Boys</option>
                <option value="Female">Girls</option>
              </select>

              <label for="">Rent Per Bed Price</label>
              <input type="number" name="hostel_rent" placeholder="Enter per Bed Price">

              <label for="">Hostel Image</label>
              <input type="file" name="hostel_image" placeholder="Password">

            </div>

            <button type="submit" href="/">Submit</button>
          </form>
</div>
        </div>



@endsection
