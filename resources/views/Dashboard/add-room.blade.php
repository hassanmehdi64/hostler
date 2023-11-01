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
          <form action="{{ route('roomadddone', $hostels_id)  }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
              <i class="fas fa-pencil-alt"></i>
              <h2>Register New Room</h2>
            </div>
            <div class="info">
              <label for="">Room Type </label>
              <select name="name" id="">
                <option value="normal">Normal</option>
                <option value="special">Special</option>
              </select>





             <label for="">Number Of Beds</label>
              <select name="num" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>

              <label for="">Room Image</label>
              <input type="file" name="image" >



            </div>

            <button type="submit" >Submit</button>
          </form>
</div>
        </div>



@endsection
