<div class="py-4">
    <a href="{{ route('home') }}" target="_blank">
        <h4 class="h4.responsive text-uppercase text-center text-light"><strong><i class="fab fa-asymmetrik text-green fa-lg mr-2"></i>{{ config('app.name') }}</strong></h4>
    </a>
</div>
<div class="text-light text-uppercase small font-weight-bolder">Navigation</div>
<ul class="list-unstyled sidebar-list">
    <li class="sidebar-list-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="far fa-chart-bar"></i>Dashboard <span><i class="fas fa-angle-right"></i></span></a>
    </li>
    <li class="sidebar-list-item">
        <a class="nav-link" href="{{ route('admin.users') }}"><i class="far fa-address-book"></i>Users<span><i class="fas fa-angle-right"></i></span></a>
    </li>
    <li class="sidebar-list-item">
        <a class="nav-link" href="{{ route('admin.properties') }}"><i class="far fa-building"></i>Properties<span><i class="fas fa-angle-right"></i></span></a>
    </li>
    <li class="sidebar-list-item">
        <a class="nav-link" href="{{ route('admin.cities') }}"><i class="fas fa-city"></i>Cities<span><i class="fas fa-angle-right"></i></span></a>
    </li>
    <li class="sidebar-list-item">
        <a class="nav-link" href="{{ route('admin.facilities') }}"><i class="far fa-star"></i>Facilities<span><i class="fas fa-angle-right"></i></span></a>
    </li>
    <li class="sidebar-list-item">
        <a class="nav-link" href="{{ route('admin.about') }}"><i class="far fa-flag"></i>About<span><i class="fas fa-angle-right"></i></span></a>
    </li>
    <li class="sidebar-list-item">
        <a class="nav-link" href="{{ route('admin.contact') }}"><i class="far fa-address-card"></i>Contact<span><i class="fas fa-angle-right"></i></span></a>
    </li>
    <li class="sidebar-list-item">
        <a class="nav-link" href="{{ route('admin.profile') }}"><i class="far fa-user"></i>My Profile<span><i class="fas fa-angle-right"></i></span></a>
    </li>
    <li class="sidebar-list-item">
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Logout</a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
