<div class="py-4 px-2" style="position: sticky; top: 20px;">
    <div class="text-center mb-3">
        <img class="rounded-circle mb-3" src="{{ Auth::user()->gravatar }}" alt="" style="height: 100px; width: 100px; border-radius: 50%;">
        <h4 class="h4-responsive font-weight-light text-capitalize mdb-color-text">{{ Auth::user()->name }}</h4>
        @if (Auth::user()->mobile_verified_at)
        <div class="badge badge-success p-2 z-depth-0"><i class="fa fa-check mr-2"></i>Verified Account</div>
        @endif
    </div>
    <ul class="user-sidebar-list">
        <li>
            <a href="{{ route('dashboard') }}"><i class="far fa-chart-bar"></i>Dashboard</a>
        </li>
        <li>
            <a href="{{ route('property.create') }}"><i class="far fa-plus-square"></i>Add Property</a>
        </li>
        <li>
            <a href="{{ route('property.index') }}"><i class="far fa-building"></i>My Properties</a>
        </li>
        <li>
            <a href="{{ route('property.index') }}"><i class="far fa-heart"></i>My Whishlist</a>
        </li>
        <li>
            <a href="{{ route('profile') }}"><i class="far fa-user"></i>Profile</a>
        </li>
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-toggle-off"></i>Logout
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>