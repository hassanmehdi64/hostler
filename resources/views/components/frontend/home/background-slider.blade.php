{{-- Background Slider Component --}}
<div class="absolute inset-0 bg-slider z-0">
    <div class="slide slide-1 active" style="background-image: url('https://images.olx.com.pk/thumbnails/600380907-400x300.jpeg'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
    <div class="slide slide-2" style="background-image: url('https://lums.edu.pk/sites/default/files/styles/default_image_news/public/2022-07/three-sisters-hostels%20%28002%29_1.jpg?h=da42fcf8'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
    <div class="slide slide-3" style="background-image: url('https://static.tossdown.com/bnu/37dc53c3-5c9c-44bd-89ec-2f229b52d5a3.webp'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
    <div class="slide slide-4" style="background-image: url('https://professionallahorehostels.com/wp-content/uploads/2025/03/imageye___-_Hostel-in-Lahore-6.webp'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Background slider script starting...');
    const slides = document.querySelectorAll('.bg-slider .slide');
    console.log('Found slides:', slides.length);

    if (slides.length === 0) {
        console.error('No slides found!');
        return;
    }

    let currentSlide = 0;
    console.log('Starting with slide:', currentSlide);

    // Start automatic slideshow
    setInterval(() => {
        console.log('Changing slide from', currentSlide);
        // Remove active class from current slide
        slides[currentSlide].classList.remove('active');

        // Move to next slide
        currentSlide = (currentSlide + 1) % slides.length;

        // Add active class to new slide
        slides[currentSlide].classList.add('active');
        console.log('Changed to slide:', currentSlide);
    }, 4000); // Change slide every 4 seconds

    console.log('Background slider initialized');
});
</script>