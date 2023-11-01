@extends("frontend.layout.main")

@section('main-container')
  <!-- <-----------------------
  Blog Page Section Start
  ------------------------->
  <header class="blog-header">
    <h2>Hostel Finder Blog</h2>
    <div class="blog-nav">
      <ul>
        <li><a href="/">Home =></a></li>
        <li><a >Blogs => </a></li>
        <li><a >{{ $blog->title }}</a></li>
      </ul>
    </div>
  </header>
  <main class="blog-content">
    <article>
      <h3>{{$blog->title}}</h3>
      <p>{{ $blog->author}}</p>

      {{ $blog->image }}
      <img src="/{{ $blog->image}}" alt="Blog Post Image">
      <p>{{ $blog->description}}</p>
    </article>


  </main>

    @endsection
