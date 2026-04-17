@extends('admin.layouts.app')

@section('content')
<div class="mx-auto max-w-5xl space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Manager</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">Register hostel</h1>
    <p class="mt-1 text-sm text-slate-600">Add your hostel details for admin review and public listing.</p>
  </div>

  @if(session('message'))
    <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">{{ session('message') }}</div>
  @endif

  <form action="{{ url('add-hostel') }}" method="POST" enctype="multipart/form-data" class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    @csrf
    <div class="grid gap-5 md:grid-cols-2">
      <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="text" name="name" placeholder="Hostel name">
      <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="text" name="location" placeholder="Location">
      <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="text" name="hostel_manager_name" placeholder="Hostel manager name">
      <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="tel" name="phone" placeholder="Phone number">
      <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="tel" name="mobile_number" placeholder="Mobile number">
      <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="email" name="email" placeholder="Email">
      <select name="gender" class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
        <option value="Male">Boys</option>
        <option value="Female">Girls</option>
      </select>
      <input class="rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" type="number" name="hostel_rent" placeholder="Rent per bed">
      <input class="rounded-lg border border-dashed border-slate-300 px-4 py-4 text-sm md:col-span-2" type="file" name="hostel_image">
    </div>
    <button type="submit" class="mt-6 inline-flex items-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">Submit <i class="bx bx-right-arrow-alt"></i></button>
  </form>
</div>
@endsection
