@extends("frontend.layouts.app")

@section('main-container')

<article class="bg-white px-4 py-16 sm:px-6 md:py-24 lg:px-8">
  <div class="mx-auto max-w-3xl">
    <a href="{{ url('/blogs') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-700 transition hover:text-slate-950">
      <i class="fas fa-arrow-left text-xs"></i>
      Back to blogs
    </a>

    <header class="mt-8">
      <p class="text-sm font-semibold uppercase text-blue-700">Blog</p>
      <h1 class="mt-3 text-4xl font-semibold leading-tight text-slate-950 sm:text-5xl">
        {{ $blog->title }}
      </h1>
      <div class="mt-5 flex flex-wrap items-center gap-3 text-sm text-slate-500">
        <span class="inline-flex items-center gap-2">
          <i class="fas fa-user text-blue-600"></i>
          {{ $blog->author ?? 'GB Hosteler' }}
        </span>
        <span class="h-1 w-1 rounded-full bg-slate-300"></span>
        <span class="inline-flex items-center gap-2">
          <i class="fas fa-calendar text-blue-600"></i>
          {{ $blog->publish_date ? date('M d, Y', strtotime($blog->publish_date)) : 'Recently' }}
        </span>
      </div>
    </header>

    @if($blog->image)
      <div class="mt-10 overflow-hidden rounded-lg border border-slate-200 bg-slate-200 shadow-sm">
        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="aspect-[16/9] w-full object-cover">
      </div>
    @endif

    <div class="mt-10 space-y-6 text-base leading-8 text-slate-600">
      <p>{{ $blog->description }}</p>
    </div>
  </div>
</article>

@endsection
