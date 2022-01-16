<!DOCTYPE html><html class=''>
<head>

<!--===============================================================================================-->
  <link rel="icon" type="image/png" href="{{ asset('counsel/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('/counsel/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('counsel/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('counsel/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('counsel/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('counsel/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('counsel/css/util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('counsel/css/main.css') }}">
<!--===============================================================================================-->

<x-app-layout>
@yield('content')
</x-app-layout>


<!--===============================================================================================-->
  <script src="{{ asset('counsel/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('counsel/vendor/bootstrap/js/popper.js') }}"></script>
  <script src="{{ asset('counsel/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('counsel/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('counsel/vendor/tilt/tilt.jquery.min.js') }}"></script>

<script>
  window.setInterval('refresh()', 10000);
    // Call a function every 10000 milliseconds 
    // (OR 10 seconds).

    // Refresh or reload page.
    function refresh() {
        window .location.reload();
    }
</script>
</body>
</html>
