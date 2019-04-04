<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Q-niela</title>
  <!-- Favicon -->
  <link href="{{ asset('argon/assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('argon/assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{ asset('argon/assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
</head>

<body>
  <!-- Sidenav -->
  @include('layouts.home-menu-layout')
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
  @include('layouts.home-top-bar-layout')
    <!-- Header -->
    <main class="py-4">
        @yield('content')
    </main>
    <!-- Page content -->
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('argon/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd3PjUqq81lIOfBPYXrQGWwK5T4ystZjA"></script>
  <!-- Argon JS -->
  <script src="{{ asset('argon/assets/js/argon.js?v=1.0.0') }}"></script>
</body>

</html>
