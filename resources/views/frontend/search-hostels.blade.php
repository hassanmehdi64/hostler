@extends("frontend.layout.main")

@section('main-container')


    <!----------------------
        About section start"
       ----------------------->

       <div class="about-section">
      
       
    </div>

    <!-- hostel cads start-->
    <div class="hostel-by-location">
        <h2>Find Hostels By Location</h2>

        <div class="container">

       <div class="filter-buttons">
        <a href="{{ route('categoryhostel' , 'Jutial' ) }}" class="filter-button" data-filter="category1">Jutial</a>
        <a href="{{ route('categoryhostel' , 'Gilgit' ) }}" class="filter-button" data-filter="category2">Gilgit</a>
        <a href="{{ route('categoryhostel' , 'Danyore' ) }}" class="filter-button" data-filter="category3">Danyor</a>
      </div>


            <div class="hostel-container">


                @foreach ($hostels as $hostel )


                <div class="hostel-card">
                  <img src="/{{ $hostel->hostel_image }}" alt="Hostel Image 1">
                  <div class="hostel-details">
                    <h2>{{ $hostel->name }}</h2>
                    <a href="{{ route('hostel-detail', ['id'=>$hostel->id , 'name'=>$hostel->name]) }}">View Hostel</a>
                  </div>
                </div>

                @endforeach


          </div>
         </div>

         <!-- latest Blog Section -->


            </div>
            </div>

   @endsection







