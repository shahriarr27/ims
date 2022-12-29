<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ get_setting('favicon') }}">
    <title>{{ @$pageTitle }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/iziToast.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    @stack('styles')
</head>

<body style="background: url('/backend/images/bg-1.jpg') no-repeat center center">
  <main class="py-4">
    @yield('content')

  </main>

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('frontend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/iziToast.js') }}"></script>
<script src="{{ asset('frontend/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('frontend/js/scripts.js') }}"></script>
<!-- PAGE PLUGINS -->

@include('backend.layouts.partials.messages')
@stack('scripts')

</body>

</html>
