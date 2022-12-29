<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ get_setting('favicon') }}">
    <title>{{ get_setting('name') }} | @stack('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/iziToast.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    @stack('styles')
</head>

<body>

    <nav class="navbar my-navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="{{ get_setting('Logo') }}" alt="" class="img-fluid"/>
                | {{ get_setting('name') }}</a
            >
            <button
                class="navbar-toggler border-0"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span
                class="iconify bar-icon"
                data-icon="fa-solid:bars"
                data-inline="false"
                ></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item nav-active">
                        <a class="nav-link" href="{{ route('home.index') }}"
                        >Home <span class="sr-only">(current)</span></a
                        >
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
    <div class="clear"></div>
    <main class="">
        @yield('content')

    </main>

    <!--footer starts from here-->
    <footer class="footer mt-5">
        <div class="container bottom_border">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 mt-5">
                    <p class="text-center text-white">
                       {{ echo_setting('footer_description') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="container text-center">
            <!--foote_bottom_ul_amrc ends here-->
            <p class="text-center mt-3">{{ echo_setting('footer_copyright') }}</a></p>

            @if(get_setting('facebook_url') || get_setting('twitter_url') || get_setting('linkedin_url') || get_setting('instagram_url'))
                <ul class="social_footer_ul">
                    @if(get_setting('facebook_url'))<li><a href="{{ echo_setting('facebook_url') }}"><i class="fab fa-facebook-f"></i></a></li>@endif
                    @if(get_setting('twitter_url'))<li><a href="{{ echo_setting('twitter_url') }}"><i class="fab fa-twitter"></i></a></li>@endif
                    @if(get_setting('linkedin_url'))<li><a href="{{ echo_setting('linkedin_url') }}"><i class="fab fa-linkedin"></i></a></li>@endif
                    @if(get_setting('instagram_url'))<li><a href="{{ echo_setting('instagram_url') }}"><i class="fab fa-instagram"></i></a></li>@endif
                </ul>
            @endif
            <!--social_footer_ul ends here-->
        </div>

    </footer>
    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('frontend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/iziToast.js') }}"></script>
    <!-- PAGE PLUGINS -->

    @include('backend.layouts.partials.messages')
    @stack('scripts')

</body>

</html>
