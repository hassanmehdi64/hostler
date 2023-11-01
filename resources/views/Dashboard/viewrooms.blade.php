@extends('Dashboard.master-layout')
@section('content')




<h2 class="h-list-heading">Rooms List </h2>

@if(session('deletemessage'))
<div style="width:100%; padding:7px; color: #ffffff; background-color: rgba(109, 27, 6, 0.555); text-align: center" id="messageAlert">
 <span> {{ session('deletemessage') }}</span>
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
                <th>Image</th>
                <th>Num of Rooms</th>
            </tr>
        </thead>

        @foreach ($rooms as $room )
      <tr>
        <td>{{$room->name}}</td>
        <td>
            <img width="50px"  height="50px" src="/{{$room->image}}" alt="data">
        </td>
        <td>{{$room->num}}</td>
          </tr>

          @endforeach
    </tbody>
  </table>


</div>

@endsection
