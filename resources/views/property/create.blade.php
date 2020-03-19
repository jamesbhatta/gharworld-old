@extends('layouts.control-panel')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
	.note-editor,
	.note-toolbar .btn{
		box-shadow: none;
	}
</style>
@endpush

@section('content')
@include('partials.heading', ['heading' => "Add New Property"])
<div id="property-form">
	<div class="white px-3">
		<ul class="stepper stepper-horizontal">
			<li class="active">
				<a href="#!">
					<span class="circle">1</span>
					<span class="label">Add Property Details</span>
				</a>
			</li>
			<li class="">
				<a href="#!">
					<span class="circle">2</span>
					<span class="label">Property Images</span>
				</a>
			</li>
			<li class="">
				<a href="#!">
					<span class="circle"><i class="fas fa-check"></i></span>
					<span class="label">Complete</span>
				</a>
			</li>
		</ul>
	</div>
	{{-- End of steppers --}}

	<div class="white p-3">
		@include('partials.alerts')
		<div id="form-errors" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
			<strong>Following errors occurs while processing the form.</strong>
			<div class="alert-messages">
			</div>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{ route('property.store') }}"  method="post" class="form" enctype="form-data/multipart">
			@csrf
			<div class="row">
				<div class="col-md-12">
					<h5 class="d-inline-block border-bottom font-weight-bolder mb-4">General</h5>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<label for="">Title</label>
						<input type="text" name="title" class="form-control rounded-0 {{ hasError('title') }}" value="{{ old('title') }}">
						@invalid('title')
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">City</label>
						<select name="city_id" class="custom-select custom-select-lg rounded-0 {{ hasError('city_id') }}">
							@foreach ($cities as $city)
							<option value="{{ $city->id }}" @if ($city->id == old('city_id')) selected @endif>{{ $city->name }}</option>
							@endforeach
						</select>
						@invalid('city_id')
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Address Line</label>
						<input type="text" name="address" class="form-control rounded-0 {{ hasError('address') }}" value="{{ old('address') }}">
						@invalid('address')
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="">Property For</label>
						<select name="property_for" class="form-control rounded-0">
							<option value="Rent">Rent</option>
							<option value="Sale">Sale</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Price (NRs. for each month if for rent) </label>
						<input type="number" name="price" class="form-control rounded-0 {{ errorClass('price') }}" min="0" value="{{ old('price') }}">
						@invalid('price')
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="custom-control custom-checkbox my-3">
							<input type="checkbox" name="negotiable" class="custom-control-input" id="negotaibleCheckbox" value="true" checked="">
							<label class="custom-control-label" for="negotaibleCheckbox">The price is Negotiable</label>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<h5 class="d-inline-block border-bottom font-weight-bolder my-4">Room Details</h5>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="">No. of Bedrooms</label>
						<input type="number" name="bedroom" class="form-control rounded-0" min="0" value="{{ old('bedroom', 0) }}">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">No. of Living Rooms</label>
						<input type="number" name="living_room" class="form-control rounded-0" min="0" value="{{ old('living_room', 0) }}">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">No. of Kitchen</label>
						<input type="number" name="kitchen" class="form-control rounded-0" min="0" value="{{ old('kitchen', 0) }}">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">No. of Bathroom</label>
						<input type="number" name="bathroom" class="form-control rounded-0" min="0" value="{{ old('bathroom', 0) }}">
					</div>
				</div>

				<div class="col-md-12">
					<h5 class="d-inline-block border-bottom font-weight-bolder my-4">Facilities Available</h5>
				</div>
				@foreach($facilities as $item)
				<div class="col-md-4">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" name="facilities[]" class="custom-control-input" id="{{ $item }}{{ $loop->index }}" value="{{ $item }}" @if(is_array(old('facilities')) && in_array($item, old('facilities'))) checked @endif>
						<label class="custom-control-label" for="{{ $item }}{{ $loop->index }}">{{ $item }}</label>
					</div>
				</div>
				@endforeach

				<div class="col-md-12">
					<div class="form-group">
						<h5 class="d-inline-block border-bottom font-weight-bolder my-4">Description</h5>
						<textarea name="description" class="form-control summernote" cols="30" rows="10">{{ old('description') }}</textarea>
					</div>
				</div>
				<div class="col-md-12 text-center p-3 mt-3">
					<button id="submitButton" type="submit" class="btn btn-success btn-lg rounded-0"><i class="fa fa-arrow-right mr-2"></i><strong>Next</strong></button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>

<script>
	$(function(){
		$(function() {
			$('.summernote').summernote({
				placeholder: 'Description goes here...',
				tabsize: 2,
				height: 200
			});
		});
	});
</script>
@endpush