
@extends('Dashboard.master-layout')
@section('content')

<h2 class="h-list-heading">Hostels List </h2>


            @if(session('message'))
            <div style="color: white; padding: 7px; text-align: center; background-color: rgba(6, 110, 20, 0.562)" id="messageAlert">
            <span>{{ session('message') }}</span>
            </div>
            @endif


            @if(session('deletemessage'))
            <div style="color: white; padding: 7px; text-align: center; background-color: rgba(139, 8, 8, 0.562)" id="messageAlert">
            <span>{{ session('deletemessage') }}</span>
            </div>
            @endif




<script>
    // Check if the message alert exists
    var messageAlert = document.getElementById('messageAlert');
    if (messageAlert) {
        // Add a duration of 5000ms (5 seconds)
        setTimeout(function () {
            messageAlert.remove();
        }, 4000); // Adjust the duration as needed
    }
</script>





<div class="table-container">
    <table class="responsive-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>image</th>
                <th>Manager</th>
                <th>Mobile No</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Rent</th>
                <th>Action</th>
            </tr>
        </thead>

        @foreach ($hostels as $hostel )
      <tr>
        <td>{{$hostel->name }}</td>
        <td>{{$hostel->location }}</td>
        <td><img src="/{{$hostel->hostel_image }}" width="90px" alt=""></td>
        <td>{{$hostel->hostel_manager_name }}</td>
        {{-- <td>{{$hostel->phone }}</td> --}}
        <td>{{$hostel->mobile_number }}</td>
        <td>{{$hostel->email }}</td>
        <td>{{$hostel->gender }}</td>
        <td>{{$hostel->hostel_rent }}</td>
        <td>

            <div class="d-flex">
                    <a href="{{ route('edit-hostel', ['id'=>$hostel->id ]) }}"> <button class="edit">Edit</button></a>
                    <a href="{{ route('delete-hostel', ['id'=>$hostel->id ]) }}"> <button class="delete">Delete</button></a>
                    <a href="{{ route('add_gallery', ['id'=>$hostel->id, 'name'=>$hostel->name]) }}"> <button class="text-info"> +Gallery</button></a>
            </div>
        </td>
          </tr>

          @endforeach
    </tbody>
  </table>


</div>

@endsection
