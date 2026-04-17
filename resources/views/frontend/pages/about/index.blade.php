@extends("frontend.layouts.app")

@section('main-container')

<section class="bg-white px-4 py-16 sm:px-6 md:py-24 lg:px-8">
  <div class="mx-auto max-w-5xl">
    <p class="text-sm font-semibold uppercase text-blue-700">About GB Hosteler</p>
    <h1 class="mt-3 max-w-3xl text-4xl font-semibold leading-tight text-slate-950 sm:text-5xl">
      A simple hostel finder for students and travelers in Gilgit-Baltistan.
    </h1>
    <p class="mt-6 max-w-4xl text-lg leading-8 text-slate-600">
      GB Hosteler is built to make hostel searching easier, clearer, and faster. Instead of asking people in different places, scrolling through scattered posts, or visiting multiple hostels without basic information, users can search available hostels from one website and compare the details that matter before they make contact.
    </p>
  </div>
</section>

<section class="bg-slate-50 px-4 py-16 sm:px-6 md:py-20 lg:px-8">
  <div class="mx-auto max-w-5xl">
    <div class="grid gap-8 lg:grid-cols-[1fr_0.75fr]">
      <div class="space-y-6">
        <div>
          <h2 class="text-2xl font-semibold text-slate-950 sm:text-3xl">What this site does</h2>
          <p class="mt-4 text-base leading-8 text-slate-600">
            The website collects hostel listings and presents them in a clean format. Users can search by hostel name, location, or preference, then open a hostel detail page to review information such as location, images, description, rooms, and contact details. The goal is not to make the search complicated; the goal is to help users quickly understand which hostel may be suitable for them.
          </p>
        </div>

        <div>
          <h2 class="text-2xl font-semibold text-slate-950 sm:text-3xl">Why it is useful</h2>
          <p class="mt-4 text-base leading-8 text-slate-600">
            Finding a hostel can take time, especially for students, job seekers, and visitors who are new to an area. GB Hosteler reduces that effort by organizing hostels by key locations such as Gilgit, Jutial, and Danyor. A user can filter options, compare listings, and decide which hostel to contact without wasting time on irrelevant results.
          </p>
        </div>

        <div>
          <h2 class="text-2xl font-semibold text-slate-950 sm:text-3xl">Who it is for</h2>
          <p class="mt-4 text-base leading-8 text-slate-600">
            GB Hosteler is designed for students looking for accommodation near colleges or universities, travelers planning a stay in Gilgit-Baltistan, and hostel managers who want their hostel information to be easier to discover. The platform keeps both sides connected through clear listings and direct hostel details.
          </p>
        </div>
      </div>

      <aside class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <h3 class="text-lg font-semibold text-slate-950">Site focus</h3>
        <div class="mt-6 space-y-5">
          <div class="flex gap-4">
            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-50 text-blue-700">
              <i class="fas fa-location-dot"></i>
            </span>
            <div>
              <h4 class="font-semibold text-slate-950">Location-based search</h4>
              <p class="mt-1 text-sm leading-6 text-slate-600">Find hostels by area and shortlist the ones near your daily route.</p>
            </div>
          </div>
          <div class="flex gap-4">
            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
              <i class="fas fa-bed"></i>
            </span>
            <div>
              <h4 class="font-semibold text-slate-950">Room information</h4>
              <p class="mt-1 text-sm leading-6 text-slate-600">Review available room details before contacting a hostel.</p>
            </div>
          </div>
          <div class="flex gap-4">
            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-amber-50 text-amber-700">
              <i class="fas fa-user-group"></i>
            </span>
            <div>
              <h4 class="font-semibold text-slate-950">Preference filters</h4>
              <p class="mt-1 text-sm leading-6 text-slate-600">Filter by gender preference to remove unsuitable results early.</p>
            </div>
          </div>
          <div class="flex gap-4">
            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-rose-50 text-rose-700">
              <i class="fas fa-phone"></i>
            </span>
            <div>
              <h4 class="font-semibold text-slate-950">Direct contact</h4>
              <p class="mt-1 text-sm leading-6 text-slate-600">Move from discovery to the hostel contact details without extra steps.</p>
            </div>
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>

<section class="bg-white px-4 py-16 sm:px-6 md:py-20 lg:px-8">
  <div class="mx-auto max-w-5xl">
    <div class="max-w-3xl">
      <p class="text-sm font-semibold uppercase text-blue-700">How It Helps</p>
      <h2 class="mt-3 text-3xl font-semibold text-slate-950">A clearer process from search to contact</h2>
      <p class="mt-4 text-base leading-8 text-slate-600">
        The site is organized around the normal steps a person follows when choosing a hostel. First, they search by name, area, or filter. Then they compare results. After that, they open the detail page to see more information and decide whether the hostel is worth contacting.
      </p>
    </div>

    <div class="mt-10 grid gap-4 md:grid-cols-3">
      <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <span class="text-sm font-semibold text-blue-700">Step 01</span>
        <h3 class="mt-3 font-semibold text-slate-950">Search</h3>
        <p class="mt-2 text-sm leading-6 text-slate-600">Use keywords, location, and preference filters to find relevant hostels.</p>
      </div>
      <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <span class="text-sm font-semibold text-blue-700">Step 02</span>
        <h3 class="mt-3 font-semibold text-slate-950">Compare</h3>
        <p class="mt-2 text-sm leading-6 text-slate-600">Scan hostel cards and compare names, images, locations, and basic details.</p>
      </div>
      <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <span class="text-sm font-semibold text-blue-700">Step 03</span>
        <h3 class="mt-3 font-semibold text-slate-950">Contact</h3>
        <p class="mt-2 text-sm leading-6 text-slate-600">Open the hostel detail page and use the listed information to contact the manager.</p>
      </div>
    </div>
  </div>
</section>

<section class="bg-slate-50 px-4 py-16 sm:px-6 md:py-20 lg:px-8">
  <div class="mx-auto max-w-4xl">
    <div class="mb-10">
      <p class="text-sm font-semibold uppercase text-blue-700">FAQ</p>
      <h2 class="mt-3 text-3xl font-semibold text-slate-950">Common questions</h2>
    </div>

    @php
      $faqs = [
        [
          'question' => 'Can I search without typing a hostel name?',
          'answer' => 'Yes. You can use filters such as location and gender preference even if you do not type anything in the search box.'
        ],
        [
          'question' => 'Which locations are available?',
          'answer' => 'The main location filters currently focus on Gilgit, Jutial, and Danyor, with listings organized around these areas.'
        ],
        [
          'question' => 'Does GB Hosteler manage the hostels directly?',
          'answer' => 'GB Hosteler is a discovery platform. It helps users find and compare hostel information, then contact the relevant hostel directly.'
        ],
        [
          'question' => 'Can hostel managers add or update information?',
          'answer' => 'The site includes admin and manager areas so hostel information, rooms, galleries, and related details can be maintained.'
        ]
      ];
    @endphp

    <div class="space-y-4">
      @foreach($faqs as $index => $faq)
        <details class="group rounded-lg border border-slate-200 bg-white shadow-sm" {{ $index === 0 ? 'open' : '' }}>
          <summary class="flex cursor-pointer select-none items-center justify-between gap-4 px-6 py-5 font-semibold text-slate-950">
            {{ $faq['question'] }}
            <i class="fas fa-chevron-down text-sm text-slate-400 transition-transform duration-300 group-open:rotate-180"></i>
          </summary>
          <div class="border-t border-slate-200 px-6 py-5 text-sm leading-7 text-slate-600">
            {{ $faq['answer'] }}
          </div>
        </details>
      @endforeach
    </div>
  </div>
</section>

@endsection
