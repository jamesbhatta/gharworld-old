<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->

<div class="site-navbar bg-white text-info">
    <div class="container py-1">
        <div class="d-flex align-items-center">
            <div>
                <h1 class="mb-0">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('logo/logo.png') }}" alt="" style="max-height: 60px;">
                    </a>
                    <a href="{{ route('home') }}" class="h2 mb-0"><strong>Ghar Love<span class="text-danger">.</span></strong></a>
                </h1>
            </div>
            <div class="ml-auto">
                <nav class="site-navigation text-right text-md-right" role="navigation">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                        <li class="{{ setActive(['/']) }}">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li><a href="{{ route('property.search') }}">Properties</a></li>
                        <li><a href="{{ route('property.search') }}?property_for=Sale">Buy</a></li>
                        <li><a href="{{ route('property.search') }}?property_for=Rent">Rent</a></li>
                        <li class="{{ setActive(['about']) }}">
                            <a href="{{ route('about') }}">About</a>
                        </li>
                        <li class="{{ setActive(['contact']) }}">
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                        @guest
                        <li><a href="{{ route('login') }}">{{ __('Add Property') }}</a></li>
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a href="{{ route('register') }}">{{ __('register') }}</a></li>
                        @endguest
                        @auth
                        <li class="{{ setActive(['dashboard*', 'dashboard/property*', 'dashboard/profile']) }}">
                            <a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>
