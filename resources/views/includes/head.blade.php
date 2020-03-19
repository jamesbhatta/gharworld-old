<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @yield('meta')

  <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
  <link rel="shortcut icon" href="logo/logo.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
  <link rel="stylesheet" href="{{ asset('/theme/fonts/icomoon/style.css') }} ">

  {{-- <link rel="stylesheet" href="{{ asset('/theme/css/bootstrap.min.css') }}"> --}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('/theme/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme/css/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme/css/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme/css/mediaelementplayer.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme/fonts/flaticon/font/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme/css/fl-bigmug-line.css') }}">


  <link rel="stylesheet" href="{{ asset('/theme/css/aos.css') }}">

  <link rel="stylesheet" href="{{ asset('/theme/css/style.css') }}">
  {{-- Font awesome --}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  {{-- Dropzone --}}
  {{-- <link rel="stylesheet" href="{{ asset('dropzone/basic.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('dropzone/dropzone.min.css') }}">

  @stack('styles')