<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('assets/img/myinnovet-icon.ico') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/b7848caaf8.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
      @media (min-width: 768px) {
        .h-md-100 { height: 100vh; }
      }
      .btn-round { border-radius: 30px; }
      .bg-ghost-white { background: #F9FAFB; }
      .bg-antiflash-white { background: #F0F0F0; }
    </style>
</head>
<body>

  <div class="d-md-flex h-md-100 align-items-center">
    <!-- First Half -->
    <div class="col-md-6 p-0 bg-ghost-white h-md-100">
        <div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
            <div class="logoarea pt-5 pb-5 text-dark">
                First half content here
            </div>
        </div>
    </div>

    <!-- Second Half -->
    <div class="col-md-6 p-0 bg-antiflash-white h-md-100 loginarea">
        <div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">
            <img src="{{ asset('assets/img/login-img.svg') }}" alt="">
        </div>
    </div>  
  </div>
    {{-- <div id="app">
      <div class="container-fluid">
        <div class="row">
          <div class="col py-4" style="background-color: #F9FAFB;">
            
          </div>
          <div class="col py-4" style="background-color: #F0F0F0;">
            
          </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}
</body>
</html>
