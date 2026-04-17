<section class="bg-white px-4 py-20 sm:px-6 md:py-28 lg:px-8">
    <div class="mx-auto max-w-6xl">
        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="relative order-2 lg:order-1">
                <div class="overflow-hidden rounded-lg shadow-[0_24px_70px_rgba(15,23,42,0.16)]">
                    <img src="{{ asset('frontend/images/introduction.png') }}" alt="Comfortable hostel room preview" class="aspect-[4/3] w-full object-cover">
                </div>
                <div class="absolute -bottom-6 left-6 right-6 rounded-lg border border-slate-200 bg-white/95 p-5 shadow-xl backdrop-blur">
                    <div class="grid grid-cols-3 divide-x divide-slate-200 text-center">
                        <div>
                            <p class="text-2xl font-bold text-slate-950">50+</p>
                            <p class="mt-1 text-xs font-medium text-slate-500">Listings</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-slate-950">3</p>
                            <p class="mt-1 text-xs font-medium text-slate-500">Key Areas</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-slate-950">24/7</p>
                            <p class="mt-1 text-xs font-medium text-slate-500">Access</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-1 space-y-7 lg:order-2">
                <div class="space-y-4">
                    <p class="text-sm font-semibold uppercase text-blue-700">GB Hosteler</p>
                    <h2 class="max-w-2xl text-3xl font-semibold leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        A simpler way to compare hostels before you visit.
                    </h2>
                </div>

                <p class="max-w-2xl text-lg leading-8 text-slate-600">
                    GB Hosteler brings local hostel options into one clear place, so students and travelers can compare locations, preferences, rooms, and contact details without jumping between scattered posts.
                </p>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-5">
                        <i class="fas fa-location-dot mb-4 text-xl text-blue-600"></i>
                        <h3 class="font-semibold text-slate-950">Area first</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Shortlist hostels around Gilgit, Jutial, and Danyor quickly.</p>
                    </div>
                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-5">
                        <i class="fas fa-circle-check mb-4 text-xl text-emerald-600"></i>
                        <h3 class="font-semibold text-slate-950">Clear details</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Review essential stay information before making contact.</p>
                    </div>
                </div>

                <a href="{{ route('hostels') }}" class="inline-flex items-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-blue-700">
                    Explore hostels
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>
    </div>
</section>
