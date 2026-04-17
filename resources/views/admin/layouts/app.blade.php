<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>GB Hosteler Dashboard</title>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="bg-slate-100 font-['Poppins']">
    <aside id="sidebar" class="fixed left-0 top-0 z-40 h-screen w-72 -translate-x-full overflow-y-auto border-r border-slate-200 bg-white pb-4 transition-transform md:translate-x-0" aria-label="Sidebar">
      <div class="border-b border-slate-100 p-5">
        <a href="{{ route('dashboard_home') }}" class="flex items-center gap-3 text-xl font-bold text-slate-950">
          <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-700 text-white">
            <i class="bx bx-buildings"></i>
          </span>
          GB Hosteler
        </a>
        <p class="mt-3 text-xs font-medium text-slate-500">{{ auth()->user()->role == 1 ? 'Admin workspace' : 'Manager workspace' }}</p>
      </div>

      <nav class="px-3 py-4">
        <ul class="space-y-1">
          <li>
            <a href="{{ route('dashboard_home') }}" class="flex items-center rounded-lg bg-slate-950 p-2.5 text-sm font-semibold text-white">
              <i class="bx bx-grid-alt mr-3 text-lg"></i>
              Dashboard
            </a>
          </li>

          @if(auth()->user()->role == 0)
            <li class="pt-3">
              <p class="px-2 text-xs font-bold uppercase tracking-wide text-slate-400">Manager</p>
            </li>
            <li>
              <a href="{{ route('showhostel') }}" class="flex items-center rounded-lg p-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100">
                <i class="bx bx-edit mr-3 text-lg"></i>
                Manage Hostels
              </a>
            </li>
            <li>
              <a href="{{ route('managerprofile') }}" class="flex items-center rounded-lg p-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100">
                <i class="bx bx-user mr-3 text-lg"></i>
                Profile
              </a>
            </li>
          @endif

          @if(auth()->user()->role == 1)
            <li class="pt-3">
              <p class="px-2 text-xs font-bold uppercase tracking-wide text-slate-400">Admin</p>
            </li>
            <li><a href="{{ route('add-hostel') }}" class="flex items-center rounded-lg p-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100"><i class="bx bx-plus mr-3 text-lg"></i>Add Hostel</a></li>
            <li><a href="{{ route('hostels-list') }}" class="flex items-center rounded-lg p-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100"><i class="bx bx-buildings mr-3 text-lg"></i>All Hostels</a></li>
            <li><a href="{{ route('newblogadd') }}" class="flex items-center rounded-lg p-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100"><i class="bx bx-edit-alt mr-3 text-lg"></i>Add Blog</a></li>
            <li><a href="{{ route('view_blog') }}" class="flex items-center rounded-lg p-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100"><i class="bx bx-news mr-3 text-lg"></i>Blogs</a></li>
            <li><a href="{{ route('view-galleries') }}" class="flex items-center rounded-lg p-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100"><i class="bx bx-image mr-3 text-lg"></i>Galleries</a></li>
            <li><a href="{{ route('messages') }}" class="flex items-center rounded-lg p-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100"><i class="bx bx-envelope mr-3 text-lg"></i>Messages</a></li>
            <li><a href="{{ route('feedbacks') }}" class="flex items-center rounded-lg p-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100"><i class="bx bx-message-dots mr-3 text-lg"></i>Feedback</a></li>
            <li><a href="{{ route('users-manage') }}" class="flex items-center rounded-lg p-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100"><i class="bx bx-user mr-3 text-lg"></i>Users</a></li>
            <li><a href="{{ route('settings') }}" class="flex items-center rounded-lg p-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100"><i class="bx bx-cog mr-3 text-lg"></i>Settings</a></li>
            <li><a href="{{ route('cms') }}" class="flex items-center rounded-lg p-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100"><i class="bx bx-layout mr-3 text-lg"></i>CMS</a></li>
          @endif

          <li class="pt-3">
            <a href="{{ route('logout') }}" class="flex items-center rounded-lg p-2.5 text-sm font-medium text-red-700 hover:bg-red-50">
              <i class="bx bx-log-out mr-3 text-lg"></i>
              Logout
            </a>
          </li>
        </ul>
      </nav>
    </aside>

    <div id="mobile-menu-overlay" class="fixed inset-0 z-30 invisible bg-slate-900/50 opacity-0 transition-opacity md:hidden"></div>

    <div class="flex h-screen flex-col transition-all duration-500 md:ml-72">
      <header class="border-b border-slate-200 bg-white/95 shadow-sm">
        <div class="flex items-center justify-between px-4 py-3 sm:px-6">
          <div class="flex items-center">
            <button id="sidebarToggle" class="rounded-lg border border-slate-200 p-2 text-xl text-slate-500 hover:text-slate-900 md:hidden">
              <i class="bx bx-menu"></i>
            </button>
            <div class="ml-3">
              <p class="hidden text-xl font-semibold text-slate-900 md:block">{{ auth()->user()->role == 1 ? 'Admin Dashboard' : 'Manager Dashboard' }}</p>
              <p class="hidden text-xs text-slate-500 md:block">Manage GB Hosteler content and records</p>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <a href="{{ url('/') }}" class="hidden rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-blue-200 hover:text-blue-700 sm:inline-flex">View site</a>
            @include('admin.partials.profile-dropdown')
          </div>
        </div>
      </header>

      <main class="flex-1 overflow-y-auto p-4 sm:p-6">
        @yield('content')
      </main>
    </div>

    <script>
      const sidebarToggle = document.getElementById('sidebarToggle');
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('mobile-menu-overlay');

      sidebarToggle?.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('invisible');
        overlay.classList.toggle('opacity-0');
      });

      overlay?.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('invisible', 'opacity-0');
      });

      const profileButton = document.getElementById('profile-button');
      const profileMenu = document.getElementById('profile-menu');

      profileButton?.addEventListener('click', (event) => {
        event.stopPropagation();
        profileMenu?.classList.toggle('hidden');
      });

      document.addEventListener('click', (event) => {
        if (profileButton && profileMenu && !profileButton.contains(event.target) && !profileMenu.contains(event.target)) {
          profileMenu.classList.add('hidden');
        }
      });
    </script>
  </body>
</html>
