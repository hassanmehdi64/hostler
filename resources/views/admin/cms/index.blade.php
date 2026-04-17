@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
  <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-semibold uppercase text-blue-700">CMS</p>
    <h1 class="mt-2 text-2xl font-semibold text-slate-950">Content management</h1>
    <p class="mt-1 text-sm text-slate-600">Use this area for future editable website sections.</p>
  </div>

  <div class="rounded-lg border border-slate-200 bg-white p-10 text-center shadow-sm">
    <i class="bx bx-layout mb-3 block text-5xl text-slate-300"></i>
    <h2 class="text-lg font-semibold text-slate-950">CMS section placeholder</h2>
    <p class="mx-auto mt-2 max-w-xl text-sm leading-6 text-slate-600">No editable CMS fields are wired here yet. Add content controls when the homepage/about sections need admin-managed copy.</p>
  </div>
</div>
@endsection
