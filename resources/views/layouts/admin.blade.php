<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('includes.head')
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
	<!-- MDBootstrap Datatables  -->
	<link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">

</head>
<body>
	<div class="d-flex">
		<div class="side px-4">
			@include('includes.admin.sidebar')
		</div>
		<div class="main">
			<div class="card rounded-0" style="box-shadow: 0 2px 2px 0 rgba(143, 143, 143, 0.05);">
				<div class="d-flex px-4">
					<ul class="nav topbar-nav ml-auto ">
						<li class="nav-item align-self-center">
							<a class="nav-link" href=""><i class="fa fa-cog"></i></a>
						</li>
						<li class="nav-item align-self-center">
							<a class="nav-link grey-text" href=""><i class="fa fa-bell"></i></a>
						</li>
						<li class="nav-item d-flex py-2 px-3 align-self-center" style="background-color: #f8f6ff;">
							<img class="rounded-circle mr-3" src="{{ Auth::user()->gravatar }}" alt="" style="height: 40px; width: 40px; border-radius: 50%;">
							<div class="d-flex flex-column">
								<div>James Bhatta</div>
								<div>Admin</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div id="dashboard" class="px-3 py-3">

				@yield('content')

			</div>
		</div>

	</div>


	@include('includes.footer-scripts')


</body>
</html>
