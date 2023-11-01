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

<h1>Submit a Blog</h1>
        <form id="blogForm" action="{{ route('updated-blog' , $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="blogTitle">Blog Title:</label>
            <input type="text" id="blogTitle" name="title" value="{{ $blog->title }}" required>
            @error('title')
                <span style="color: red;">{{ $message }}</span>
            @enderror

            <br>

            <label for="author">Author:</label>
            <input type="text" value="{{ $blog->author }}" id="author" name="author" required>
            @error('author')
                <span style="color: red;">{{ $message }}</span>
            @enderror

            <br>

            <label for="publishDate">Publish Date:</label>
            <input type="date" id="publishDate" value="{{ $blog->publish_date }}" name="publish_date" required>
            @error('publish_date')
                <span style="color: red;">{{ $message }}</span>
            @enderror

            <br>

             <img width="40px" src="/image/{{ $blog->image }}" alt="">
            <label for="image">Image:</label>

            <input type="file" id="image" name="image">
            @error('image')
                <span style="color: red;">{{ $message }}</span>
            @enderror

            <br>

            <label for="description">Description:</label>
            <textarea id="description"  name="description" rows="4" required>
{{ $blog->description }}

            </textarea>
            @error('description')
                <span style="color: red;">{{ $message }}</span>
            @enderror

            <br>



            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
