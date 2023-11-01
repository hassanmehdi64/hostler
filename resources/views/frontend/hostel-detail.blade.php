@extends("frontend.layout.main")

@section('main-container')
  <!-- <-----------------------
  Blog Page Section Start
  ------------------------->
  <header class="blog-header">
    <h2>Hostel Detail </h2>
    <div class="blog-nav">
      <ul>
        <li><a href="/">Home =></a></li>
        <li><a >Blogs => </a></li>
        <li><a >{{ $hostel->name }}</a></li>
      </ul>
    </div>
  </header>


  <main class="blog-content">
    <div id="hostel-details">
      <p id="hostel-name">{{$hostel->name}}</p>
      <p class="author">{{$hostel->author}}</p>
      <img src="/{{$hostel->hostel_image}}" alt="Blog Post Image" class="hostel-image">
      <p class="location">Location: {{$hostel->location}}</p>
      <p class="hostel-manager">Manager Name: {{$hostel->hostel_manager_name}}</p>
      <p class="phone">Phone: {{$hostel->phone}}</p>
      <p class="mobile-number">Mobile Number: {{$hostel->mobile_number}}</p>
      <p class="email">Email: {{$hostel->email}}</p>
      <p class="gender">Gender: {{$hostel->gender}}</p>


     
        <h4 id="roomsystem">Room System</h4>

      <table>
      
        <tbody>
           @foreach($rooms as $rooms)
          <tr>
     <td><img src="/{{$rooms->image}}" width="200px" alt="Blog Post Image" class="hostel-image"></td>
     <td><p class="email">Rooms Type: {{$rooms->name}}</p></td>
     <td><p class="email">Num Beds : {{$rooms->num}}</p></td>
  
     </tr>
     @endforeach
        </tbody>
      </table>

    
    </div>
  </main>


<!-- =========STYLING Table========= -->

<style>

  table{
    margin: auto;

  }

 #roomsystem{
 text-align: center;
font-size: 30px;
color: #214491;
padding-bottom: 16px;

  }
  
  table, th, td{
    border: 1px solid black;
    border-collapse: collapse;
  }

</style>






  <h4 class="gallery-heading">Galleries Related To this hostel</h4>

  <div class="grid-container" id="hostel-gallery">
    @foreach ($gallaries as $gallary)
    @if (json_decode($gallary->imageFiles))
      @foreach (json_decode($gallary->imageFiles) as $imageFile)
      <div class="grid-item" data-category="category1">
        <img class="gallery-image" src="/Gallaries/{{ $imageFile }}" alt="Image">
        {{-- <div class="overlay">
          {{-- <div class="overlay-content">{{ $gallary->hostelName }}</div>
        </div> --}}
      </div>
      @endforeach
    @endif
    @endforeach
  </div>


            </div>
    @endsection
