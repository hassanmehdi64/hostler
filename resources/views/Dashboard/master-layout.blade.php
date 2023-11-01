<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>gb hosteler</title>
    <!-- Boxicons CDN Link -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"> <!-- Include Remix Icons CSS -->
    <link rel="stylesheet" href="{{ asset('Dashboard/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard/css/show-hostel.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard/css/users.css') }}">

  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <a href="{{ route('dashboard_home') }}"><span class="logo_name">Hosteller</span></a>
      </div>
      <ul class="nav-links">
        <li>
          <a href="{{ route('dashboard_home') }}" class="active" >
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>

        @if(auth()->user()->role  == 0)
        <li class="dropdown">
            <a href="{{ route('showhostel') }}" >
                <i class="add-details-icon bx bx-edit"></i>
                <span class="links_name">Manage Hostels</span>
            </a>
        </li>

        @endif

@if(auth()->user()->role  == 1)
        <li class="dropdown">
            <a href="#" class="dropdown-toggle">
                <i class="add-details-icon bx bx-edit"></i>
                <span class="links_name">Manage Hostels</span>
                <i class="bx bxs-chevron-down arrow"></i>
            </a>
            <ul class="dropdown-menu" id="hostelsDropdownMenu">
                <li><a href="{{ route('add-hostel') }}"><i class="bx bx-plus"></i>Add New Hostel</a></li>
                <li><a href="{{ route('hostels-list') }}"><i class="bx bx-show"></i>Show Hostels</a></li>
            </ul>
        </li>


        <li class="dropdown">
         <a href="#" class="dropdown-toggle">
                <i class="bx bx-file"></i>
                <span class="links_name">Manage Blogs</span>
                <i class="bx bxs-chevron-down arrow"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('add_blog') }}"><i class="bx bx-plus"></i>Add New Blog</a></li>
                <li><a href="{{ route('view_blog') }}"><i class="bx bx-show"></i>Show Blogs</a></li>
            </ul>
        </li>


<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="gallery-icon bx bx-images"></i>
        <span class="links_name">Manage Gallery</span>
        <i class="bx bxs-chevron-down arrow"></i>
    </a>
    <ul class="dropdown-menu">
        <li><a href="{{ route('view-galleries') }}"><i class="bx bx-show"></i>Show Galleries</a></li>
    </ul>
</li>






        <li>
            <a href="{{ route('users') }}">
            <i class="ri-file-user-fill"></i>
              <span class="links_name">Users</span>
            </a>
          </li>


      


          <li>
          <a href="{{ route('messages') }}">
           <i class="ri-chat-3-line"></i>
            <span class="links_name">Messages</span>
          </a>
        </li>



          <li>
          <a href="{{ route('feedbacks') }}">
         <i class="ri-feedback-line"></i>
            <span class="links_name">Feedbacks</span>
          </a>
        </li>

  <li>
          <a href="{{ route('settings') }}">
            <i class="bx bx-cog"></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        @endif


        @if(auth()->user()->role  == 0)
        <li>
            <a href="{{ route('profile') }}">
            <i class="ri-profile-fill"></i>
              <span class="links_name">Profile Setting</span>
            </a>
          </li>

            <li>
            <a href="{{ route('submitfeedback') }}">
            <i class="ri-feedback-fill"></i>
              <span class="links_name">Submit Feedback</span>
            </a>
          </li>
@endif

        <li class="log_out">
          <a href="{{ route('logout') }}">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>


    <section class="home-section">
      <nav id="dashboard-nav">
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="nav-dashboard">Dashboard</span>
        </div>

    <img style="height:60px; margin:auto" src="{{ ('frontend/images/logo.png') }}">


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchForm = document.getElementById('search-form');
                const searchInput = document.getElementById('search-input');

                searchForm.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent the form from submitting.

                    // Get the search query from the input field.
                    const query = searchInput.value.trim();

                    // Highlight the matched text in the result.
                    highlightTextInResults(query);
                });

                function highlightTextInResults(query) {
                    const results = document.querySelectorAll('.search-result');

                    results.forEach(result => {
                        const text = result.textContent;
                        const highlightedText = text.replace(new RegExp(query, 'gi'), match => {
                            return `<span class="highlight">${match}</span>`;
                        });

                        result.innerHTML = highlightedText;
                    });
                }
            });
        </script>   

  <div class="dropdown">
    @include('Dashboard.profiledropdown')
  </div>

      </nav>

       <div class="home-content">


   @yield('content')

      </div>

    </section>



    <script src="{{ url('Dashboard/javascript/script.js') }}"></script>
  </body>
</html>
