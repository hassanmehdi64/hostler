@extends("frontend.layouts.app")

@section('main-container')

<section class="bg-white px-4 py-16 sm:px-6 md:py-24 lg:px-8">
  <div class="mx-auto max-w-6xl">
    <div class="max-w-3xl">
      <p class="text-sm font-semibold uppercase text-blue-700">Gallery</p>
      <h1 class="mt-3 text-4xl font-semibold leading-tight text-slate-950 sm:text-5xl">
        Hostel photos by location
      </h1>
      <p class="mt-5 text-base leading-8 text-slate-600 sm:text-lg">
        Browse photos from listed hostels and get a clearer look at rooms, buildings, and surrounding areas before opening a hostel detail page.
      </p>
    </div>

    <div class="mt-8 flex flex-wrap gap-3">
      <a href="{{ route('categoryhostel', 'Jutial') }}" class="inline-flex items-center gap-2 rounded-full bg-slate-950 px-5 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-blue-700">
        <i class="fas fa-location-dot text-xs"></i>
        Jutial
      </a>
      <a href="{{ route('categoryhostel', 'Gilgit') }}" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:-translate-y-0.5 hover:border-blue-200 hover:text-blue-700">
        <i class="fas fa-location-dot text-xs"></i>
        Gilgit
      </a>
      <a href="{{ route('categoryhostel', 'Danyor') }}" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:-translate-y-0.5 hover:border-blue-200 hover:text-blue-700">
        <i class="fas fa-location-dot text-xs"></i>
        Danyor
      </a>
    </div>
  </div>
</section>

<section class="bg-slate-50 px-4 py-16 sm:px-6 md:py-20 lg:px-8">
  <div class="mx-auto max-w-6xl">
    @php
      $hasImages = $gallaries->contains(function ($gallary) {
          return !empty(json_decode($gallary->imageFiles));
      });
    @endphp

    @if ($hasImages)
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($gallaries as $gallary)
          @foreach ((array) json_decode($gallary->imageFiles) as $imageFile)
            <article class="group overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
              <div class="aspect-[4/3] overflow-hidden bg-slate-200">
                <img src="{{ asset('Gallaries/' . $imageFile) }}" alt="{{ $gallary->hostelName }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
              </div>
              <div class="p-5">
                <h2 class="line-clamp-1 text-lg font-semibold text-slate-950">{{ $gallary->hostelName }}</h2>
                <p class="mt-2 flex items-center gap-2 text-sm text-slate-600">
                  <i class="fas fa-location-dot text-blue-600"></i>
                  {{ $gallary->location ?? 'Gilgit-Baltistan' }}
                </p>
              </div>
            </article>
          @endforeach
        @endforeach
      </div>
    @else
      <div class="rounded-lg border border-slate-200 bg-white p-12 text-center shadow-sm">
        <i class="fas fa-images mb-4 block text-5xl text-slate-300"></i>
        <h2 class="text-2xl font-semibold text-slate-950">No gallery photos available</h2>
        <p class="mt-2 text-slate-600">Hostel photos will appear here once they are added.</p>
      </div>
    @endif
  </div>
</section>

@endsection
