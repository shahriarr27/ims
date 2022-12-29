@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('changePassword') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="reset_token" value="{{ $token->token }}" />
        @if(get_setting('logo'))
            <img  src="{{ echo_setting('logo') }}" class="logo" alt="">
        @else
            <span class="brand-text font-weight-light">{{ echo_setting('company_name') }}</span>
        @endif
        <h1 class="h3 mb-3 fw-normal">Portaal</h1>
        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" placeholder="Nieuw wachtwoord" required="required" autofocus>
            <label for="password">Nieuw wachtwoord</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Nieuw wachtwoord opnieuw" required="required" autofocus>
            <label for="password_confirmation">Nieuw wachtwoord opnieuw</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
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
        }
        .form-control:focus {
            box-shadow: unset;
        }
    </style>
@endsection
