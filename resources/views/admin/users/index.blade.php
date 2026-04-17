@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Users</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">User accounts</h1>
    <p class="mt-1 text-sm text-slate-600">Manage account roles and status.</p>
  </div>

  @if(session('message'))
    <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">{{ session('message') }}</div>
  @endif

  <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">#</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">User</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Role</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Status</th>
            <th class="px-4 py-3 text-right text-xs font-bold uppercase tracking-wide text-slate-500">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 bg-white">
          @forelse($users as $user)
            <tr class="hover:bg-slate-50">
              <td class="px-4 py-4 text-sm text-slate-500">{{ $loop->iteration }}</td>
              <td class="px-4 py-4">
                <p class="font-semibold text-slate-950">{{ $user->name }}</p>
                <p class="text-sm text-slate-500">{{ $user->email }}</p>
              </td>
              <td class="px-4 py-4">
                @if($user->role == 1)
                  <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">Admin</span>
                @else
                  <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700">Hostel Manager</span>
                @endif
              </td>
              <td class="px-4 py-4">
                @if($user->status == 1)
                  <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">Active</span>
                @else
                  <span class="rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-700">Inactive</span>
                @endif
              </td>
              <td class="px-4 py-4">
                <div class="flex justify-end gap-2">
                  <a href="{{ route('updateuser', ['id' => $user->id, 'name' => $user->name]) }}" class="rounded-full border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:border-blue-200 hover:text-blue-700">Edit</a>
                  <a href="{{ route('deleteuser', ['id' => $user->id]) }}" class="rounded-full border border-red-200 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-50">Delete</a>
                </div>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="px-4 py-12 text-center text-slate-500">No users found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
