@extends('frontend.layouts.app')

@section('main-container')

<section class="bg-slate-50 px-4 py-16 sm:px-6 md:py-24 lg:px-8">
  <div class="mx-auto grid max-w-6xl gap-8 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
    <div class="max-w-xl">
      <p class="text-sm font-semibold uppercase text-blue-700">Login</p>
      <h1 class="mt-3 text-4xl font-semibold leading-tight text-slate-950 sm:text-5xl">
        Welcome back to GB Hosteler
      </h1>
      <p class="mt-5 text-base leading-8 text-slate-600 sm:text-lg">
        Sign in to manage hostel information, review dashboard tools, and keep listings clear for users searching across Gilgit-Baltistan.
      </p>

      <div class="mt-8 grid gap-4 sm:grid-cols-2">
        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
          <span class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-50 text-blue-700">
            <i class="fas fa-building"></i>
          </span>
          <h2 class="mt-4 font-semibold text-slate-950">Manage listings</h2>
          <p class="mt-2 text-sm leading-6 text-slate-600">Keep hostel details, rooms, and images organized.</p>
        </div>
        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
          <span class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
            <i class="fas fa-message"></i>
          </span>
          <h2 class="mt-4 font-semibold text-slate-950">Stay updated</h2>
          <p class="mt-2 text-sm leading-6 text-slate-600">Access messages, feedback, and admin actions.</p>
        </div>
      </div>
    </div>

    <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
      <h2 class="text-2xl font-semibold text-slate-950">Sign in</h2>
      <p class="mt-2 text-sm text-slate-600">Enter your email and password to continue.</p>

      @if($errors->any())
        <div class="mt-6 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-semibold text-rose-800">
          @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      @if(session('message'))
        <div class="mt-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">
          {{ session('message') }}
        </div>
      @endif

      <form action="{{ route('login') }}" method="POST" class="mt-8 space-y-5">
        @csrf

        <div>
          <label for="email" class="block text-sm font-semibold text-slate-700">Email Address</label>
          <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}" class="mt-2 w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="you@example.com">
        </div>

        <div>
          <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required class="mt-2 w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Enter password">
        </div>

        <label class="flex items-center gap-3 text-sm text-slate-600">
          <input id="remember" name="remember" type="checkbox" class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
          Remember me
        </label>

        <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-blue-700">
          Sign in
          <i class="fas fa-arrow-right text-xs"></i>
        </button>
      </form>

      <p class="mt-6 border-t border-slate-200 pt-6 text-center text-sm text-slate-600">
        Do not have an account?
        <a href="{{ route('register') }}" class="font-semibold text-blue-700 transition hover:text-slate-950">Create one</a>
      </p>
    </div>
  </div>
</section>

@endsection
