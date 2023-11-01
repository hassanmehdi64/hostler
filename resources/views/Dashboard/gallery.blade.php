@extends('Dashboard.master-layout')
@section('content')


@if(session('message'))
<div style="width:100%; padding:7px; color: #ffffff; background-color: rgba(6, 109, 6, 0.555); text-align: center" id="messageAlert">
    {{ session('message') }}
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



    <div class="image-container">
        <h1>Add Gallery</h1>

        <form id="imageForm" action="{{ url('add-gallery' , $hostel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
            <label for="hostelName">Hostel Name:</label>
            <input type="text" id="hostelName" readonly  value="{{ $hostel->name }}" name="hostelName" placeholder="Enter Hostel Name" required>
            @error('hostelName')
            <span style="color: red;">{{ $message }}</span>
        @enderror


        <label for="hostelName">Hostel Location:</label>
        <input type="text" id="hostelName" readonly  value="{{ $hostel->location }}" name="location" placeholder="Enter Hostel Name" required>
        @error('location')
        <span style="color: red;">{{ $message }}</span>
    @enderror


        <label for="heading">Category:</label>
        <input type="text" id="heading"  value="{{ $hostel->category }}" name="category" placeholder="Enter Hostel Location" required>
        @error('category')
        <span style="color: red;">{{ $message }}</span>
    @enderror




            <label for="imageFiles">Choose Images:</label>
            <input type="file" id="imageFiles" name="imageFiles[]"  accept="image/*" multiple required>
            @error('imageFiles')
            <span style="color: red;">{{ $message }}</span>
        @enderror
            <button type="submit">Add Images</button>
        </form>
    </div>

    @endsection
