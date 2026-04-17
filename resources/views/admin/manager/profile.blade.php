



@extends('admin.layouts.app')
@section('content')

<H4>User Name: {{ $user->name }}</H4>
<p>email : {{ $user->email }}</p>

    @endsection
