@extends('admin.layouts.app')

@section('content')
<div class="mx-auto max-w-5xl space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Manager</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">Update hostel</h1>
    <p class="mt-1 text-sm text-slate-600">Edit your hostel listing details.</p>
  </div>

  <form action="{{ route('updated-hostel', ['id' => $hostel->id]) }}" method="POST" enctype="multipart/form-data" class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    @csrf
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
    <button type="submit" class="mt-6 inline-flex items-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">Update <i class="bx bx-save"></i></button>
  </form>
</div>
@endsection
