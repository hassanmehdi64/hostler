@extends('admin.layouts.app')

@section('content')
<div class="mx-auto max-w-5xl space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Hostels</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">Add new hostel</h1>
    <p class="mt-1 text-sm text-slate-600">Add the listing details users will see on the public site.</p>
  </div>

  @if(session('message'))
    <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">{{ session('message') }}</div>
  @endif

  <form action="{{ url('add-hostel') }}" method="POST" enctype="multipart/form-data" class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    @csrf
    <div class="grid gap-5 md:grid-cols-2">
      <div>
        <label class="block text-sm font-semibold text-slate-700">Hostel Name</label>
        <input type="text" name="name" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Enter hostel name">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Location</label>
        <input type="text" name="location" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Jutial, Gilgit etc">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Hostel Manager</label>
        <input type="text" name="hostel_manager_name" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Manager name">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Phone Number</label>
        <input type="tel" name="phone" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="0300-1234567">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Mobile Number</label>
        <input type="tel" name="mobile_number" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="0301-1234567">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Email</label>
        <input type="email" name="email" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="hostel@example.com">
        @error('email')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Gender</label>
        <select name="gender" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
          <option value="Male">Boys Hostel</option>
          <option value="Female">Girls Hostel</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Rent Per Bed</label>
        <input type="number" name="hostel_rent" min="0" step="500" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="5000">
      </div>
      <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-slate-700">Hostel Image</label>
        <input type="file" name="hostel_image" accept="image/*" required class="mt-2 w-full rounded-lg border border-dashed border-slate-300 px-4 py-4 text-sm">
      </div>
    </div>
    <div class="mt-6 flex justify-end">
      <button type="submit" class="inline-flex items-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">
        Add hostel
        <i class="bx bx-right-arrow-alt"></i>
      </button>
    </div>
  </form>
</div>
@endsection
