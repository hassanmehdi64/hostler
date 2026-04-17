@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
  <div class="flex flex-col justify-between gap-4 rounded-lg border border-slate-200 bg-white p-6 shadow-sm lg:flex-row lg:items-end">
    <div>
      <p class="text-sm font-semibold uppercase text-blue-700">Hostels</p>
      <h1 class="mt-2 text-2xl font-semibold text-slate-950">Hostels list</h1>
      <p class="mt-1 text-sm text-slate-600">Manage hostel listings, gallery entries, and listing details.</p>
    </div>
    <a href="{{ route('add-hostel') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-slate-950 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
      <i class="bx bx-plus"></i>
      Add hostel
    </a>
  </div>

  @if(session('message'))
    <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">{{ session('message') }}</div>
  @endif
  @if(session('deletemessage'))
    <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-800">{{ session('deletemessage') }}</div>
  @endif

  <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Hostel</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Manager</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Contact</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Type</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Rent</th>
            <th class="px-4 py-3 text-right text-xs font-bold uppercase tracking-wide text-slate-500">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 bg-white">
          @forelse ($hostels as $hostel)
            <tr class="hover:bg-slate-50">
              <td class="px-4 py-4">
                <div class="flex items-center gap-3">
                  <img src="{{ asset($hostel->hostel_image) }}" alt="{{ $hostel->name }}" class="h-12 w-12 rounded-lg object-cover">
                  <div>
                    <p class="font-semibold text-slate-950">{{ $hostel->name }}</p>
                    <p class="text-sm text-slate-500">{{ $hostel->location }}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-4 text-sm text-slate-700">{{ $hostel->hostel_manager_name }}</td>
              <td class="px-4 py-4 text-sm text-slate-600">
                <p>{{ $hostel->mobile_number }}</p>
                <p class="truncate text-xs text-slate-400">{{ $hostel->email }}</p>
              </td>
              <td class="px-4 py-4">
                <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold capitalize text-blue-700">{{ $hostel->gender }}</span>
              </td>
              <td class="px-4 py-4 text-sm font-semibold text-slate-950">{{ $hostel->hostel_rent }}</td>
              <td class="px-4 py-4">
                <div class="flex justify-end gap-2">
                  <a href="{{ route('edit-hostel', ['id' => $hostel->id]) }}" class="rounded-full border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:border-blue-200 hover:text-blue-700">Edit</a>
                  <a href="{{ route('add_gallery', ['id' => $hostel->id, 'name' => $hostel->name]) }}" class="rounded-full border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:border-blue-200 hover:text-blue-700">Gallery</a>
                  <a href="{{ route('delete-hostel', ['id' => $hostel->id]) }}" class="rounded-full border border-red-200 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-50">Delete</a>
                </div>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="px-4 py-12 text-center text-slate-500">No hostels found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
