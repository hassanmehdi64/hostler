@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Feedback</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">User feedback</h1>
    <p class="mt-1 text-sm text-slate-600">Review feedback displayed or collected from users.</p>
  </div>

  <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">User</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Feedback</th>
            <th class="px-4 py-3 text-right text-xs font-bold uppercase tracking-wide text-slate-500">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 bg-white">
          @forelse ($feedbacks as $message)
            <tr class="hover:bg-slate-50">
              <td class="px-4 py-4">
                <div class="flex items-center gap-3">
                  <img src="{{ asset($message->profile) }}" alt="{{ $message->name }}" class="h-10 w-10 rounded-full object-cover">
                  <p class="font-semibold text-slate-950">{{ $message->name }}</p>
                </div>
              </td>
              <td class="px-4 py-4 text-sm leading-6 text-slate-600">{{ $message->feedback }}</td>
              <td class="px-4 py-4 text-right">
                <a href="{{ route('feedbacksdelete', $message->id) }}" class="rounded-full border border-red-200 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-50">Delete</a>
              </td>
            </tr>
          @empty
            <tr><td colspan="3" class="px-4 py-12 text-center text-slate-500">No feedback found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
