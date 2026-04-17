@props(['feedbacks'])

<section class="bg-white px-4 py-20 sm:px-6 md:py-28 lg:px-8">
    <div class="mx-auto max-w-6xl">
        <!-- Heading -->
        <div class="mx-auto mb-14 max-w-3xl text-center">
            <p class="text-sm font-semibold uppercase text-blue-700">Guest Voices</p>
            <h2 class="mt-3 text-3xl font-semibold text-slate-950 sm:text-4xl">Real feedback from people who stayed.</h2>
            <p class="mt-4 text-lg leading-8 text-slate-600">Simple experiences matter: clear details, easier choices, and fewer surprises.</p>
        </div>

        <!-- Testimonials carousel -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @forelse ($feedbacks as $feedback)
                    <div class="swiper-slide">
                        <div class="mx-auto max-w-2xl rounded-lg border border-slate-200 bg-slate-50 p-8 shadow-sm md:p-12">
                            <div class="flex flex-col items-center space-y-6 text-center">
                                <!-- Star rating -->
                                <div class="flex gap-1 justify-center">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fas fa-star text-lg text-amber-400"></i>
                                    @endfor
                                </div>
                                
                                <!-- Quote text -->
                                <p class="text-lg leading-8 text-slate-700">{{ $feedback->feedback }}</p>
                                
                                <!-- Client info -->
                                <div class="flex w-full flex-col items-center border-t border-slate-200 pt-5">
                                    <img src="/{{ $feedback->profile }}" alt="{{ $feedback->name }}" class="mb-3 h-16 w-16 rounded-full border-4 border-white object-cover shadow-md">
                                    <h4 class="text-lg font-semibold text-slate-950">{{ $feedback->name }}</h4>
                                    <p class="text-sm text-slate-500">Verified Guest</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide">
                        <div class="mx-auto max-w-2xl rounded-lg border border-slate-200 bg-slate-50 p-12 text-center shadow-sm">
                            <i class="fas fa-star mb-4 block text-5xl text-slate-300"></i>
                            <p class="mb-2 text-lg text-slate-600">No feedback has been shared yet.</p>
                            <p class="text-slate-500">Check back soon for guest testimonials.</p>
                        </div>
                    </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="swiper-pagination mt-8"></div>
        </div>
    </div>
</section>

@push('scripts')
<style>
    .swiper-pagination-bullet {
        background: #cbd5e1;
        opacity: 1;
    }
    
    .swiper-pagination-bullet-active {
        background: #2563eb;
    }
</style>

<script>
    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
    });
</script>
@endpush
