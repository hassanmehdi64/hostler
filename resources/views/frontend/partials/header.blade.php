<nav class="fixed top-0 z-50 w-full border-b border-slate-200/70 bg-white/90 shadow-sm backdrop-blur-xl">
  <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between py-3.5">
      <div class="flex items-center">
        <button id="mobile-menu-btn" class="flex h-10 w-10 items-center justify-center rounded-full text-lg text-slate-700 transition hover:bg-slate-100 md:hidden" aria-label="Open menu">
          <i class="fas fa-bars"></i>
        </button>
        <a href="{{ url('/') }}" class="ml-3 flex items-center md:ml-0">
          <img src="{{ asset('frontend/images/logo.png') }}" alt="GB Hosteler" class="h-9 w-auto">
        </a>
      </div>
      <div class="hidden items-center gap-7 md:flex">
        <a href="{{ url('/') }}" class="text-sm font-medium text-slate-700 transition-colors hover:text-blue-700">Home</a>
        <a href="{{ url('/about') }}" class="text-sm font-medium text-slate-700 transition-colors hover:text-blue-700">About</a>
        <a href="{{ url('/gallery') }}" class="text-sm font-medium text-slate-700 transition-colors hover:text-blue-700">Gallery</a>
        <a href="{{ route('hostels') }}" class="text-sm font-medium text-slate-700 transition-colors hover:text-blue-700">Hostels</a>
        <a href="{{ url('/blogs') }}" class="text-sm font-medium text-slate-700 transition-colors hover:text-blue-700">Blog</a>
        <a href="{{ url('/contact') }}" class="text-sm font-medium text-slate-700 transition-colors hover:text-blue-700">Contact</a>
      </div>
      <div class="hidden items-center gap-3 md:flex">
        <a href="{{ url('/login') }}" class="rounded-full px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Login</a>
        <a href="{{ url('/register') }}" class="rounded-full bg-slate-950 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-blue-700">Register</a>
      </div>
      <button id="mobile-menu-close" class="flex h-10 w-10 items-center justify-center rounded-full text-lg text-slate-700 transition hover:bg-slate-100 md:hidden" aria-label="Close menu">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
</nav>

<!-- Mobile menu overlay -->
<div id="mobile-menu" class="fixed inset-0 z-40 -translate-x-full transform bg-white transition-transform duration-300 md:hidden">
  <div class="p-6 pt-24">
    <div class="space-y-2 text-base">
      <a href="{{ url('/') }}" class="block rounded-xl px-4 py-3 font-medium text-slate-800 hover:bg-slate-100">Home</a>
      <a href="{{ url('/about') }}" class="block rounded-xl px-4 py-3 font-medium text-slate-800 hover:bg-slate-100">About</a>
      <a href="{{ url('/gallery') }}" class="block rounded-xl px-4 py-3 font-medium text-slate-800 hover:bg-slate-100">Gallery</a>
      <a href="{{ route('hostels') }}" class="block rounded-xl px-4 py-3 font-medium text-slate-800 hover:bg-slate-100">Hostels</a>
      <a href="{{ url('/blogs') }}" class="block rounded-xl px-4 py-3 font-medium text-slate-800 hover:bg-slate-100">Blog</a>
      <a href="{{ url('/contact') }}" class="block rounded-xl px-4 py-3 font-medium text-slate-800 hover:bg-slate-100">Contact</a>
      <a href="{{ url('/register') }}" class="mt-5 block rounded-full bg-slate-950 py-3 text-center font-semibold text-white hover:bg-blue-700">Register</a>
      <a href="{{ url('/login') }}" class="block rounded-full bg-slate-100 py-3 text-center font-semibold text-slate-800 hover:bg-slate-200">Login</a>
    </div>
  </div>
</div>

<!-- Overlay -->
<div id="overlay" class="invisible fixed inset-0 z-30 bg-slate-950/45 opacity-0 transition-all duration-300 md:hidden"></div>

<script>
  const menuBtn = document.getElementById('mobile-menu-btn');
  const closeBtn = document.getElementById('mobile-menu-close');
  const mobileMenu = document.getElementById('mobile-menu');
  const overlay = document.getElementById('overlay');

  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.remove('-translate-x-full');
    overlay.classList.remove('invisible', 'opacity-0');
  });

  closeBtn.addEventListener('click', () => {
    mobileMenu.classList.add('-translate-x-full');
    overlay.classList.add('invisible', 'opacity-0');
  });

  overlay.addEventListener('click', () => {
    mobileMenu.classList.add('-translate-x-full');
    overlay.classList.add('invisible', 'opacity-0');
  });
</script>
