<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Dashboard/css/dropdown.css') }}">
   <title></title>
</head>
<body>


    <div class="profile-dropdown">
        <div class="profile-button" id="profile-button">
           <span><img src="/{{ Auth::user()->image }}" alt="" style="width:60px; border-radius:10%"></span>
            <span>{{ Auth::user()->name }}</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="dropdown-content">
            <a href="{{ route('profile') }}"><i class="fas fa-user-edit"></i> {{ Auth::user()->image }}</a>

            <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>


    <script>
      // JavaScript to toggle the dropdown on click
    const profileButton = document.getElementById("profile-button");
    const dropdownContent = document.querySelector(".dropdown-content");

    let isDropdownOpen = false; // Variable to track the dropdown state

    profileButton.addEventListener("click", function() {
    if (isDropdownOpen) {
        dropdownContent.style.display = "none"; // Close the dropdown
    } else {
        dropdownContent.style.display = "block"; // Open the dropdown
    }

    isDropdownOpen = !isDropdownOpen; // Toggle the dropdown state
    });

    // JavaScript to close the dropdown when clicking outside of it
    document.addEventListener("click", function(event) {
    if (!profileButton.contains(event.target) && !dropdownContent.contains(event.target)) {
        dropdownContent.style.display = "none"; // Close the dropdown
        isDropdownOpen = false; // Update the dropdown state
    }
    });


    </script>



</body>
</html>
