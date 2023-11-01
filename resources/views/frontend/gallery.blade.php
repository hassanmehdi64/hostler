@extends("frontend.layout.main")

@section('main-container')
      <!----------------------
     Gallery section start"
       ----------------------->
       <div class="gallery-main">
        <h2>Hostels By Location </h2>
       <div class="filter-buttons">
        <a href="{{ route('categoryhostel' , 'Jutial' ) }}" class="filter-button" data-filter="category1">Jutial</a>
        <a href="{{ route('categoryhostel' , 'Gilgit' ) }}" class="filter-button" data-filter="category2">Gilgit</a>
        <a href="{{ route('categoryhostel' , 'Danyor' ) }}" class="filter-button" data-filter="category3">Danyor</a>
      </div>


      <div class="gallery">

        <div class="grid-container">
            @foreach ($gallaries as $gallary)
                    @if (json_decode($gallary->imageFiles))
                        @foreach (json_decode($gallary->imageFiles) as $imageFile)
                        <div class="grid-item" data-category="category1">
                         <img src="/Gallaries/{{ $imageFile }}" alt="Image">
                          <div class="overlay">
                            <div class="overlay-content">{{ $gallary->hostelName }}</div>
                          </div>
                        </div>
                        @endforeach
                        @endif
                        @endforeach



            </div>

      </div>
    </div>

 @endsection
