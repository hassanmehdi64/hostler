<footer class="border-t border-slate-200 bg-slate-950 py-16 text-white">
  <div class="mx-auto grid max-w-6xl grid-cols-1 gap-12 px-6 md:grid-cols-2 lg:grid-cols-4">
    <!-- Logo & Description -->
    <div class="space-y-6">
      <div>
        <img src="{{ $settings->logo ?? asset('frontend/images/logo.png') }}" alt="Logo" class="h-12 w-auto rounded bg-white p-1">
      </div>
      <p class="leading-7 text-slate-300">{{ $settings->description ?? 'Discover comfortable hostels in Gilgit-Baltistan with clear information and simple search tools.' }}</p>
      <div class="flex space-x-4">
        <a href="{{ $settings->facebook ?? '#' }}" class="flex h-11 w-11 items-center justify-center rounded-full bg-white/10 text-lg text-white transition hover:-translate-y-0.5 hover:bg-blue-600">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="{{ $settings->linkedin ?? '#' }}" class="flex h-11 w-11 items-center justify-center rounded-full bg-white/10 text-lg text-white transition hover:-translate-y-0.5 hover:bg-blue-500">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="{{ $settings->twitter ?? '#' }}" class="flex h-11 w-11 items-center justify-center rounded-full bg-white/10 text-lg text-white transition hover:-translate-y-0.5 hover:bg-rose-600">
          <i class="fab fa-instagram"></i>
        </a>
      </div>
    </div>

    <!-- Quick Links -->
    <div>
      <h3 class="mb-6 text-sm font-semibold uppercase text-white">Quick Links</h3>
      <ul class="space-y-3 text-sm">
        <li><a href="{{ url('/') }}" class="block py-1 text-slate-300 transition-colors hover:text-white">Home</a></li>
        <li><a href="{{ url('/about') }}" class="block py-1 text-slate-300 transition-colors hover:text-white">About</a></li>
        <li><a href="{{ url('/gallery') }}" class="block py-1 text-slate-300 transition-colors hover:text-white">Gallery</a></li>
        <li><a href="{{ route('hostels') }}" class="block py-1 text-slate-300 transition-colors hover:text-white">Hostels</a></li>
      </ul>
    </div>

    <!-- Company -->
    <div>
      <h3 class="mb-6 text-sm font-semibold uppercase text-white">Company</h3>
      <ul class="space-y-3 text-sm">
        <li><a href="{{ url('/about') }}" class="block py-1 text-slate-300 transition-colors hover:text-white">About</a></li>
        <li><a href="{{ url('/privacy') }}" class="block py-1 text-slate-300 transition-colors hover:text-white">Privacy Policy</a></li>
        <li><a href="{{ url('/terms-condition') }}" class="block py-1 text-slate-300 transition-colors hover:text-white">Terms & Conditions</a></li>
        <li><a href="{{ url('/contact') }}" class="block py-1 text-slate-300 transition-colors hover:text-white">Contact Us</a></li>
      </ul>
    </div>

    <!-- Support -->
    <div>
      <h3 class="mb-6 text-sm font-semibold uppercase text-white">Support</h3>
      <ul class="space-y-3 text-sm">
        <li><a href="{{ url('/advertise') }}" class="block py-1 text-slate-300 transition-colors hover:text-white">Advertise</a></li>
        <li><a href="{{ url('/terms-of-use') }}" class="block py-1 text-slate-300 transition-colors hover:text-white">Terms of Use</a></li>
        <li><a href="{{ url('/support') }}" class="block py-1 text-slate-300 transition-colors hover:text-white">Support</a></li>
      </ul>
    </div>
  </div>
  <div class="mx-auto mt-12 max-w-6xl border-t border-white/10 px-6 pt-8 text-center text-sm text-slate-400">
    <p>&copy; 2026 GB Hosteler. All rights reserved.</p>
  </div>
</footer>

@yield('script')
