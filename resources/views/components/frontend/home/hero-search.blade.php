<section class="home-premium-hero relative min-h-[calc(100vh-4rem)] overflow-visible px-4 py-16 sm:px-6 lg:px-8" aria-label="Hostel search hero">
    <div class="absolute inset-0">
        <div class="hero-slide hero-slide--one absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('hostels/Hostel1.jpg') }}');"></div>
        <div class="hero-slide hero-slide--two absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('Gallaries/CPEC Hostel.jpg') }}');"></div>
        <div class="hero-slide hero-slide--three absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('Gallaries/hunza.jpg') }}');"></div>
    </div>

    <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(7,16,29,0.64)_0%,rgba(12,28,45,0.42)_48%,rgba(10,20,30,0.24)_100%)]"></div>
    <div class="relative z-10 mx-auto flex min-h-[calc(100vh-13rem)] w-full max-w-6xl items-center">
        <div class="max-w-2xl pt-6 text-white">
            <p class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3.5 py-1.5 text-xs font-medium text-white/90">
                Trusted hostel discovery across Pakistan
            </p>

            <h1 class="max-w-2xl text-3xl font-semibold leading-tight tracking-normal sm:text-4xl lg:text-5xl">
                Find your next stay with confidence.
            </h1>

            <p class="mt-4 max-w-xl text-sm leading-7 text-white/82 sm:text-base">
                Search clean, student-friendly hostels by area and preference in one simple place.
            </p>

            <form action="{{ route('searchhere') }}" class="mt-7 w-full max-w-2xl">
                <div class="relative flex flex-col gap-2 rounded-2xl border border-white/25 bg-white/95 p-1.5 shadow-[0_22px_60px_rgba(7,16,29,0.24)] sm:flex-row sm:items-center sm:rounded-full">
                    <label class="flex min-h-11 flex-1 items-center gap-3 rounded-full px-3.5 text-slate-700 transition duration-300 focus-within:bg-slate-50" for="hero-search-input">
                        <i class="fas fa-search text-xs text-slate-400"></i>
                        <input
                            type="text"
                            name="search"
                            id="hero-search-input"
                            class="w-full bg-transparent text-sm font-medium text-slate-800 placeholder:text-slate-400 focus:outline-none"
                            placeholder="Search hostel, city, or area"
                        >
                    </label>

                    <details class="hero-filter-menu relative">
                        <summary class="flex h-11 w-11 cursor-pointer list-none items-center justify-center rounded-full bg-slate-100 text-slate-600 transition hover:bg-slate-200 focus:outline-none focus:ring-4 focus:ring-blue-100" aria-label="Search filters" title="Filters">
                            <i class="fas fa-sliders text-sm"></i>
                        </summary>

                        <div class="absolute right-0 top-14 z-50 max-h-[min(28rem,calc(100vh-9rem))] w-72 overflow-y-auto rounded-lg border border-slate-200 bg-white p-4 shadow-[0_18px_45px_rgba(15,23,42,0.18)]">
                            <div class="mb-4">
                                <div class="mb-2 flex items-center gap-2 text-xs font-semibold uppercase text-slate-500">
                                    <i class="fas fa-user-group text-slate-400"></i>
                                    Gender
                                </div>
                                <div class="grid grid-cols-3 gap-1 rounded-lg bg-slate-100 p-1">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="gender" value="" class="peer sr-only" checked>
                                        <span class="flex h-9 items-center justify-center rounded-md text-xs font-semibold text-slate-500 transition peer-checked:bg-white peer-checked:text-blue-700 peer-checked:shadow-sm">Any</span>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="gender" value="male" class="peer sr-only">
                                        <span class="flex h-9 items-center justify-center rounded-md text-xs font-semibold text-slate-500 transition peer-checked:bg-white peer-checked:text-blue-700 peer-checked:shadow-sm">Male</span>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="gender" value="female" class="peer sr-only">
                                        <span class="flex h-9 items-center justify-center rounded-md text-xs font-semibold text-slate-500 transition peer-checked:bg-white peer-checked:text-blue-700 peer-checked:shadow-sm">Female</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <div class="mb-2 flex items-center gap-2 text-xs font-semibold uppercase text-slate-500">
                                    <i class="fas fa-location-dot text-slate-400"></i>
                                    Location
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="location" value="" class="peer sr-only" checked>
                                        <span class="flex h-9 items-center justify-center rounded-lg border border-slate-200 bg-white px-3 text-xs font-semibold text-slate-500 transition peer-checked:border-blue-200 peer-checked:bg-blue-50 peer-checked:text-blue-700">Any</span>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="location" value="gilgit" class="peer sr-only">
                                        <span class="flex h-9 items-center justify-center rounded-lg border border-slate-200 bg-white px-3 text-xs font-semibold text-slate-500 transition peer-checked:border-blue-200 peer-checked:bg-blue-50 peer-checked:text-blue-700">Gilgit</span>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="location" value="jutial" class="peer sr-only">
                                        <span class="flex h-9 items-center justify-center rounded-lg border border-slate-200 bg-white px-3 text-xs font-semibold text-slate-500 transition peer-checked:border-blue-200 peer-checked:bg-blue-50 peer-checked:text-blue-700">Jutial</span>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="location" value="danyore" class="peer sr-only">
                                        <span class="flex h-9 items-center justify-center rounded-lg border border-slate-200 bg-white px-3 text-xs font-semibold text-slate-500 transition peer-checked:border-blue-200 peer-checked:bg-blue-50 peer-checked:text-blue-700">Danyor</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </details>

                    <button type="submit" class="flex h-11 w-full items-center justify-center rounded-full bg-blue-600 text-white shadow-[0_12px_24px_rgba(37,99,235,0.25)] transition hover:-translate-y-0.5 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-200 sm:w-11" aria-label="Search" title="Search">
                        <i class="fas fa-magnifying-glass text-sm"></i>
                    </button>
                </div>
            </form>

        </div>
    </div>
</section>

<style>
    .home-premium-hero .hero-slide {
        opacity: 0;
        transform: none;
        animation: premiumHeroFade 18s ease-in-out infinite;
    }

    .home-premium-hero .hero-slide--two {
        animation-delay: 6s;
    }

    .home-premium-hero .hero-slide--three {
        animation-delay: 12s;
    }

    @keyframes premiumHeroFade {
        0% {
            opacity: 0;
            transform: none;
        }

        8%,
        32% {
            opacity: 1;
        }

        42%,
        100% {
            opacity: 0;
            transform: none;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .home-premium-hero .hero-slide {
            animation: none;
        }

        .home-premium-hero .hero-slide--one {
            opacity: 1;
            transform: none;
        }
    }

    .hero-filter-menu summary::-webkit-details-marker {
        display: none;
    }

    @media (max-width: 640px) {
        .hero-filter-menu {
            position: static;
        }

        .hero-filter-menu > div {
            left: 0;
            right: 0;
            top: calc(100% + 0.75rem);
            width: auto;
        }
    }
</style>
