<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>GB Hosteler</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="icon" href="{{ asset('frontend/images/logo.png') }}">
</head>
<body class="font-['Poppins'] bg-gray-50 text-slate-900 min-h-screen antialiased">
  @include('frontend.partials.header')
  
  <main class="pt-16">
    @yield('main-container')
  </main>
  
  @include('frontend.partials.footer')
  
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
