<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('includes.head')
</head>
<body>

  <div class="site-loader"></div>

  @include('includes/header')

  <main id="main">
    @yield('content')
  </main>

  @include('includes.footer')
</body>
</html>