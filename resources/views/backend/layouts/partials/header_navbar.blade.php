<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">

    <!-- User Dropdown Menu -->
    {{-- <li>
        <a href="{{ route('clear') }}" class="btn btn-sm btn-outline-primary mt-1">Clear Cache</a>
    </li> --}}
    <li class="nav-item dropdown ml-2">
        <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#">
            <img class="img-account-profile img-fluid rounded-circle mr-2" src="{{ url('files/user_image/'.Auth::user()->image) }}" alt="profile_image" style="width: 25px"><b class="text-uppercase">{{ auth()->user()->name }}</b>
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
        {{-- <a href="{{route('user.profile')}}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
        </a> --}}
        {{-- <div class="dropdown-divider"></div> --}}
        <a href="{{ route('logout.perform') }}" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
    </li>
</ul>
