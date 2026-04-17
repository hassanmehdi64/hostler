@extends("frontend.layouts.app")

@section('main-container')

<section class="bg-white px-4 py-16 sm:px-6 md:py-24 lg:px-8">
  <div class="mx-auto max-w-6xl">
    <div class="max-w-3xl">
      <p class="text-sm font-semibold uppercase text-blue-700">Blog</p>
      <h1 class="mt-3 text-4xl font-semibold leading-tight text-slate-950 sm:text-5xl">
        Hostel guides and local tips
      </h1>
      <p class="mt-5 text-base leading-8 text-slate-600 sm:text-lg">
        Read practical notes about finding hostels, comparing locations, planning your stay, and making better accommodation decisions in Gilgit-Baltistan.
      </p>
    </div>
  </div>
</section>

<section class="bg-slate-50 px-4 py-16 sm:px-6 md:py-20 lg:px-8">
  <div class="mx-auto max-w-6xl">
    @if($blogs->count() > 0)
      <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach($blogs as $post)
          <article class="group flex flex-col overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
            <div class="h-56 overflow-hidden bg-slate-200">
              @if($post->image)
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
              @else
                <div class="flex h-full w-full items-center justify-center text-slate-300">
                  <i class="fas fa-image text-5xl"></i>
                </div>
              @endif
            </div>

            <div class="flex flex-1 flex-col p-6">
              <div class="flex flex-wrap items-center gap-3 text-xs font-semibold uppercase text-slate-400">
                <span>{{ $post->author ?? 'GB Hosteler' }}</span>
                <span class="h-1 w-1 rounded-full bg-slate-300"></span>
                <span>{{ $post->publish_date ? date('M d, Y', strtotime($post->publish_date)) : 'Recently' }}</span>
              </div>

              <h2 class="mt-4 line-clamp-2 text-xl font-semibold leading-7 text-slate-950 transition group-hover:text-blue-700">{{ $post->title }}</h2>
              <p class="mt-3 line-clamp-3 flex-1 text-sm leading-6 text-slate-600">{{ $post->description }}</p>

              <a href="{{ route('blogdetail', ['id' => $post->id, 'title' => $post->title]) }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-blue-700 transition hover:text-slate-950">
                Read article
                <i class="fas fa-arrow-right text-xs"></i>
              </a>
            </div>
          </article>
        @endforeach
      </div>
    @else
      <div class="rounded-lg border border-slate-200 bg-white p-12 text-center shadow-sm">
        <i class="fas fa-newspaper mb-4 block text-5xl text-slate-300"></i>
        <h2 class="text-2xl font-semibold text-slate-950">No blogs found</h2>
        <p class="mt-2 text-slate-600">Guides and updates will appear here once they are added.</p>
        <a href="{{ url('/') }}" class="mt-6 inline-flex items-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-blue-700">
          Back to home
          <i class="fas fa-arrow-right text-xs"></i>
        </a>
      </div>
    @endif
  </div>
</section>

@endsection
