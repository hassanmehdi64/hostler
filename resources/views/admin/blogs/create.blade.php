@extends('admin.layouts.app')

@section('content')
<div class="mx-auto max-w-5xl space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Blogs</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">Create blog post</h1>
    <p class="mt-1 text-sm text-slate-600">Publish helpful content for hostel visitors.</p>
  </div>

  @if(session('message'))
    <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">{{ session('message') }}</div>
  @endif

  <form action="{{ route('add_blog') }}" method="POST" enctype="multipart/form-data" class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    @csrf
    <div class="grid gap-5 md:grid-cols-2">
      <div>
        <label class="block text-sm font-semibold text-slate-700">Blog Title</label>
        <input type="text" name="title" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Enter blog title">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Author</label>
        <input type="text" name="author" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Author name">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Publish Date</label>
        <input type="date" name="publish_date" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Featured Image</label>
        <input type="file" name="image" accept="image/*" required class="mt-2 w-full rounded-lg border border-dashed border-slate-300 px-4 py-3 text-sm">
      </div>
      <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-slate-700">Blog Content</label>
        <textarea name="description" rows="10" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm leading-6 outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Write blog content..."></textarea>
      </div>
    </div>
    <div class="mt-6 flex justify-end">
      <button type="submit" class="inline-flex items-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">
        Publish post
        <i class="bx bx-right-arrow-alt"></i>
      </button>
    </div>
  </form>
</div>
@endsection
