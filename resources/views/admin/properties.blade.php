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
<div>
	<h5 class="page-title">Users</h5>
</div>

<div class="row">
	<div class="col-md-12">
		<table id="propertiesTable" class="table white card-shadow">
			<thead class="grey lighten-3">
				<tr class="text-muted">
					<th>ID</th>
					<th>Title</th>
					<th>City</th>
					<th>Owner</th>
					<th></th>
				</tr>
			</thead>
		</table>
	</div>
</div>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>
<script>
	$(document).ready( function () {
		$('#propertiesTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('ajax.properties.list') }}",
			columns: [
			{ data: 'id', name: 'id', searchable: false },
			{
				data: null, render: function (data, type, full, meta){
					return '<a href="{{ route('property.view','/') }}/'+data.slug+'" target="_blank">'+data.title+'</a>';
				},
			},
			{ data: 'city_name', name: 'city_name', searchable: false },
			{
				data: 'user_id', searchable: false,
				render: function (data, type, full, meta){
					return '<a href="{{ route('admin.users') }}?user_id='+ data +'" target="_blank" title="View Owner">' + data + '</a>';
				}
			},
			{ data: null, searchable: false,
				render: function ( data, type, full, meta ) {
					var editUrl = '{{ route('property.edit', 'PROPERTY_ID') }}';
					var editUrl = editUrl.replace(/PROPERTY_ID/, data.slug);

					return '<a href="' + editUrl + '" target="_blank"><i class="far fa-edit"></i></a>';
				}
			}
			]
		});
		$('.dataTables_length').addClass('bs-select');
	});
</script>
@endpush