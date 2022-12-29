<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
      @if (isset($pageTitle))
        {{ $pageTitle }}
        @else
        {{ config('app.name') }}
      @endif
      </title>

    <link rel="shortcut icon" href="{{ asset('frontend/user/assets/images/fav.jpg') }}">
    {{-- <link rel="stylesheet" href="{{ asset('frontend/user/assets/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{ asset('frontend/user/assets/css/fontawsom-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/iziToast.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/user/assets/css/style.css') }}" />
    @stack('styles')
</head>

<body>
  <div class="container-fluid overcover">
      <div class="container profile-box">
          <div class="top-cover">
              <div class="covwe-inn">
                  <div class="row no-margin">
                      <div class="col-md-3 img-c">
                          <img src="{{ url('files/user_image/'.$user->image) }}"
                              alt="avatar" style=" width: 150px; height: 150px; object-fit: cover; object-position:center">
                      </div>
                      <div class="col-md-9 tit-det">
                          <h2>{{ $user->firstname }} {{ $user->lastname }}</h2>
                          <p>
                              Wellcome to your dashboard. Here you can Update your profile, and make payment.
                          </p>
                      </div>
                  </div>
              </div>
          </div>
          @yield('content')
          
    </div>
  </div>
  @include('backend.layouts.partials.messages')
  @stack('scripts')
</body>

{{-- <script src="{{ asset('frontend/user/assets/js/jquery-3.2.1.min.js') }}"></script> --}}
{{-- <script src="{{ asset('frontend/user/assets/js/popper.min.js') }}"></script> --}}
{{-- <script src="{{ asset('frontend/user/assets/js/bootstrap.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('backend/js/iziToast.js') }}"></script>
<script src="{{ asset('frontend/user/assets/js/script.js') }}"></script>
</html>