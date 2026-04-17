@extends('admin.layouts.app')

@section('content')
<div class="mx-auto max-w-3xl space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">Feedback</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">Submit feedback</h1>
    <p class="mt-1 text-sm text-slate-600">Add feedback that can be reviewed by the admin team.</p>
  </div>

  @if(session('message'))
    <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">{{ session('message') }}</div>
  @endif

  <form action="{{ route('donefeedaback') }}" method="POST" enctype="multipart/form-data" class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    @csrf
    <div class="space-y-5">
      <div>
        <label class="block text-sm font-semibold text-slate-700">Name</label>
        <input type="text" value="{{ Auth::user()->name }}" readonly name="name" class="mt-2 w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Profile Image</label>
        <input type="file" name="profile" required class="mt-2 w-full rounded-lg border border-dashed border-slate-300 px-4 py-4 text-sm">
      </div>
      <div>
        <label class="block text-sm font-semibold text-slate-700">Feedback</label>
        <textarea name="feedback" rows="5" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 text-sm leading-6 outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100"></textarea>
      </div>
    </div>
    <button type="submit" class="mt-6 inline-flex items-center gap-2 rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">
      Submit feedback
      <i class="bx bx-right-arrow-alt"></i>
    </button>
  </form>
</div>
@endsection
