@extends('layouts.admin')
@push('styles')
<style>
	.table{
		color: #343435;
	}
	tr.table-options a,
	tr.table-options button{
		color: #b0b0b0;
	}
</style>
@endpush

@section('content')
<div class="row">
	<div class="col-md-4">
		<div class="card card-shadow mb-3">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-start">
					<div>
						<div class="mb-3">Total Users</div>
						<div><h4><strong>{{ number_format($totalUsers) }}</strong></h4></div>
					</div>
					<div class="grey lighten-4 rounded p-2">
						<span class="text-ink"><i class="fas fa-user-friends fa-lg"></i></span>
					</div>
				</div>
				<div class="small py-3">
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-shadow mb-3">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-start">
					<div>
						<div class="mb-3">New Users <small>(last 30 days)</small></div>
						<div><h4><strong>{{ number_format($newUsers) }}</strong></h4></div>
					</div>
					<div class="grey lighten-4 rounded p-2">
						<span class="text-ink"><i class="fas fa-user-friends fa-lg"></i></span>
					</div>
				</div>
				<div class="small py-3">
				</div>
			</div>
		</div>
	</div>
</div>

<div>
	<h5 class="page-title">Users</h5>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="mt-3 mb-2 d-flex">
			<div class="align-self-center">
				Showing {{ $users->firstItem() }} - {{ $users->lastItem() }} of {{ $users->total() }} results
			</div>
			<div class="ml-auto">
				<form action="{{ route('admin.users') }}" class="form-inline">
					@csrf
					<input type="text" name="keyword" class="form-control">
					<button class="btn btn-light btn-sm z-depth-0"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div>
		<table class="table white card-shadow">
			<thead class="grey lighten-3">
				<tr class="text-muted">
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr class="table-options">
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->mobile }}</td>
					<td class="text-muted">
						<a class="mr-2" href=""><i class="far fa-eye"></i></a>
						<a class="mr-2" href="{{ route('admin.users.edit', $user->id) }}"><i class="far fa-edit"></i></a>
						<a href=""><i class="far fa-trash-alt"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $users->links() }}
	</div>
</div>
@endsection