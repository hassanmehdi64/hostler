{{-- ==================== Testimonials Section ==================== --}}
<section class="testimonial text-center">
    <div class="container">
        <div class="heading white-heading">
            What Our Client Says
        </div>

        <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($feedbacks as $feedback)
                        <div class="swiper-slide">
                            <div class="carousel-item">
                                <div class="testimonial4_slide">
                                    <img src="/{{ $feedback->profile }}" class="img-circle img-responsive" />
                                    <p>{{ $feedback->feedback }}</p>
                                    <h4>{{ $feedback->name }}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>