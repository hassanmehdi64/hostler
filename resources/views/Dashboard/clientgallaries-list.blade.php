@extends('Dashboard.master-layout')
@section('content')

<h2 class="h-list-heading">Galleries</h2>

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
                <th>Hostel Name</th>
                <th>Location</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($gallaries as $gallary)
            <tr>
                <td>{{ $gallary->hostelName }}</td>
                <td>{{ $gallary->location }}</td>

                <td>
                    @if (json_decode($gallary->imageFiles))
                        @foreach (json_decode($gallary->imageFiles) as $imageFile)
                            <img width="70px" src="{{ asset('/Gallaries/' . $imageFile) }}" alt="Image">
                        @endforeach
                    @else
                        No Images
                    @endif
                </td>

                <td>
                    <div class="d-flex">
                        <a href="{{ route('deletegallary', ['id' => $gallary->id ]) }}"><button class="delete">Delete</button></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
