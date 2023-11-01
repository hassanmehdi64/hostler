@extends('Dashboard.master-layout')
@section('content')


@if(session('message'))
<div style="width:100%; padding:7px; color: #ffffff; background-color: rgba(6, 109, 6, 0.555); text-align: center" id="messageAlert">
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


    <div class="blog-container">

        <h1>Submit a Feedback</h1>
    
        <form id="blogForm" action="{{ route('donefeedaback') }}" method="POST" enctype="multipart/form-data">
            @csrf
           
            <label for="blogTitle">Name:</label>
            <input type="text" value="{{Auth::user()->name}}" readonly id="blogTitle" name="name" required>
            @error('title')
                <span style="color: red;">{{ $message }}</span>
            @enderror

    
         
            <br>
    
            <label for="image">Image:</label>
            <input type="file" id="image" name="profile"  required>
            @error('image')
                <span style="color: red;">{{ $message }}</span>
            @enderror
    
            <br>
    
            <label for="description">Write Feedback Here:</label>
            <textarea id="description" name="feedback" rows="4" required></textarea>
            @error('description')
                <span style="color: red;">{{ $message }}</span>
            @enderror
    
            <br>



            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
