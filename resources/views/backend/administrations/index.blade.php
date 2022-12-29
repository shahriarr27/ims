@extends('backend.layouts.app-master')
@section('content')
<div class="container-xl">
    <div class="table-title">
        <div class="row">
            <div class="header d-flex justify-content-between align-items-center">
                <h2>Administrations</h2>
                @if(Auth::user()->role=='superadmin') 
                    <a href="{{ route('admins.create') }}" class="btn btn-info btn-sm text-light">Add Admin</a>
                @endif
            </div>
        </div>
    </div>
    <div class="table-wrapper">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1?>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $i }}</td>
                        <td><img src="{{ url('files/user_image/'.$user->image) }}" class="img-fluid rounded-circle"
                                style="width: 40px" alt="Avatar"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            @if(Auth::user()->role=='admin' || Auth::user()->role=='superadmin') 
                                <a href="{{ route('admins.show',$user->id) }}"
                                    class="settings text-info" title="View" data-toggle="tooltip"><span
                                        class="material-icons material-icons-outlined">
                                        manage_accounts
                                    </span>
                                </a>
                            @endif
                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="clearfix mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection
