@extends("frontend.layout.main")

@section('main-container')
<div class="gallery-main">
    <h2>Hostels Results:</h2>
    <div class="filter-buttons"></div>

    <div class="gallery">
        <div class="grid-container">
            @if (count($results) > 0)
                @foreach ($results as $hostel)
                    <div class="grid-item" data-category="category1">
                        <img src="/{{ $hostel->hostel_image }}" style="width:80px;" alt="">
                        <div class="overlay">
                            <a href="{{ route('hostel-detail', ['id' => $hostel->id]) }}">
                                <div class="overlay-content">{{ $hostel->name }}</div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No results found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
