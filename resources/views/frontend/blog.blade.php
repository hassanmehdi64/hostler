@extends("frontend.layout.main")

@section('main-container')
  <!-- <-----------------------
  Blog Page Section Start
  ------------------------->
  <header class="blog-header">
    <h2>Hostel Finder Blog</h2>
    <div class="blog-nav">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Blogs</a></li>
        <li><a href="#">Detail</a></li>
      </ul>
    </div>
  </header>
  <main class="blog-content">

    @foreach($blogs as $post)

    

    <article>
      <h3>{{$post->title}}</h3>
      <p>Written by {{$post->author}} on {{$post->publish_date}}</p>
      <img src="/{{$post->image}}" alt="Blog Post Image">
      <p>{{$post->description}}</p>
    </article>
   @endforeach
  </main>

    @endsection
