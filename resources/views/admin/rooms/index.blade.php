@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Rooms</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">Rooms list</h1>
    <p class="mt-1 text-sm text-slate-600">Room types and bed counts attached to hostels.</p>
  </div>

  @if(session('deletemessage'))
    <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-800">{{ session('deletemessage') }}</div>
  @endif

  <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Room</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Beds</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 bg-white">
          @forelse ($rooms as $room)
            <tr class="hover:bg-slate-50">
              <td class="px-4 py-4">
                <div class="flex items-center gap-3">
                  <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="h-12 w-12 rounded-lg object-cover">
                  <p class="font-semibold capitalize text-slate-950">{{ $room->name }}</p>
                </div>
              </td>
              <td class="px-4 py-4 text-sm font-semibold text-slate-700">{{ $room->num }}</td>
            </tr>
          @empty
            <tr><td colspan="2" class="px-4 py-12 text-center text-slate-500">No rooms found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
