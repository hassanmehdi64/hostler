@extends('Dashboard.master-layout')
@section('content')

{{-- New Users --}}

<h4 id="add-users">New Users</h4>

<div class="user-table">
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @if($user->role ==1)
            <span>Admin</span>
            @else
            <span>Hostel Managers</span>
            @endif
        </td>


        <td>
            @if($user->status ==1)
            <span>Active</span>
            @else
            <span>De-Active</span>
            @endif
        </td>

        <td>
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('updateuser', ['id'=>$user->id , 'name'=> $user->name]) }}"> <button class="text-info">Edit</button></a>
                </div>

                <div class="">
                  <a href="{{ route('deleteuser', ['id'=>$user->id]) }}">  <button style="color: white; background: red;">Delete</button></a>
                </div>

            </div>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
