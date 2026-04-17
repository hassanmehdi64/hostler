@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Galleries</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">Hostel gallery</h1>
    <p class="mt-1 text-sm text-slate-600">Images uploaded for this hostel.</p>
  </div>

  <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
    @forelse($gallaries as $gallary)
      @foreach((array) json_decode($gallary->imageFiles) as $imageFile)
        <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
          <img src="{{ asset('Gallaries/' . $imageFile) }}" alt="{{ $gallary->hostelName }}" class="aspect-[4/3] w-full object-cover">
          <div class="p-4">
            <p class="font-semibold text-slate-950">{{ $gallary->hostelName }}</p>
            <p class="mt-1 text-sm text-slate-500">{{ $gallary->location }}</p>
          </div>
        </div>
      @endforeach
    @empty
      <div class="rounded-lg border border-slate-200 bg-white p-10 text-center text-slate-500 sm:col-span-2 lg:col-span-3">
        No gallery images found.
      </div>
    @endforelse
  </div>
</div>
@endsection
