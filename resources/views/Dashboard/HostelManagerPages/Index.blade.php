@extends('Dashboard.master-layout')
@section('content')

    @foreach ($hostel as  $myhostel)


<p>Hostel Location:  {{ $myhostel->location }}</p>
<p> Hostel Manager Name:  {{ $myhostel->hostel_manager_name }}</p>
<p>Hostel Phone Number:  {{ $myhostel->phone }}</p> 

    @endforeach

    @endsection




