<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('includes.head')
	<link rel="stylesheet" href="{{ asset('css/control-panel.css') }}">
</head>
<body>

	<div class="site-loader"></div>

	@include('includes/header')

	<main id="main">
		<div class="container-fluid p-3">
			<div class="row">
				<div class="col-md-2 white">
					@include('includes.sidebar-nav')
				</div>
				<div class="col-md-10">
					@yield('content')
				</div>
			</div>
		</div>
	</main>

	@include('includes.footer')
</body>
</html>