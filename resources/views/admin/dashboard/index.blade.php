@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
  @if(session('message'))
    <div class="rounded-lg border border-amber-200 bg-amber-50 px-4 py-3 text-sm font-semibold text-amber-800">
      {{ session('message') }}
    </div>
  @endif

  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Dashboard</p>
    <div class="mt-3 flex flex-col justify-between gap-4 lg:flex-row lg:items-end">
      <div>
        <h1 class="text-3xl font-semibold text-slate-950">Admin overview</h1>
        <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-600">
          Review hostel listings, rooms, galleries, blog content, users, messages, and feedback from one place.
        </p>
      </div>
      <a href="{{ route('add-hostel') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-slate-950 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
        <i class="bx bx-plus"></i>
        Add hostel
      </a>
    </div>
  </div>

  <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
      <span class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-50 text-blue-700"><i class="bx bx-buildings"></i></span>
      <p class="mt-4 text-2xl font-semibold text-slate-950">{{ $stats['hostels'] }}</p>
      <p class="mt-1 text-sm text-slate-500">Hostels</p>
    </div>
    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
      <span class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-50 text-emerald-700"><i class="bx bx-bed"></i></span>
      <p class="mt-4 text-2xl font-semibold text-slate-950">{{ $stats['rooms'] }}</p>
      <p class="mt-1 text-sm text-slate-500">Rooms</p>
    </div>
    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
      <span class="flex h-10 w-10 items-center justify-center rounded-full bg-amber-50 text-amber-700"><i class="bx bx-image"></i></span>
      <p class="mt-4 text-2xl font-semibold text-slate-950">{{ $stats['galleries'] }}</p>
      <p class="mt-1 text-sm text-slate-500">Gallery entries</p>
    </div>
    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
      <span class="flex h-10 w-10 items-center justify-center rounded-full bg-rose-50 text-rose-700"><i class="bx bx-news"></i></span>
      <p class="mt-4 text-2xl font-semibold text-slate-950">{{ $stats['blogs'] }}</p>
      <p class="mt-1 text-sm text-slate-500">Blogs</p>
    </div>
    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
      <span class="flex h-10 w-10 items-center justify-center rounded-full bg-cyan-50 text-cyan-700"><i class="bx bx-envelope"></i></span>
      <p class="mt-4 text-2xl font-semibold text-slate-950">{{ $stats['messages'] }}</p>
      <p class="mt-1 text-sm text-slate-500">Messages</p>
    </div>
    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
      <span class="flex h-10 w-10 items-center justify-center rounded-full bg-violet-50 text-violet-700"><i class="bx bx-message-dots"></i></span>
      <p class="mt-4 text-2xl font-semibold text-slate-950">{{ $stats['feedbacks'] }}</p>
      <p class="mt-1 text-sm text-slate-500">Feedbacks</p>
    </div>
    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
      <span class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 text-slate-700"><i class="bx bx-user"></i></span>
      <p class="mt-4 text-2xl font-semibold text-slate-950">{{ $stats['users'] }}</p>
      <p class="mt-1 text-sm text-slate-500">Users</p>
    </div>
  </div>

  <div class="grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
    <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
      <div class="mb-5 flex items-center justify-between gap-4">
        <h2 class="text-lg font-semibold text-slate-950">Recent hostels</h2>
        <a href="{{ route('hostels-list') }}" class="text-sm font-semibold text-blue-700 hover:text-slate-950">View all</a>
      </div>

      @forelse($recentHostels as $hostel)
        <div class="flex items-center gap-4 border-t border-slate-100 py-4 first:border-t-0 first:pt-0 last:pb-0">
          <img src="{{ asset($hostel->hostel_image) }}" alt="{{ $hostel->name }}" class="h-14 w-14 rounded-lg object-cover">
          <div class="min-w-0 flex-1">
            <p class="truncate font-semibold text-slate-950">{{ $hostel->name }}</p>
            <p class="mt-1 text-sm text-slate-500">{{ $hostel->location }} · {{ ucfirst($hostel->gender) }}</p>
          </div>
        </div>
      @empty
        <div class="rounded-lg border border-slate-200 bg-slate-50 p-8 text-center">
          <p class="font-semibold text-slate-950">No hostels added yet</p>
          <p class="mt-1 text-sm text-slate-600">Add your first hostel to see it here.</p>
        </div>
      @endforelse
    </div>

    <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
      <div class="mb-5 flex items-center justify-between gap-4">
        <h2 class="text-lg font-semibold text-slate-950">Recent messages</h2>
        <a href="{{ route('messages') }}" class="text-sm font-semibold text-blue-700 hover:text-slate-950">View all</a>
      </div>

      @forelse($recentMessages as $message)
        <div class="border-t border-slate-100 py-4 first:border-t-0 first:pt-0 last:pb-0">
          <p class="font-semibold text-slate-950">{{ $message->firstname }} {{ $message->lastname }}</p>
          <p class="mt-1 truncate text-sm text-slate-500">{{ $message->message }}</p>
          <p class="mt-1 text-xs font-semibold text-slate-400">{{ $message->email }}</p>
        </div>
      @empty
        <div class="rounded-lg border border-slate-200 bg-slate-50 p-8 text-center">
          <p class="font-semibold text-slate-950">No messages yet</p>
          <p class="mt-1 text-sm text-slate-600">Contact form messages will appear here.</p>
        </div>
      @endforelse
    </div>
  </div>

  <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
    <a href="{{ route('hostels-list') }}" class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
      <i class="bx bx-list-ul text-2xl text-blue-700"></i>
      <p class="mt-3 font-semibold text-slate-950">Manage hostels</p>
    </a>
    <a href="{{ route('view_blog') }}" class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
      <i class="bx bx-news text-2xl text-blue-700"></i>
      <p class="mt-3 font-semibold text-slate-950">Manage blogs</p>
    </a>
    <a href="{{ route('view-galleries') }}" class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
      <i class="bx bx-image text-2xl text-blue-700"></i>
      <p class="mt-3 font-semibold text-slate-950">Manage galleries</p>
    </a>
    <a href="{{ route('users-manage') }}" class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
      <i class="bx bx-user text-2xl text-blue-700"></i>
      <p class="mt-3 font-semibold text-slate-950">Manage users</p>
    </a>
  </div>
</div>
@endsection
