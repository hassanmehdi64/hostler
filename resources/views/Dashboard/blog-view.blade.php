@extends('Dashboard.master-layout')
@section('content')




<h2 class="h-list-heading">Blogs List </h2>
<a href="{{ route('newblogadd') }}" >Add Blog</a>

@if(session('deletemessage'))
<div style="width:100%; padding:7px; color: #ffffff; background-color: rgba(109, 27, 6, 0.555); text-align: center" id="messageAlert">
 <span> {{ session('deletemessage') }}</span>
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

<div class="table-container">
    <table class="responsive-table">
        <thead>
            <tr>
                <th>Blog Title</th>
                <th>Author</th>
                <th>Publish Date</th>
                <th>Description</th>
                <th>Image</th>

                <th>Action</th>
            </tr>
        </thead>

        @foreach ($blogs as $blog )
      <tr>
        <td>{{$blog->title}}</td>
        <td>{{$blog->author}}</td>
        <td>{{$blog->publish_date}}</td>
        <td>{{$blog->description}}</td>
        <td>
            <img width="50px"  height="50px" src="/{{$blog->image}}" alt="data">
        </td>

        <td>
            <div class="d-flex">
                    <a href="{{ route('edit-blog', ['id'=>$blog->id ]) }}"> <button class="edit">Edit</button></a>
                    <a href="{{ route('delete-blog', ['id'=>$blog->id ]) }}"> <button class="delete">Delete</button></a>
            </div>
        </td>
          </tr>

          @endforeach
    </tbody>
  </table>


</div>

@endsection
