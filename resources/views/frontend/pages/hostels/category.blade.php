@extends("frontend.layouts.app")

@section('main-container')

<section class="bg-white px-4 py-16 sm:px-6 md:py-24 lg:px-8">
  <div class="mx-auto max-w-6xl">
    <div class="max-w-3xl">
      <p class="text-sm font-semibold uppercase text-blue-700">Hostels By Location</p>
      <h1 class="mt-3 text-4xl font-semibold leading-tight text-slate-950 sm:text-5xl">
        Location results
      </h1>
      <p class="mt-5 text-base leading-8 text-slate-600 sm:text-lg">
        Browse hostels from the selected area and open a listing for room, gallery, and contact details.
      </p>
    </div>

    <div class="mt-8 flex flex-wrap gap-3">
      <a href="{{ route('hostels') }}" class="inline-flex items-center gap-2 rounded-full bg-slate-950 px-5 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-blue-700">
        <i class="fas fa-layer-group text-xs"></i>
        All hostels
      </a>
      <a href="{{ route('categoryhostel', 'Jutial') }}" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:-translate-y-0.5 hover:border-blue-200 hover:text-blue-700">
        Jutial
      </a>
      <a href="{{ route('categoryhostel', 'Gilgit') }}" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:-translate-y-0.5 hover:border-blue-200 hover:text-blue-700">
        Gilgit
      </a>
      <a href="{{ route('categoryhostel', 'Danyor') }}" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:-translate-y-0.5 hover:border-blue-200 hover:text-blue-700">
        Danyor
      </a>
    </div>
  </div>
</section>

<section class="bg-slate-50 px-4 py-16 sm:px-6 md:py-20 lg:px-8">
  <div class="mx-auto max-w-6xl">
    @forelse ($hostels as $hostel)
      @if ($loop->first)
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
      @endif
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
              <div class="mt-5 border-t border-slate-200 pt-4">
                <a href="{{ route('hostel-detail', ['id' => $hostel->id]) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-700 transition hover:text-slate-950">
                  View hostel
                  <i class="fas fa-arrow-right text-xs"></i>
                </a>
              </div>
            </div>
          </article>
      @if ($loop->last)
        </div>
      @endif
    @empty
      <div class="rounded-lg border border-slate-200 bg-white p-12 text-center shadow-sm">
        <i class="fas fa-building mb-4 block text-5xl text-slate-300"></i>
        <h2 class="text-2xl font-semibold text-slate-950">No hostels found</h2>
        <p class="mt-2 text-slate-600">Try another location or browse all hostels.</p>
        <a href="{{ route('hostels') }}" class="mt-6 inline-flex items-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-blue-700">
          Browse all hostels
          <i class="fas fa-arrow-right text-xs"></i>
        </a>
      </div>
    @endforelse
  </div>
</section>

@endsection
