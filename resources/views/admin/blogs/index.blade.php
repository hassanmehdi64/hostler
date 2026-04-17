@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
  <div class="flex flex-col justify-between gap-4 rounded-lg border border-slate-200 bg-white p-6 shadow-sm lg:flex-row lg:items-end">
    <div>
      <p class="text-sm font-semibold uppercase text-blue-700">Blogs</p>
      <h1 class="mt-2 text-2xl font-semibold text-slate-950">Blog posts</h1>
      <p class="mt-1 text-sm text-slate-600">Create, update, and remove public blog content.</p>
    </div>
    <a href="{{ route('newblogadd') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-slate-950 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
      <i class="bx bx-plus"></i>
      Add blog
    </a>
  </div>

  @if(session('deletemessage'))
    <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-800">{{ session('deletemessage') }}</div>
  @endif

  <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Post</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Author</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Date</th>
            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Description</th>
            <th class="px-4 py-3 text-right text-xs font-bold uppercase tracking-wide text-slate-500">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 bg-white">
          @forelse ($blogs as $blog)
            <tr class="hover:bg-slate-50">
              <td class="px-4 py-4">
                <div class="flex items-center gap-3">
                  <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="h-12 w-12 rounded-lg object-cover">
                  <p class="max-w-xs font-semibold text-slate-950">{{ $blog->title }}</p>
                </div>
              </td>
              <td class="px-4 py-4 text-sm text-slate-700">{{ $blog->author }}</td>
              <td class="px-4 py-4 text-sm text-slate-600">{{ $blog->publish_date }}</td>
              <td class="px-4 py-4 text-sm text-slate-600"><p class="line-clamp-2 max-w-md">{{ $blog->description }}</p></td>
              <td class="px-4 py-4">
                <div class="flex justify-end gap-2">
                  <a href="{{ route('edit-blog', ['id' => $blog->id]) }}" class="rounded-full border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:border-blue-200 hover:text-blue-700">Edit</a>
                  <a href="{{ route('delete-blog', ['id' => $blog->id]) }}" class="rounded-full border border-red-200 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-50">Delete</a>
                </div>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="px-4 py-12 text-center text-slate-500">No blog posts found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
