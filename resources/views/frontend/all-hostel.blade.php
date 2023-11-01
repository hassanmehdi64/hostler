@extends("frontend.layout.main")

@section('main-container')
  <div class="unique-hostel-list-container">
    <h2 class="unique-hostel-list-heading">List of Available Hostels</h2>

    <div class="unique-hostel-list-filter">
      <!-- Add your filter buttons here if needed -->
    </div>

    <ul class="unique-hostel-list">
      @foreach ($hostels as $hostel)
      <li class="unique-hostel-item" data-category="category1">
        <div class="unique-hostel-item-image">
          <img src="/{{ $hostel->hostel_image }}" alt="{{ $hostel->name }}" width="80">
        </div>
        <div class="unique-hostel-item-details">
          <a href="{{ route('hostel-detail', ['id' => $hostel->id]) }}" class="unique-hostel-item-link">
            <h3 class="unique-hostel-item-name">{{ $hostel->name }}</h3>
          </a>
          <p class="unique-hostel-item-description">{{ $hostel->description }}</p>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
@endsection



<style>
    /* Style the main container for the hostel list */
.unique-hostel-list-container {
    text-align: center;
    padding: 20px;
 padding-top: 90px
  }

  /* Style the heading for the hostel list */
  .unique-hostel-list-heading {
    font-size: 24px;
    color: #333;
    margin: 20px 0;
  }

  /* Style the filter buttons */
  /* .unique-hostel-list-filter {
    /* Add styles for your filter buttons here
  } */

  /* Style the hostel list */
  .unique-hostel-list {
    list-style: none;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  /* Style each hostel item */
  .unique-hostel-item {
    margin: 10px;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
    width: 250px;
  }

  /* Style the hostel item image */
  .unique-hostel-item-image {
    width: 100%;
    height: 100px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.unique-hostel-item-image img{
    width: 100%;
  height: 100px;
  object-fit: cover;
  object-position: center

  }

  /* Style the hostel item details */
  .unique-hostel-item-details {
    margin-top: 10px;
  }

  /* Style the hostel link */
  .unique-hostel-item-link {
    text-decoration: none;
    color: #007BFF;
    font-weight: bold;
    display: block;
    margin-top: 10px;
  }

  /* Style the hostel name */
  .unique-hostel-item-name {
    font-size: 18px;
    color: #333;
    margin: 5px 0;
  }

  /* Style the hostel description */
  .unique-hostel-item-description {
    font-size: 16px;
    color: #777;
  }

</style>
