<div class="relative">
  <button type="button" id="profile-button" class="flex items-center gap-3 rounded-full border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-blue-200 hover:text-blue-700">
    <img src="{{ asset(Auth::user()->image ?? 'image/profile.png') }}" alt="{{ Auth::user()->name }}" class="h-9 w-9 rounded-full object-cover">
    <span class="hidden sm:block">{{ Auth::user()->name }}</span>
    <i class="bx bx-chevron-down text-lg"></i>
  </button>

  <div id="profile-menu" class="absolute right-0 top-12 z-50 hidden w-56 overflow-hidden rounded-lg border border-slate-200 bg-white shadow-xl">
    <div class="border-b border-slate-100 px-4 py-3">
      <p class="truncate text-sm font-semibold text-slate-950">{{ Auth::user()->name }}</p>
      <p class="truncate text-xs text-slate-500">{{ Auth::user()->email }}</p>
    </div>
    <a href="{{ route('profile') }}" class="flex items-center gap-2 px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50 hover:text-blue-700">
      <i class="bx bx-user"></i>
      Profile
    </a>
    <a href="{{ route('logout') }}" class="flex items-center gap-2 px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50 hover:text-red-700">
      <i class="bx bx-log-out"></i>
      Logout
    </a>
  </div>
</div>
