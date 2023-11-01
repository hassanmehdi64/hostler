@extends('Dashboard.master-layout')
@section('content')


@if(session('message'))

<div class='alert alert-warning'>
    {{session('message')}}
</div>

@endif


    @foreach ($hostel as  $myhostel)

    <div class="hostel-card">
        <h2 class="hostel-card-title">Hostel Name</h2>
        <div class="hostel-card-content">
          <div class="hostel-card-image">
            <img src="frontend/hostel/{{ $myhostel->image }}" alt="Hostel Image">
          </div>
          <div class="hostel-card-info">
            <p><strong>Location:</strong> {{ $myhostel->location }}</p>
            <p><strong>Manager Name:</strong> {{ $myhostel->hostel_manager_name }}</p>
            <p><strong>Phone:</strong> {{ $myhostel->phone }}</p>
            <p><strong>Email:</strong> {{ $myhostel->email }}</p>
              <div class="card-buttons">
              <a href="/hostel/manager/hostel-update/{{ $myhostel->id }}" class="styled-link">Edit Hostel</a>
              <a href="/hostel/manager/hostel-create" class="styled-link">Add Hostel</a>
              <a href="/hostel/manager/profile" class="styled-link show-profile">Read More</a>
            </div>
          </div>
        </div>
      </div>


    @endforeach

    @endsection
