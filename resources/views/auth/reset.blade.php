@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('resetMailSend') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        @if(get_setting('logo'))
            <img src="{{ echo_setting('logo') }}" class="logo" alt="">
        @else
            <span class="brand-text font-weight-light">{{ echo_setting('company_name') }}</span>
        @endif


        <h1 class="h3 mb-3 fw-normal mt-4">Wachtwoord Wijzigen</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('resetemail') }}" placeholder="E-mail" required="required" autofocus>
            <label for="email">E-mail</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="btn-group w-100">
            <a href="{{ route('login.show') }}" class="btn-lg btn-dark btn">Annuleren</a>
            <button class="btn btn-lg btn-primary" type="submit">Verzenden</button>
        </div>


    </form>
    <style>
        .logo {
            max-height: 70px;
            position: relative;
            top: -45px;
        }
        .form-control:focus {
            box-shadow: unset;
        }
        form {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
        }
        h1.h3 {
            position: relative;
            top: -66px;
        }
        .alert {
            top: 68px;
            padding-top: 3px;
            padding-bottom: 3px;
            position: absolute;
            width: 100%;
            min-height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection
