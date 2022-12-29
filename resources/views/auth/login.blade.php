@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('login.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        @if(get_setting('logo'))
            <img src="{{ echo_setting('logo') }}" class="logo" alt="">
        @else
            <span class="brand-text font-weight-light">{{ echo_setting('company_name') }}</span>
        @endif


        {{-- <h1 class="h3 mb-3 fw-normal">Portaal</h1> --}}

        @include('layouts.partials.messages')

        <div class="form-group form-floating mt-3 mb-3">
            <input type="email" class="form-control" name="username" value="{{ old('username') }}" placeholder="Email" required="required" autofocus>
            <label for="floatingName">Email</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="row mb-3">
            <div class="d-flex justify-content-between">
                <div class="text-left">
                    <input type="checkbox" id="remember" name="remember" value="1">
                    <label for="remember">Remember</label>
                </div>
                <div class="">
                    <a href="{{ route('resetbyemail') }}">Forget Password?</a>
                </div>
            </div>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        <div class="register mt-3">
            <a href="{{ route('register.show') }}">Register Now</a>
        </div>
        {{-- @include('auth.partials.copy') --}}
    </form>
    <style>
        .logo {
            max-height: 70px;
        }
        .form-control:focus {
            box-shadow: unset;
        }
        .alert {
            padding: 10px;
            margin-bottom: 0px;
            top: 8px;
        }
    </style>
@endsection
