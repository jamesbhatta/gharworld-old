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
@include('partials.heading', ['heading' => "Edit Property"])
<div id="property-form">
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
		<form action="{{ route('property.update', $property->slug) }}"  method="post" class="form" enctype="form-data/multipart">
			@csrf
			@method('put')
			<div class="row">
				<div class="col-md-12">
					<h5 class="d-inline-block border-bottom font-weight-bolder mb-4">General</h5>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<label for="">Title</label>
						<input type="text" name="title" class="form-control rounded-0 {{ hasError('title') }}" value="{{ old('title', $property->title) }}">
						@invalid('title')
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">City</label>
						<select name="city_id" class="custom-select custom-select-lg rounded-0 {{ hasError('city_id') }}">
							@foreach ($cities as $city)
							<option value="{{ $city->id }}" @if ($city->id == old('city_id', $property->city_id)) selected @endif>{{ $city->name }}</option>
							@endforeach
						</select>
						@invalid('city_id')
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Address Line</label>
						<input type="text" name="address" class="form-control rounded-0 {{ hasError('address') }}" value="{{ old('address', $property->address) }}">
						@invalid('address')
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="">Property For</label>
						<select name="property_for" class="form-control rounded-0">
							<option value="Rent" @if (old('property_for', $property->property_for == 'Rent')) selected @endif>Rent</option>
							<option value="Sale" @if (old('property_for', $property->property_for == 'Sale')) selected @endif>Sale</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Price (NRs. for each month if for rent) </label>
						<input type="number" name="price" class="form-control rounded-0 {{ errorClass('price') }}" min="0" value="{{ old('price', $property->price) }}">
						@invalid('price')
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="custom-control custom-checkbox my-3">
							<input type="checkbox" name="negotiable" class="custom-control-input" id="negotaibleCheckbox" value="true"  @if (old('negotiable', $property->negotiable)) checked @endif>
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
						<input type="number" name="bedroom" class="form-control rounded-0" min="0" value="{{ old('bedroom', $property->bedroom) }}">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">No. of Living Rooms</label>
						<input type="number" name="living_room" class="form-control rounded-0" min="0" value="{{ old('living_room', $property->living_room) }}">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">No. of Kitchen</label>
						<input type="number" name="kitchen" class="form-control rounded-0" min="0" value="{{ old('kitchen', $property->kitchen) }}">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">No. of Bathroom</label>
						<input type="number" name="bathroom" class="form-control rounded-0" min="0" value="{{ old('bathroom', $property->bathroom) }}">
					</div>
				</div>

				<div class="col-md-12">
					<h5 class="d-inline-block border-bottom font-weight-bolder my-4">Facilities Available</h5>
				</div>
				@php
				$currFacilities = explode(',',$property->facilities);
				@endphp
				@foreach($facilities as $item)
				<div class="col-md-4">
					<div class="custom-control custom-checkbox">
						@php
						$checked = ""
						@endphp
						@if(is_array(old('facilities', $currFacilities)) && in_array($item, old('facilities', $currFacilities)))
						@php $checked = "checked"; @endphp
						@endif
						<input type="checkbox" name="facilities[]" class="custom-control-input" id="{{ $item }}{{ $loop->index }}" value="{{ $item }}" {{ $checked }}>
						<label class="custom-control-label" for="{{ $item }}{{ $loop->index }}">{{ $item }}</label>
					</div>
				</div>
				@endforeach

				<div class="col-md-12">
					<div class="form-group">
						<h5 class="d-inline-block border-bottom font-weight-bolder my-4">Description</h5>
						<textarea name="description" class="form-control summernote" cols="30" rows="10">{{ old('description', $property->description) }}</textarea>
					</div>
				</div>
				<div class="col-md-12 text-center p-3 mt-3">
					<button id="submitButton" type="submit" class="btn btn-success btn-lg rounded-0 z-depth-0"><i class="fas fa-sync-alt mr-2"></i><strong>Update</strong></button>
				</div>
			</div>
		</form>

		<div>
			<h5 class="d-inline-block border-bottom font-weight-bolder mb-4">Property Images</h5>
			@include('property.images-section')
		</div>

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