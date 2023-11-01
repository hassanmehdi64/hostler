@extends('Dashboard.master-layout')
@section('content')

<section class="image-container">
    <h1>Edit Gallery</h1>
    <form id="imageForm" action="{{ route('update-gallery', $gallaries->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="hostelName">Hostel Name:</label>
        <input type="text" id="hostelName" name="hostelName" value="{{ $gallaries->hostelName }}" placeholder="Enter Hostel Name" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="{{ $gallaries->location }}" placeholder="Enter Hostel Location" required>

        <label for="imageFiles">Choose Images:</label>
        <input type="file" id="imageFiles" name="imageFiles[]" accept="image/*" multiple>

        <button type="submit">Update Gallery</button>
    </form>
</section>

@endsection