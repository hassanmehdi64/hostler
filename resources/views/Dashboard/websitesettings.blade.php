@extends('Dashboard.master-layout')
@section('content')




@if(session('message'))
<div style="width:100%; padding:7px; color: #ffffff; background-color: rgba(6, 109, 6, 0.555); text-align: center" id="messageAlert">
    {{ session('message') }}
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

<h1>Website Settings</h1>
        <form id="blogForm" action="{{ route('setting-update' , $settings->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="blogTitle">Website Title:</label>
            <input type="text" id="blogTitle" name="title" name="name" value="{{ $settings->name }}" required>
            @error('title')
                <span style="color: red;">{{ $message }}</span>
            @enderror

            <br>

            <label for="author">Logo:</label>

            <img width="20px" src="/{{ $settings->logo }}" alt="">

            <input type="file" name="logo" id="author" name="author" required>
            @error('author')
                <span style="color: red;">{{ $message }}</span>
            @enderror


            <br>
            <label for="publishDate">Description:</label>
            <textarea type="text" id="publishDate"  name="description" required>  {{ $settings->description }}  </textarea>
            @error('publish_date')
                <span style="color: red;">{{ $message }}</span>
            @enderror

            <br>

            <label for="publishDate">Email:</label>
            <input type="email" id="publishDate"  value="{{ $settings->email }}" name="email" required>
            @error('publish_date')
                <span style="color: red;">{{ $message }}</span>
            @enderror



            <label for="publishDate">Facebook:</label>
            <input type="text" id="publishDate" value="{{ $settings->facebook }}" name="facebook" required>
            @error('publish_date')
                <span style="color: red;">{{ $message }}</span>
            @enderror



            <label for="publishDate">Linkedin:</label>
            <input type="text" id="publishDate" value="{{ $settings->linkedin }}" name="linkedin" required>
            @error('publish_date')
                <span style="color: red;">{{ $message }}</span>
            @enderror


            <label for="publishDate">Twitter:</label>
            <input type="text" id="publishDate" value="{{ $settings->twitter }}" name="twitter" required>
            @error('publish_date')
                <span style="color: red;">{{ $message }}</span>
            @enderror



            <label for="publishDate">Contact Number:</label>
            <input type="text" id="publishDate" value="{{ $settings->phone }}" name="phone" required>
            @error('publish_date')
                <span style="color: red;">{{ $message }}</span>
            @enderror




            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
