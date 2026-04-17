@extends("frontend.layouts.app")

@section('main-container')

<section class="bg-white px-4 py-16 sm:px-6 md:py-24 lg:px-8">
  <div class="mx-auto max-w-6xl">
    <div class="max-w-3xl">
      <p class="text-sm font-semibold uppercase text-blue-700">Contact</p>
      <h1 class="mt-3 text-4xl font-semibold leading-tight text-slate-950 sm:text-5xl">
        Get in touch with GB Hosteler
      </h1>
      <p class="mt-5 text-base leading-8 text-slate-600 sm:text-lg">
        Have a question about a hostel listing, need help using the website, or want to share updated information? Send a message and the team will review it.
      </p>
    </div>
  </div>
</section>

<section class="bg-slate-50 px-4 py-16 sm:px-6 md:py-20 lg:px-8">
  <div class="mx-auto grid max-w-6xl gap-8 lg:grid-cols-[0.8fr_1.2fr]">
    <aside class="space-y-5">
      <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <span class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-50 text-blue-700">
          <i class="fas fa-message"></i>
        </span>
        <h2 class="mt-5 text-xl font-semibold text-slate-950">Send a message</h2>
        <p class="mt-2 text-sm leading-6 text-slate-600">
          Use the form for support questions, hostel listing updates, and general website feedback.
        </p>
      </div>

      <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <span class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
          <i class="fas fa-clock"></i>
        </span>
        <h2 class="mt-5 text-xl font-semibold text-slate-950">Response time</h2>
        <p class="mt-2 text-sm leading-6 text-slate-600">
          Messages are reviewed as soon as possible. Include clear details so the team can respond with the right information.
        </p>
      </div>

      <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <span class="flex h-11 w-11 items-center justify-center rounded-full bg-amber-50 text-amber-700">
          <i class="fas fa-circle-info"></i>
        </span>
        <h2 class="mt-5 text-xl font-semibold text-slate-950">Helpful details</h2>
        <p class="mt-2 text-sm leading-6 text-slate-600">
          If your message is about a hostel, mention the hostel name, location, and the detail you want checked.
        </p>
      </div>
    </aside>

    <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
      @if(session('message'))
        <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">
          {{ session('message') }}
        </div>
      @endif

      <form action="{{ route('contact') }}" method="POST" class="space-y-5">
        @csrf

        <div class="grid gap-5 md:grid-cols-2">
          <div>
            <label class="block text-sm font-semibold text-slate-700" for="firstname">First Name</label>
            <input required type="text" name="firstname" id="firstname" class="mt-2 w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Enter first name">
          </div>
          <div>
            <label class="block text-sm font-semibold text-slate-700" for="lastname">Last Name</label>
            <input required type="text" name="lastname" id="lastname" class="mt-2 w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Enter last name">
          </div>
        </div>

        <div class="grid gap-5 md:grid-cols-2">
          <div>
            <label class="block text-sm font-semibold text-slate-700" for="email">Email</label>
            <input required type="email" name="email" id="email" class="mt-2 w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="your@email.com">
          </div>
          <div>
            <label class="block text-sm font-semibold text-slate-700" for="phone">Phone Number</label>
            <input required type="tel" name="phone" id="phone" class="mt-2 w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Phone number">
          </div>
        </div>

        <div>
          <label class="block text-sm font-semibold text-slate-700" for="message">Message</label>
          <textarea required name="message" id="message" rows="6" class="mt-2 w-full resize-y rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Tell us what you need"></textarea>
        </div>

        <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-blue-700 sm:w-auto">
          Send message
          <i class="fas fa-arrow-right text-xs"></i>
        </button>
      </form>
    </div>
  </div>
</section>

@endsection
