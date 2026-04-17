@extends('frontend.layouts.app')

@section('main-container')

<section class="bg-slate-50 px-4 py-16 sm:px-6 md:py-24 lg:px-8">
  <div class="mx-auto grid max-w-6xl gap-8 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
    <div class="max-w-xl">
      <p class="text-sm font-semibold uppercase text-blue-700">Register</p>
      <h1 class="mt-3 text-4xl font-semibold leading-tight text-slate-950 sm:text-5xl">
        Create your GB Hosteler account
      </h1>
      <p class="mt-5 text-base leading-8 text-slate-600 sm:text-lg">
        Register to access account features and keep hostel information easier to manage. New accounts may require approval before dashboard access is available.
      </p>

      <div class="mt-8 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="font-semibold text-slate-950">Before you register</h2>
        <div class="mt-4 space-y-4 text-sm leading-6 text-slate-600">
          <p class="flex gap-3">
            <i class="fas fa-circle-check mt-1 text-emerald-600"></i>
            Use an email address you can access.
          </p>
          <p class="flex gap-3">
            <i class="fas fa-circle-check mt-1 text-emerald-600"></i>
            Choose a password you can remember.
          </p>
          <p class="flex gap-3">
            <i class="fas fa-circle-check mt-1 text-emerald-600"></i>
            Contact the team if your account needs manager permissions.
          </p>
        </div>
      </div>
    </div>

    <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
      <h2 class="text-2xl font-semibold text-slate-950">Create account</h2>
      <p class="mt-2 text-sm text-slate-600">Fill in your details to get started.</p>

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

      <form action="{{ route('register') }}" method="POST" class="mt-8 space-y-5">
        @csrf

        <div>
          <label for="name" class="block text-sm font-semibold text-slate-700">Full Name</label>
          <input id="name" name="name" type="text" autocomplete="name" required value="{{ old('name') }}" class="mt-2 w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Your full name">
        </div>

        <div>
          <label for="email" class="block text-sm font-semibold text-slate-700">Email Address</label>
          <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}" class="mt-2 w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="you@example.com">
        </div>

        <div class="grid gap-5 md:grid-cols-2">
          <div>
            <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
            <input id="password" name="password" type="password" autocomplete="new-password" required class="mt-2 w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Password">
          </div>
          <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-slate-700">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="mt-2 w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Confirm password">
          </div>
        </div>

        <label class="flex items-start gap-3 text-sm leading-6 text-slate-600">
          <input type="checkbox" name="terms" required class="mt-1 h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
          <span>I agree to the Terms of Service and Privacy Policy.</span>
        </label>

        <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-blue-700">
          Create account
          <i class="fas fa-arrow-right text-xs"></i>
        </button>
      </form>

      <p class="mt-6 border-t border-slate-200 pt-6 text-center text-sm text-slate-600">
        Already have an account?
        <a href="{{ route('login') }}" class="font-semibold text-blue-700 transition hover:text-slate-950">Sign in</a>
      </p>
    </div>
  </div>
</section>

@endsection
