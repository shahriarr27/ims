@extends('backend.layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>User Profile</h1>
        <div class="lead">
            
        </div>

        <div class="container mt-4">
            <form method="post" action="{{route('profile.update')}}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $user->email }}"
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="Email address" disabled required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input value="{{ auth()->user()->name }}"
                        type="text"
                        class="form-control"
                        name="username"
                        placeholder="Username" required disabled>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input value=""
                        type="text"
                        class="form-control"
                        name="password"
                        placeholder="New password">
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm new password</label>
                    <input value=""
                        type="text"
                        class="form-control"
                        name="password_confirmation"
                        placeholder="Confirm new password">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        $("[name='password']").on("change", function() {
            if($(this).val() != "") {
                $('[name="password_confirmation"]').attr('required');
            } else {
                $('[name="password_confirmation"]').removeAttr('required');
            }
        })
    </script>
@endpush
