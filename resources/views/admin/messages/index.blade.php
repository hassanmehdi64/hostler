@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Messages</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">User messages</h1>
    <p class="mt-1 text-sm text-slate-600">Messages submitted from the public contact form.</p>
  </div>

  <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Name</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Email</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Phone</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Message</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 bg-white">
          @forelse ($messages as $message)
            <tr class="hover:bg-slate-50">
              <td class="px-4 py-4 font-semibold text-slate-950">{{ $message->firstname }} {{ $message->lastname }}</td>
              <td class="px-4 py-4 text-sm text-slate-600">{{ $message->email }}</td>
              <td class="px-4 py-4 text-sm text-slate-600">{{ $message->phone }}</td>
              <td class="px-4 py-4 text-sm leading-6 text-slate-600">{{ $message->message }}</td>
            </tr>
          @empty
            <tr><td colspan="4" class="px-4 py-12 text-center text-slate-500">No messages found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
