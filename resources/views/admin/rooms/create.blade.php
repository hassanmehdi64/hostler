@extends('admin.layouts.app')

@section('content')
<div class="mx-auto max-w-3xl space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Rooms</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">Add room</h1>
    <p class="mt-1 text-sm text-slate-600">Create a room option for this hostel.</p>
  </div>

  @if(session('message'))
    <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">{{ session('message') }}</div>
  @endif

  <form action="{{ route('roomadddone', $hostels_id) }}" method="POST" enctype="multipart/form-data" class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    @csrf
    <div class="grid gap-5 md:grid-cols-2">
      <div>
        <label class="block text-sm font-semibold text-slate-700">Room Type</label>
        <select name="name" class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
          <option value="normal">Normal</option>
          <option value="special">Special</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Number Of Beds</label>
        <select name="num" class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
          @for($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>
      </div>
      <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-slate-700">Room Image</label>
        <input type="file" name="image" class="mt-2 w-full rounded-lg border border-dashed border-slate-300 px-4 py-4 text-sm">
      </div>
    </div>
    <button type="submit" class="mt-6 inline-flex items-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">
      Submit
      <i class="bx bx-right-arrow-alt"></i>
    </button>
  </form>
</div>
@endsection
