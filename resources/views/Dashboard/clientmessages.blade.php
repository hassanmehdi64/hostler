@extends('Dashboard.master-layout')
@section('content')

<h2 class="h-list-heading">User Messages</h2>

@if(session('deletemessage'))
<div style="width:100%; padding:7px; color: #ffffff; background-color: rgba(109, 27, 6, 0.555); text-align: center" id="messageAlert">
    <span> {{ session('deletemessage') }}</span>
</div>
@endif

@if(session('messageupdate'))
<div style="width:100%; padding:7px; color: #ffffff; background-color: rgba(39, 153, 4, 0.479); text-align: center" id="messageAlert">
    <span> {{ session('messageupdate') }}</span>
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
                <th> Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
              
            </tr>
        </thead>

        <tbody>
@if(Auth::user()->role == 1)


            @foreach ($messages as $message)
            <tr>
                <td>{{ $message->firstname}}  {{ $message->lastname}} </td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->phone }}</td>
                <td>{{ $message->message }}</td>
            
              
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection
