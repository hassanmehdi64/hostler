@extends("frontend.layouts.app")

@section('main-container')

@php
  $hasGalleryImages = $gallaries->contains(function ($gallary) {
      return !empty(json_decode($gallary->imageFiles));
  });
@endphp

<section class="bg-white px-4 py-8 sm:px-6 md:py-10 lg:px-8">
  <div class="mx-auto max-w-6xl">
    <nav class="mb-8 flex flex-wrap items-center gap-2 text-sm text-slate-500">
      <a href="{{ url('/') }}" class="transition hover:text-blue-700">Home</a>
      <span>/</span>
      <a href="{{ route('hostels') }}" class="transition hover:text-blue-700">Hostels</a>
      <span>/</span>
      <span class="font-semibold text-slate-800">{{ $hostel->name }}</span>
    </nav>

    <div class="grid gap-8 lg:grid-cols-[1.35fr_0.65fr] lg:items-start">
      <div>
        <p class="text-sm font-semibold uppercase text-blue-700">Hostel Details</p>
        <h1 class="mt-3 text-4xl font-semibold leading-tight text-slate-950 sm:text-5xl">
          {{ $hostel->name }}
        </h1>
        <p class="mt-5 max-w-3xl text-base leading-8 text-slate-600">
          {{ $hostel->description }}
        </p>

        <div class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
          <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
            <i class="fas fa-location-dot text-blue-600"></i>
            <p class="mt-2 text-xs font-semibold uppercase text-slate-400">Location</p>
            <p class="mt-1 font-semibold text-slate-950">{{ $hostel->location }}</p>
          </div>
          <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
            <i class="fas fa-user-group text-blue-600"></i>
            <p class="mt-2 text-xs font-semibold uppercase text-slate-400">Preference</p>
            <p class="mt-1 font-semibold capitalize text-slate-950">{{ $hostel->gender }}</p>
          </div>
          <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
            <i class="fas fa-bed text-blue-600"></i>
            <p class="mt-2 text-xs font-semibold uppercase text-slate-400">Rooms</p>
            <p class="mt-1 font-semibold text-slate-950">{{ $rooms->count() ?? 0 }} listed</p>
          </div>
          <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
            <i class="fas fa-money-bill-wave text-blue-600"></i>
            <p class="mt-2 text-xs font-semibold uppercase text-slate-400">Rent</p>
            <p class="mt-1 font-semibold text-slate-950">{{ $hostel->hostel_rent ?? 'Contact' }}</p>
          </div>
        </div>
      </div>

      <aside class="rounded-lg border border-slate-200 bg-slate-50 p-5">
        <h2 class="text-lg font-semibold text-slate-950">Contact hostel</h2>
        <p class="mt-2 text-sm leading-6 text-slate-600">Call or email the manager to confirm rent, room availability, and facilities.</p>

        <div class="mt-5 rounded-lg border border-slate-200 bg-white p-4">
          <p class="text-xs font-semibold uppercase text-slate-400">Manager</p>
          <p class="mt-1 font-semibold text-slate-950">{{ $hostel->hostel_manager_name }}</p>
        </div>

        <div class="mt-4 space-y-3">
          <a href="tel:{{ $hostel->phone }}" class="flex items-center gap-3 rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-800 transition hover:border-blue-200 hover:text-blue-700">
            <i class="fas fa-phone text-blue-600"></i>
            {{ $hostel->phone }}
          </a>
          <a href="tel:{{ $hostel->mobile_number }}" class="flex items-center gap-3 rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-800 transition hover:border-blue-200 hover:text-blue-700">
            <i class="fas fa-mobile-screen text-blue-600"></i>
            {{ $hostel->mobile_number }}
          </a>
          @if($hostel->email)
            <a href="mailto:{{ $hostel->email }}" class="flex items-center gap-3 rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-800 transition hover:border-blue-200 hover:text-blue-700">
              <i class="fas fa-envelope text-blue-600"></i>
              <span class="truncate">{{ $hostel->email }}</span>
            </a>
          @endif
        </div>
      </aside>
    </div>
  </div>
</section>

<section class="bg-slate-50 px-4 py-8 sm:px-6 md:py-10 lg:px-8">
  <div class="mx-auto max-w-6xl">
    <div class="grid gap-5 lg:grid-cols-[1.55fr_0.45fr]">
      <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
        <img src="{{ asset($hostel->hostel_image) }}" alt="{{ $hostel->name }}" class="aspect-[16/9] w-full object-cover">
      </div>

      <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-1">
        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
          <span class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-50 text-blue-700">
            <i class="fas fa-circle-info"></i>
          </span>
          <h2 class="mt-5 text-lg font-semibold text-slate-950">Before you contact</h2>
          <p class="mt-2 text-sm leading-6 text-slate-600">Ask about current room availability, monthly rent, food, security, and rules before visiting.</p>
        </div>

        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
          <span class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
            <i class="fas fa-route"></i>
          </span>
          <h2 class="mt-5 text-lg font-semibold text-slate-950">Check the area</h2>
          <p class="mt-2 text-sm leading-6 text-slate-600">Confirm distance from your campus, workplace, market, or transport route.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="bg-white px-4 py-10 sm:px-6 md:py-12 lg:px-8">
  <div class="mx-auto max-w-6xl">
    <div class="mb-6 flex flex-col justify-between gap-4 md:flex-row md:items-end">
      <div>
        <p class="text-sm font-semibold uppercase text-blue-700">Rooms</p>
        <h2 class="mt-3 text-3xl font-semibold text-slate-950">Available rooms</h2>
      </div>
      <span class="text-sm font-semibold text-slate-500">{{ $rooms->count() ?? 0 }} room{{ ($rooms->count() ?? 0) === 1 ? '' : 's' }} listed</span>
    </div>

    @if($rooms->count() > 0)
      <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
        @foreach($rooms as $room)
          <article class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
            <div class="h-48 overflow-hidden bg-slate-200">
              <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="h-full w-full object-cover">
            </div>
            <div class="p-5">
              <h3 class="text-lg font-semibold text-slate-950">{{ $room->name }}</h3>
              <p class="mt-2 flex items-center gap-2 text-sm text-slate-600">
                <i class="fas fa-bed text-blue-600"></i>
                {{ $room->num }} bed{{ $room->num == 1 ? '' : 's' }}
              </p>
            </div>
          </article>
        @endforeach
      </div>
    @else
      <div class="rounded-lg border border-slate-200 bg-slate-50 p-10 text-center">
        <i class="fas fa-bed mb-3 block text-4xl text-slate-300"></i>
        <h3 class="font-semibold text-slate-950">No rooms listed yet</h3>
        <p class="mt-1 text-sm text-slate-600">Contact the manager for current room availability.</p>
      </div>
    @endif
  </div>
</section>

<section class="bg-slate-50 px-4 py-10 sm:px-6 md:py-12 lg:px-8">
  <div class="mx-auto max-w-6xl">
    <div class="mb-6">
      <p class="text-sm font-semibold uppercase text-blue-700">Gallery</p>
      <h2 class="mt-3 text-3xl font-semibold text-slate-950">More photos</h2>
    </div>

    @if($hasGalleryImages)
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($gallaries as $gallary)
          @foreach ((array) json_decode($gallary->imageFiles) as $imageFile)
            <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
              <img src="{{ asset('Gallaries/' . $imageFile) }}" alt="{{ $hostel->name }} gallery image" class="aspect-[4/3] w-full object-cover transition duration-500 hover:scale-105">
            </div>
          @endforeach
        @endforeach
      </div>
    @else
      <div class="rounded-lg border border-slate-200 bg-white p-10 text-center shadow-sm">
        <i class="fas fa-images mb-3 block text-4xl text-slate-300"></i>
        <h3 class="font-semibold text-slate-950">No gallery images yet</h3>
      </div>
    @endif
  </div>
</section>

@endsection
