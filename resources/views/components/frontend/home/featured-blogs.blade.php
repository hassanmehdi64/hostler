@props(['blogs'])

<section class="bg-slate-50 px-4 py-20 sm:px-6 md:py-28 lg:px-8">
    <div class="mx-auto max-w-6xl">
        <div class="mb-12 flex flex-col justify-between gap-6 md:flex-row md:items-end">
            <div>
                <p class="text-sm font-semibold uppercase text-blue-700">Guides</p>
                <h2 class="mt-3 text-3xl font-semibold text-slate-950 sm:text-4xl">Helpful reads before you book</h2>
            </div>
            <p class="max-w-xl text-base leading-7 text-slate-600">Practical notes for choosing a room, comparing locations, and planning a more comfortable stay.</p>
        </div>

        @forelse ($blogs as $blog)
            @if ($loop->first)
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @endif
                    <article class="group overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                        <div class="h-56 overflow-hidden">
                            <img src="{{ asset('frontend/images/blog-img1.jpg') }}" alt="{{ $blog->title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </div>
                        <div class="space-y-4 p-6">
                            <p class="text-xs font-semibold uppercase text-slate-400">Hostel guide</p>
                            <h3 class="line-clamp-2 text-xl font-semibold leading-7 text-slate-950 transition-colors group-hover:text-blue-700">{{ $blog->title }}</h3>
                            <p class="line-clamp-3 text-sm leading-6 text-slate-600">{{ $blog->getshortdescription() }}</p>
                            <a href="{{ route('blogdetail', ['id' => $blog->id, 'title' => $blog->title]) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-700 transition hover:text-slate-950">
                                Read article
                                <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </article>
            @if ($loop->last)
                </div>
            @endif
        @empty
            <div class="rounded-lg border border-slate-200 bg-white p-12 text-center shadow-sm">
                <i class="fas fa-newspaper mb-4 block text-5xl text-slate-300"></i>
                <h3 class="mb-2 text-2xl font-semibold text-slate-950">No blogs available</h3>
                <p class="text-slate-600">Featured blog posts will appear here once they are added.</p>
            </div>
        @endforelse
    </div>
</section>
