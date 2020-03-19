@extends('layouts.admin')

@section('content')
<div>
	<h5 class="page-title">Cities</h5>
</div>
<div class="row">
	<div class="col-md-12">

		@include('partials.alerts')

		<div class="mt-3 mb-2 d-flex">
			<div class="mx-auto">
				<form action="{{ route('admin.cities') }}" method="post" class="form-inline">
					@csrf
					<input type="text" name="name" class="form-control">
					<button class="btn btn-light btn-sm z-depth-0"><i class="fa fa-plus"></i></button>
				</form>
			</div>
		</div>
		<table class="table white card-shadow">
			<thead class="grey lighten-3">
				<tr class="text-muted">
					<th>#</th>
					<th>Name</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($cities as $city)
				<tr>
					<td class="align-self-center">{{ $loop->iteration }}</td>
					<td>
						<form action="{{ route('admin.cities.update', $city->id) }}" method="post" class="form form-inline">
							@csrf
							@method('put')
							<input type="text" name="name" class="form-control form-control-sm" value="{{ $city->name }}">
							<button type="submit" class="btn btn-light z-depth-0 btn-sm my-0"><i class="fa fa-sync"></i></button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection