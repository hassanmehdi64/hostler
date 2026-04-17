@extends("frontend.layouts.app")

@section('main-container')

<section class="bg-white px-4 py-16 sm:px-6 md:py-24 lg:px-8">
  <div class="mx-auto max-w-6xl">
    <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
      <div class="max-w-3xl">
        <p class="text-sm font-semibold uppercase text-blue-700">Hostels</p>
        <h1 class="mt-3 text-4xl font-semibold leading-tight text-slate-950 sm:text-5xl">
          Available hostels
        </h1>
        <p class="mt-5 text-base leading-8 text-slate-600 sm:text-lg">
          Browse hostel listings, compare locations, and open the detail page when you find a stay that matches your needs.
        </p>
      </div>

      <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-700">
        <i class="fas fa-layer-group text-blue-600"></i>
        {{ $hostels->total() ?? 0 }} hostels found
      </div>
    </div>

    <div class="mt-8 flex flex-wrap gap-3">
      <a href="{{ route('categoryhostel', 'Jutial') }}" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:-translate-y-0.5 hover:border-blue-200 hover:text-blue-700">
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
    @if($hostels->count() > 0)
      <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($hostels as $hostel)
          <article class="group flex flex-col overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
            <div class="relative h-56 overflow-hidden bg-slate-200">
              <img src="{{ asset($hostel->hostel_image) }}" alt="{{ $hostel->name }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
              <div class="absolute bottom-3 left-3 inline-flex items-center gap-1 rounded-lg bg-white/95 px-3 py-1 text-xs font-medium text-slate-800">
                <i class="fas fa-location-dot text-blue-600"></i>
                {{ $hostel->location }}
              </div>
            </div>

            <div class="flex flex-1 flex-col p-5">
              <h2 class="line-clamp-2 text-xl font-semibold leading-7 text-slate-950 transition group-hover:text-blue-700">{{ $hostel->name }}</h2>
              <p class="mt-3 line-clamp-3 flex-1 text-sm leading-6 text-slate-600">{{ $hostel->description }}</p>

              <div class="mt-5 flex items-center justify-between border-t border-slate-200 pt-4">
                <div class="flex items-center gap-2 text-sm text-slate-600">
                  <i class="fas fa-bed text-blue-600"></i>
                  <span>{{ \App\Models\RoomSystem::where('hostels_id', $hostel->id)->count() ?? 0 }} rooms</span>
                </div>
                <a href="{{ route('hostel-detail', ['id' => $hostel->id]) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-700 transition hover:text-slate-950">
                  View
                  <i class="fas fa-arrow-right text-xs"></i>
                </a>
              </div>
            </div>
          </article>
        @endforeach
      </div>

      @if($hostels->hasPages())
        <div class="mt-12 flex justify-center">
          {{ $hostels->links() }}
        </div>
      @endif
    @else
      <div class="rounded-lg border border-slate-200 bg-white p-12 text-center shadow-sm">
        <i class="fas fa-building mb-4 block text-5xl text-slate-300"></i>
        <h2 class="text-2xl font-semibold text-slate-950">No hostels found</h2>
        <p class="mt-2 text-slate-600">Hostel listings will appear here once they are added.</p>
      </div>
    @endif
  </div>
</section>

@endsection
