@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Galleries</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">Gallery entries</h1>
    <p class="mt-1 text-sm text-slate-600">Review and manage uploaded hostel gallery images.</p>
  </div>

  @if(session('deletemessage'))
    <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-800">{{ session('deletemessage') }}</div>
  @endif
  @if(session('messageupdate'))
    <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">{{ session('messageupdate') }}</div>
  @endif

  <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Hostel</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Location</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Category</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Images</th>
            <th class="px-4 py-3 text-right text-xs font-bold uppercase tracking-wide text-slate-500">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 bg-white">
          @forelse ($allgalleries as $gallary)
            <tr class="hover:bg-slate-50">
              <td class="px-4 py-4 font-semibold text-slate-950">{{ $gallary->hostelName }}</td>
              <td class="px-4 py-4 text-sm text-slate-600">{{ $gallary->location }}</td>
              <td class="px-4 py-4 text-sm text-slate-600">{{ $gallary->category }}</td>
              <td class="px-4 py-4">
                <div class="flex max-w-md flex-wrap gap-2">
                  @forelse ((array) json_decode($gallary->imageFiles) as $imageFile)
                    <img src="{{ asset('Gallaries/' . $imageFile) }}" alt="{{ $gallary->hostelName }}" class="h-12 w-12 rounded-lg object-cover">
                  @empty
                    <span class="text-sm text-slate-500">No images</span>
                  @endforelse
                </div>
              </td>
              <td class="px-4 py-4">
                <div class="flex justify-end gap-2">
                  <a href="{{ route('editgallary', ['id' => $gallary->id]) }}" class="rounded-full border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:border-blue-200 hover:text-blue-700">Edit</a>
                  <a href="{{ route('deletegallary', ['id' => $gallary->id]) }}" class="rounded-full border border-red-200 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-50">Delete</a>
                </div>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="px-4 py-12 text-center text-slate-500">No gallery entries found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
