<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ get_setting('favicon') }}">
    <title>{{ @$pageTitle }}</title>

    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/iziToast.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>

    @stack('styles')
    <style>
        .wrapper .content-wrapper {
        min-height: calc(100vh - calc(3.5rem + 0px) - calc(3.5rem + 0px)) !important;
        }
    </style>
</head>

    <body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">


        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('backend.layouts.partials.header_navbar')
        </nav>

        <aside class="main-sidebar sidebar-light-primary elevation-4" style="background: url(/backend/images/dashboard_left_menu_bg.jpg)">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard.index') }}" class="brand-link">
                @if(get_setting('logo'))
                    <img src="{{ echo_setting('logo') }}" alt="">
                @else
                    <span class="brand-text font-weight-light">{{ echo_setting('company_name') }}</span>
                @endif
            </a>

            <!-- Sidebar -->
            <div class="sidebar">


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                   @include('backend.layouts.partials.left_nav')
                </nav>
            </div>
        </aside>

        <div class="content-wrapper" style="">
            <?php isset( $BreadCrumbs ) ? DashboardHeader( $BreadCrumbs ) : DashboardHeader(); ?>

            <section class="content mt-3">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('backend/js/iziToast.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <!-- PAGE PLUGINS -->

    @include('backend.layouts.partials.messages')
    @stack('scripts')

</body>

</html>
