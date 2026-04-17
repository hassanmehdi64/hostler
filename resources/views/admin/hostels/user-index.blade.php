@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">User Hostels</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">Update user hostel</h1>
    <p class="mt-1 text-sm text-slate-600">Edit hostel listings connected to users.</p>
  </div>

  @forelse ($hostele as $hostel)
    <form action="{{ route('updated-hostel', ['id' => $hostel->id]) }}" method="POST" enctype="multipart/form-data" class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
      @csrf
      <div class="mb-5 flex items-center gap-3">
        <img src="{{ asset($hostel->hostel_image) }}" alt="{{ $hostel->name }}" class="h-14 w-14 rounded-lg object-cover">
        <div>
          <h2 class="font-semibold text-slate-950">{{ $hostel->name }}</h2>
          <p class="text-sm text-slate-500">{{ $hostel->location }}</p>
        </div>
      </div>
      <div class="grid gap-5 md:grid-cols-2">
        <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="text" name="name" value="{{ $hostel->name }}">
        <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="text" name="location" value="{{ $hostel->location }}">
        <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="text" name="hostel_manager_name" value="{{ $hostel->hostel_manager_name }}">
        <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="tel" name="phone" value="{{ $hostel->phone }}">
        <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="tel" name="mobile_number" value="{{ $hostel->mobile_number }}">
        <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="email" name="email" value="{{ $hostel->email }}">
        <select name="gender" class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
          <option value="Male" {{ $hostel->gender == 'Male' ? 'selected' : '' }}>Boys</option>
          <option value="Female" {{ $hostel->gender == 'Female' ? 'selected' : '' }}>Girls</option>
        </select>
        <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="number" name="hostel_rent" value="{{ $hostel->hostel_rent }}">
        <input class="rounded-lg border border-dashed border-slate-300 px-4 py-4 text-sm md:col-span-2" type="file" name="hostel_image">
      </div>
      <button type="submit" class="mt-6 inline-flex items-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">Update hostel <i class="bx bx-save"></i></button>
    </form>
  @empty
    <div class="rounded-lg border border-slate-200 bg-white p-10 text-center text-slate-500 shadow-sm">No user hostels found.</div>
  @endforelse
</div>
@endsection
