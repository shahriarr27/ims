@extends('backend.layouts.app-master')

@section('content')
    <div class="bg-light p-2 rounded">
        <div class="container my-2">
            <h3>Add Admin</h3>
            <form method="POST" action="{{ route('admins.store') }}">
                @csrf
                <div class="row row-space">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="label">first name</label>
                            <input class="form-control" type="text" name="firstname">
                            @error('firstname')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="label">last name</label>
                            <input class="form-control" type="text" name="lastname">
                            @error('lastname')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="label">Email</label>
                            <input class="form-control" type="email" name="email">
                            @error('email')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="label">Password</label>
                            <input class="form-control" type="password" name="password">
                            @error('password')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create Admin</button>
            </form>
        </div>

    </div>
@endsection
