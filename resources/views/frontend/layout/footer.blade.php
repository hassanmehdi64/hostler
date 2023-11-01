<!----------------------
      Footer section start"
       ----------------------->

       <footer class="footer">
        <div class="footer-container">
          <div class="section">
            <div class="logo">
              <img src="{{ $settings->logo }}"  alt="Logo" class="logo-image">
            </div>
            <div class="section-content">
              <h3 class="section-title">Description</h3>
              <p class="section-description">{{ $settings->description }}</p>
              <div class="social-icons">
                <a href="{{ $settings->facebook }}" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ $settings->linkedin }}" class="social-icon"><i class="fab fa-linkedin"></i></a>
                <a href="{{ $settings->twitter}}" class="social-icon"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
          <div class="section">
            <h3 class="section-title">Important Links</h3>
            <ul class="links">
              <li><a href="#">Link 1</a></li>
              <li><a href="#">Link 2</a></li>
              <li><a href="#">Link 3</a></li>
              <li><a href="#">Link 4</a></li>
              <li><a href="#">Link 5</a></li>
            </ul>
          </div>
          <div class="section">
            <h3 class="section-title">Company Links</h3>
            <ul class="links">
              <li><a href="about.html">About</a></li>
              <li><a href="privacy.html">Privacy Policy</a></li>
              <li><a href="terms-condition.html">Terms and Conditions</a></li>
              <li><a href="contact.html">Contact Us</a></li>
            </ul>
          </div>
          <div class="section">
            <h3 class="section-title">Help and Support</h3>
            <ul class="links">
              <li><a href="advertise.html">Advertise</a></li>
              <li><a href="termsof-use.html">Terms of Use</a></li>
              <li><a href="support.html">Support</a></li>
            </ul>
          </div>
        </div>
        <div class="copy-right">© 2023 Your Company. All rights reserved.</div>
      </footer>


      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const faqItems = document.querySelectorAll('.faq');

          faqItems.forEach(function(item) {
            const question = item.querySelector('.question');

            question.addEventListener('click', function() {
              faqItems.forEach(faq => {
                if (faq !== item) {
                  faq.classList.remove('active');
                }
              });

              item.classList.toggle('active');
            });
          });
        });
      </script>


      <script src="{{ url('https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js') }}"></script>
      <script>
        var swiper = new Swiper(".mySwiper", {
          pagination: {
            el: ".swiper-pagination",
          },
          autoplay:{
            delay:3000
          },
          loop:true
        });
      </script>

    <script src="{{ asset('frontend/script.js') }}"></script>
  </body>
</html>
