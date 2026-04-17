/**
 * Background Slider JavaScript
 * Controls the animated background slider for the hero section
 */

class BackgroundSlider {
    constructor(selector) {
        console.log('BackgroundSlider constructor called with selector:', selector);
        this.slider = document.querySelector(selector);
        console.log('Slider element found:', this.slider);
        if (!this.slider) {
            console.error('Slider element not found with selector:', selector);
            return;
        }

        // Image URLs for the slider
        this.images = [
            'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
            'https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
            'https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
            'https://images.unsplash.com/photo-1555854877-bab0e564b8d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'
        ];

        this.slides = this.slider.querySelectorAll('.slide');
        console.log('Slides found:', this.slides.length, this.slides);
        this.currentSlide = 0;
        this.slideInterval = 4000; // 4 seconds
        this.fadeDuration = 1000; // 1 second fade

        this.init();
    }

    init() {
        console.log('Initializing slider with', this.slides.length, 'slides');
        // Set background images for each slide
        this.slides.forEach((slide, index) => {
            if (this.images[index]) {
                console.log('Setting image for slide', index, ':', this.images[index]);
                slide.style.backgroundImage = `url('${this.images[index]}')`;
            } else {
                console.warn('No image available for slide', index);
            }
            slide.style.opacity = index === 0 ? '1' : '0';
        });

        console.log('Starting slider...');
        // Start the slider
        this.startSlider();
    }

    startSlider() {
        setInterval(() => {
            this.nextSlide();
        }, this.slideInterval);
    }

    nextSlide() {
        // Fade out current slide
        this.slides[this.currentSlide].style.transition = `opacity ${this.fadeDuration}ms ease-in-out`;
        this.slides[this.currentSlide].style.opacity = '0';

        // Move to next slide
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;

        // Fade in next slide
        setTimeout(() => {
            this.slides[this.currentSlide].style.transition = `opacity ${this.fadeDuration}ms ease-in-out`;
            this.slides[this.currentSlide].style.opacity = '1';
        }, this.fadeDuration / 2);
    }

    stopSlider() {
        // Clear any intervals if needed
        clearInterval(this.slider.interval);
    }
}

// Initialize slider when page is fully loaded
window.addEventListener('load', function() {
    // Slider is now handled by inline script in component
    console.log('Background slider JS loaded (using inline script)');
});

// Export for potential use in other modules
if (typeof module !== 'undefined' && module.exports) {
    module.exports = BackgroundSlider;
}