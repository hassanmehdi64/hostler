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
                <th>Profile</th>
                <th>Feedback</th>
                <th>Action</th>
              
            </tr>
        </thead>

        <tbody>
@if(Auth::user()->role == 1)


            @foreach ($feedbacks as $message)
            <tr>
                <td>{{ $message->name}}  </td>
                <td>
                    <img width="33px" src="/{{ $message->profile }}">
                </td>
                <td>{{ $message->feedback }}</td>
                <td> 
                    <a href="{{route('feedbacksdelete' , $message->id)}}"><button style="padding: 10px 14px; background-color:red;">Delete </button>
</a></td>
                    
            
              
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection
