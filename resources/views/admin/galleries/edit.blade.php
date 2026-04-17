@extends('admin.layouts.app')

@section('content')
<div class="mx-auto max-w-4xl space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Galleries</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">Edit gallery</h1>
    <p class="mt-1 text-sm text-slate-600">Update gallery metadata and replace images if needed.</p>
  </div>

  <form action="{{ route('update-gallery', $gallaries->id) }}" method="POST" enctype="multipart/form-data" class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    @csrf
    @method('PUT')
    <div class="grid gap-5 md:grid-cols-2">
      <div>
        <label class="block text-sm font-semibold text-slate-700">Hostel Name</label>
        <input type="text" name="hostelName" value="{{ $gallaries->hostelName }}" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Location</label>
        <input type="text" name="location" value="{{ $gallaries->location }}" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
      </div>
      <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-slate-700">Images</label>
        <input type="file" name="imageFiles[]" accept="image/*" multiple class="mt-2 w-full rounded-lg border border-dashed border-slate-300 px-4 py-4 text-sm">
      </div>
    </div>
    <div class="mt-6 flex justify-end">
      <button type="submit" class="inline-flex items-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">
        Update gallery
        <i class="bx bx-save"></i>
      </button>
    </div>
  </form>
</div>
@endsection
