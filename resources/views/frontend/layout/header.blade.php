<!DOCTYPE html>
<!-- Created By Hassan -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Gb Hosteler</title>
    <link rel="stylesheet" href="{{ url('frontend/style.css')}}" />
    <link rel="stylesheet" href="{{ url('frontend/show_hostel.css')}}" />
    <link rel="stylesheet" href="{{ url('frontend/contact.css')}}" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ ('frontend/images/logo.png') }}">

    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css')}}" integrity="sha512-..." crossorigin="anonymous" />
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap rel=stylesheet" ')}}"/>
  <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css')}}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <nav>
      <div class="menu-icon">
        <span class="fas fa-bars" style="color: #000;"></span>
      </div>
      <div class="logo"> <img  src="/{{ $settings->logo}}" alt=""></div>
      <div class="nav-items">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/about') }}">About</a></li>
        <li><a href="{{ url('/gallery') }}">Gallery</a></li>
        <li><a href="{{ route('hostels') }}">Hostels</a></li>
        <li><a href="{{ url('/blogs') }}">Blog</a></li>
        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
        <li><a href="{{ url('/register') }}">Register</a></li>
        <li><a href="{{ url('/login') }}">Login</a></li>
      </div>



      <div class="cancel-icon" style="color: #000;">
        <span class="fas fa-times" style="color: #000;"></span>
      </div>
    </nav>
