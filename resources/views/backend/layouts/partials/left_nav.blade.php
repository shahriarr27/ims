<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
data-accordion="false">

<li class="nav-item">
    <a href="{{ route('dashboard.index') }}" class="nav-link {{  request()->routeIs('dashboard.index') ? 'active' : '' }}">
        <i class="nav-icon fa fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{  request()->routeIs('users') ? 'active' : '' }}">
        <i class="nav-icon fa fa-users"></i>
        <p>Users</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('membership') }}" class="nav-link {{  request()->routeIs('membership') ? 'active' : '' }}">
        <i class="nav-icon fa fa-flag"></i>
        <p>Membership Report</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('membership') }}" class="nav-link {{  request()->routeIs('membership') ? 'active' : '' }}">
        <i class="nav-icon fa fa-money"></i>
        <p>Payments</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-bar-chart"></i>
        <p>Analytics</p>
    </a>
</li>
@can('manage_admins')
<li class="nav-item">
    <a href="{{ route('admins.index') }}" class="nav-link {{  request()->routeIs('admins') ? 'active' : '' }}">
        <i class="nav-icon fa fa-users"></i>
        <p>Administrations</p>
    </a>
</li>
@endcan
<li class="nav-item">
    <a href="{{ route('appsettings') }}" class="nav-link {{  request()->routeIs('appsettings') ? 'active' : '' }}">
        <i class="nav-icon fa fa-cog"></i>
        <p>Settings</p>
    </a>
</li>
