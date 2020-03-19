@extends('layouts.admin')

@section('content')
<div>
	<h5 class="page-title">Dashboard</h5>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-6">
				<div class="card card-shadow mb-3">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-start">
							<div>
								<div class="mb-3">Users</div>
								<div><h4><strong>{{ number_format($usersCount) }}</strong></h4></div>
							</div>
							<div class="grey lighten-4 rounded p-2">
								<span class="text-ink"><i class="fas fa-user-friends fa-lg"></i></span>
							</div>
						</div>
						<div class="small py-3">
							<span class="text-green font-weight-bold"><i class="fas fa-arrow-up"></i> 5.56 %</span>
							Since last month
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card card-shadow mb-3">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-start">
							<div>
								<div class="mb-3">Properties</div>
								<div><h4><strong>{{ number_format($propertiesCount) }}</strong></h4></div>
							</div>
							<div class="grey lighten-4 rounded p-2">
								<span class="text-ink"><i class="fas fa-luggage-cart fa-lg"></i></span>
							</div>
						</div>
						<div class="small py-3">
							<span class="text-red font-weight-bold"><i class="fas fa-arrow-down"></i> 1.04 %</span>
							Since last month
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card card-shadow mb-3">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-start">
							<div>
								<div class="mb-3">Cities</div>
								<div><h4><strong>{{ number_format($citiesCount) }}</strong></h4></div>
							</div>
							<div class="grey lighten-4 rounded p-2">
								<span class="text-ink"><i class="fas fa-dollar-sign fa-lg"></i></span>
							</div>
						</div>
						<div class="small py-3">
							<span class="text-red font-weight-bold"><i class="fas fa-arrow-up"></i> 7 %</span>
							Since last month
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card card-shadow mb-3">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-start">
							<div>
								<div class="mb-3">Facilities</div>
								<div><h4><strong>{{ number_format($facilitiesCount) }}</strong></h4></div>
							</div>
							<div class="grey lighten-4 rounded p-2">
								<span class="text-ink"><i class="fas fa-chart-line fa-lg"></i></span>
							</div>
						</div>
						<div class="small py-3">
							<span class="text-green font-weight-bold"><i class="fas fa-arrow-up"></i> 4.86 %</span>
							Since last month
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="col-md-6">
		<div class="card card-shadow">
			<div class="p-2">
				<canvas id="usersChart" class=""></canvas>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="card card-shadow">
			<div class="card-body">
				<div class="d-flex mb-2">
					<div><strong>New Properties</strong></div>
					<div class="ml-auto"><i class="fas fa-ellipsis-v"></i></div>
				</div>
				<div class="grey lighten-5 p-3">
					<div class="row">
						<div class="col-md-6 text-center">
							<div><small>Current Week</small></div>
							<i class="fas fa-circle fa-sm text-green mr-2"></i><strong>$ 5,248</strong>
						</div>
						<div class="col-md-6 text-center">
							<div><small>Previous Week</small></div>
							<i class="fas fa-circle fa-sm text-ink mr-2"></i><strong>$ 6,122</strong>
						</div>
					</div>
				</div>
				<div class="my-3"></div>
				<canvas id="lineChart"></canvas>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card card-shadow">
			<div class="card-body">
				<div class="d-flex mb-2">
					<div><strong>Total Stats</strong></div>
					<div class="ml-auto"><i class="fas fa-ellipsis-v"></i></div>
				</div>
				<div class="grey lighten-5 p-3">
					<div class="row">
						<div class="col-md-6 text-center">
							<div><small>Current Week</small></div>
							<i class="fas fa-circle fa-sm text-green mr-2"></i><strong>$ 55,248</strong>
						</div>
						<div class="col-md-6 text-center">
							<div><small>Previous Week</small></div>
							<i class="fas fa-circle fa-sm text-ink mr-2"></i><strong>$ 68,122</strong>
						</div>
					</div>
				</div>
				<div class="my-3"></div>
				<canvas id="doughnutChart"></canvas>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
// Properties Chart
var userCanvas = document.getElementById("usersChart").getContext('2d');
var usersChart = new Chart(userCanvas, {
	type: 'line',
	data: {
		labels: [
		@foreach ($usersData as $data)
		'{{ $data->date }}',
		@endforeach
		],
		datasets: [{
			label: "New Users",
			data: [
			@foreach ($usersData as $data)
			'{{ $data->count }}',
			@endforeach
			],
			backgroundColor: [
			'transparent'
			],
			borderColor: [
			'rgba(200, 99, 132, .7)',
			],
			borderWidth: 2
		},
		]
	},
	options: {
		responsive: true,
		legend: {
			display: false,
			position: "bottom",
		},
		animation: {
			duration: 1000,
			easing: "linear",
		}
	}
});

	// Properties Chart
	var ctxL = document.getElementById("lineChart").getContext('2d');
	var myLineChart = new Chart(ctxL, {
		type: 'line',
		data: {
			labels: [
			@foreach ($propertiesData as $data)
			'{{ $data->date }}',
			@endforeach
			],
			datasets: [{
				label: "New Properties",
				data: [
				@foreach ($propertiesData as $data)
				'{{ $data->count }}',
				@endforeach
				],
				backgroundColor: [
				'transparent'
				],
				borderColor: [
				'rgba(200, 99, 132, .7)',
				],
				borderWidth: 2
			},
			]
		},
		options: {
			responsive: true,
			legend: {
				display: false,
				position: "bottom",
			},
			animation: {
				duration: 1000,
				easing: "linear",
			}
		}
	});

		// Doughnut Chart
		//doughnut
		var ctxD = document.getElementById("doughnutChart").getContext('2d');
		var myLineChart = new Chart(ctxD, {
			type: 'doughnut',
			data: {
				labels: ["Properties", "Users", "Cities"],
				datasets: [{
					data: [{{ $propertiesCount }}, {{ $usersCount }}, {{ $citiesCount }}],
					backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
					hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
				}],
			},

			options: {
				responsive: true,
				legend: {
					display: false,
					position: "bottom",
				},
				animation: {
					duration: 4000,
					easing: "easeOutElastic",
				}
			},

		});
	</script>
	@endpush