@extends('admin.layouts.app')

@section('content')
@if($hostel)
<div class="mx-auto max-w-5xl space-y-6">
  <div class="flex flex-col justify-between gap-4 rounded-lg border border-slate-200 bg-white p-6 shadow-sm lg:flex-row lg:items-end">
    <div>
      <p class="text-sm font-semibold uppercase text-blue-700">Hostels</p>
      <h1 class="mt-2 text-2xl font-semibold text-slate-950">Edit {{ $hostel->name }}</h1>
      <p class="mt-1 text-sm text-slate-600">Update listing information and manage rooms or gallery.</p>
    </div>
    <div class="flex flex-wrap gap-2">
      <a href="{{ route('add_gallery', ['id' => $hostel->id, 'name' => $hostel->name]) }}" class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:border-blue-200 hover:text-blue-700">Add gallery</a>
      <a href="{{ route('galleryhostel', ['id' => $hostel->id, 'name' => $hostel->name]) }}" class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:border-blue-200 hover:text-blue-700">View gallery</a>
      <a href="{{ route('addroom', ['id' => $hostel->id, 'name' => $hostel->name]) }}" class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:border-blue-200 hover:text-blue-700">Add room</a>
      <a href="{{ route('viewroom', ['id' => $hostel->id]) }}" class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:border-blue-200 hover:text-blue-700">View rooms</a>
    </div>
  </div>

  <form action="{{ route('updated-hostel', ['id' => $hostel->id]) }}" method="POST" enctype="multipart/form-data" class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    @csrf
    <div class="grid gap-5 md:grid-cols-2">
      <div>
        <label class="block text-sm font-semibold text-slate-700">Hostel Name</label>
        <input type="text" name="name" value="{{ $hostel->name }}" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Location</label>
        <input type="text" name="location" value="{{ $hostel->location }}" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Hostel Manager</label>
        <input type="text" name="hostel_manager_name" value="{{ $hostel->hostel_manager_name }}" class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Phone Number</label>
        <input type="tel" name="phone" value="{{ $hostel->phone }}" class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Mobile Number</label>
        <input type="tel" name="mobile_number" value="{{ $hostel->mobile_number }}" class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Email</label>
        <input type="email" name="email" value="{{ $hostel->email }}" class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Gender</label>
        <select name="gender" class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
          <option value="Male" {{ $hostel->gender == 'Male' ? 'selected' : '' }}>Boys Hostel</option>
          <option value="Female" {{ $hostel->gender == 'Female' ? 'selected' : '' }}>Girls Hostel</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Rent Per Bed</label>
        <input type="number" name="hostel_rent" value="{{ $hostel->hostel_rent }}" min="0" step="500" class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
      </div>
      <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-slate-700">Hostel Image</label>
        <div class="mt-2 flex items-center gap-4">
          <img src="{{ asset($hostel->hostel_image) }}" alt="{{ $hostel->name }}" class="h-20 w-28 rounded-lg object-cover">
          <input type="file" name="hostel_image" accept="image/*" class="w-full rounded-lg border border-dashed border-slate-300 px-4 py-4 text-sm">
        </div>
      </div>
    </div>
    <div class="mt-6 flex justify-end">
      <button type="submit" class="inline-flex items-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">
        Update hostel
        <i class="bx bx-save"></i>
      </button>
    </div>
  </form>
</div>
@endif
@endsection
