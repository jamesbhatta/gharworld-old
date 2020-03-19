@extends('layouts.control-panel')

@section('title')
My Properties
@endsection

@section('content')

@include('partials.heading', ['heading' => "My Properties"])

@if (Session::has('success'))
<div class="container-fluid text-success p-2">
	<i class="fa fa-check mr-2"></i> {{ Session::get('success') }}
</div>
@endif

@if(Session::has('error'))
<div class="container-fluid text-danger p-2">
	<i class="fa fa-times mr-2"></i> {{ Session::get('error') }}
</div>
@endif

<div class="mt-3 mb-2">
	<div class="d-flex">
		<div>
			Showing {{ $properties->firstItem() }} - {{ $properties->lastItem() }} of {{ $properties->total() }} results
		</div>
		<div class="ml-auto">
			<a href="#" class="link-unstyles text-muted dropdown-toggle mr-4" data-toggle="dropdown"
			aria-haspopup="true" aria-expanded="false"><i class="fa fa-filter"></i></a>

			<div class="dropdown-menu">
				<a class="dropdown-item" href="{{ route('property.index') }}">All</a>
				<a class="dropdown-item" href="{{ route('property.index') }}?filter=published">Publised</a>
				<a class="dropdown-item" href="{{ route('property.index') }}?filter=unpublished">Unpublished</a>
			</div>
		</div>
	</div>
</div>

@if (count($properties))
<div id="backend-property-list">
	@foreach($properties as $property)
	<div class="row mb-4">
		<div class="col-md-12">
			<div class="property-entry horizontal d-lg-flex">
				<a href="#" class="property-thumbnail h-100">
					<div class="offer-type-wrap">
						@if ($property->property_for == "Sale")
						<span class="offer-type bg-danger">Sale</span>
						@endif
						@if ($property->property_for == "Rent")
						<span class="offer-type bg-success">Rent</span>
						@endif
					</div>

					@foreach ($property->images as $image)
					<img src="{{ asset('storage/'. $image->path) }}" alt="Image" class="img-fluid">
					@break
					@endforeach
				</a>
				<div class="p-4 property-body">
					<h2 class="property-title">
						<a href="{{ route('property.show', $property->slug) }}" target="_blank">{{ $property->title }}</a>
						@if ($property->published)
						<span class="badge badge-success font-weight-light float-right z-depth-0">Published</span>
						@else
						<span class="badge badge-danger font-weight-light float-right z-depth-0">Unpublished</span>
						@endif
					</h2>
					<span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> {{ $property->address }} , {{ $property->city->name }}</span>
					<strong class="property-price text-primary mb-3 d-block text-success">NRs. {{ number_format($property->price) }}/-</strong>
					<ul class="d-flex list-unstyled action-list">
						<li>
							<a href="{{ route('property.edit', $property->slug) }}" class="btn btn-light btn-sm z-depth-0 rounded-0 rounded-0" data-toggle="tooltip" title="Edit"><i class="far fa-edit mr-2"></i> Edit</a>
						</li>
						<li>
							<a href="{{ route('property.images', $property->slug) }}" class="btn btn-light btn-sm z-depth-0 rounded-0" data-toggle="tooltip" title="Images"><i class="far fa-images mr-2"></i> Images</a>
						</li>
						<li>
							<a href="{{ route('property.show', $property->slug) }}" target="_blank" class="btn btn-light btn-sm z-depth-0 rounded-0"  data-toggle="tooltip" title="View"><i class="far fa-eye mr-2"></i> View</a>
						</li>
						<li>
							@if ($property->published)
							<form action="{{ route('property.unpublish', $property->slug) }}" method="post">
								@csrf
								@method('put')
								<button type="submit" class="btn btn-light btn-sm z-depth-0 rounded-0" data-toggle="tooltip" title="Unpublish"><i class="far fa-trash-alt mr-2"></i> Unpublish</button>
							</form>
							@else
							<form action="{{ route('property.publish', $property->slug) }}" method="post">
								@csrf
								@method('put')
								<button type="submit" class="btn btn-light btn-sm z-depth-0 rounded-0" data-toggle="tooltip" title="Publish"><i class="far fa-trash-alt mr-2"></i> Publish</button>
							</form>
							@endif

						</li>
						<li>
							<form action="{{ route('property.destroy', $property->slug) }}" method="post">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-danger btn-sm z-depth-0 rounded-0" data-toggle="tooltip" title="Delete"><i class="far fa-trash-alt mr-2"></i> Delete</button>
							</form>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>

{{ $properties->links() }}

@else

<div class="no-properties">
	<div class="icon">
		<i class="fas fa-box-open"></i>
	</div>
	<div class="title">No Properties Available</div>
	<div>
		<a class="btn btn-warning z-depth-0" href="{{ route('property.create') }}">Add Property</a>
	</div>
</div>
@endif


@endsection