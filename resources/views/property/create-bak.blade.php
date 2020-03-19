@extends('layouts.control-panel')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
	.note-toolbar .btn{
		box-shadow: none;
	}
	.dz-default{
		border: 1px dotted #ccc;
	}
</style>
@endpush

@section('content')

@include('partials.heading', ['heading' => "Add New Property"])

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
	<form  method="post" class="form" enctype="form-data/multipart">
		@csrf
		<div class="row">
			<div class="col-md-12">
				<h5 class="d-inline-block border-bottom font-weight-bolder mb-4">General</h5>
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<label for="">Title</label>
					<input type="text" name="title" class="form-control rounded-0">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">City</label>
					<select name="city_id" class="custom-select custom-select-lg rounded-0">
						@foreach ($cities as $city)
						<option value="{{ $city->id }}">{{ $city->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Address Line</label>
					<input type="text" name="address" class="form-control rounded-0">
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
					<label for="">Price (NRs.</label>
					<input type="number" name="price" class="form-control rounded-0" min="0">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="custom-control custom-checkbox my-3">
						<input type="checkbox" name="negotiable" class="custom-control-input" id="negotaibleCheckbox" value="true" checked="">
						<label class="custom-control-label" for="negotaibleCheckbox">Is Price Negotiable</label>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<h5 class="d-inline-block border-bottom font-weight-bolder my-4">Room Details</h5>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label for="">No. of Bedrooms</label>
					<input type="number" name="bedroom" class="form-control rounded-0" min="0">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="">No. of Living Rooms</label>
					<input type="number" name="living_room" class="form-control rounded-0" min="0">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="">No. of Kitchen</label>
					<input type="number" name="kitchen" class="form-control rounded-0" min="0">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="">No. of Bathroom</label>
					<input type="number" name="bathrorom" class="form-control rounded-0" min="0">
				</div>
			</div>

			<div class="col-md-12">
				<h5 class="d-inline-block border-bottom font-weight-bolder my-4">Facilities Available</h5>
			</div>
			@php
			$items = array('Bike Parking', 'Car Parking', 'Hot and Cold Water', 'Free Wifi', 'Water Boring', 'Drinking Water');
			@endphp
			@foreach($items as $item)
			<div class="col-md-4">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" name="facilities[]" class="custom-control-input" id="{{ $item }}{{ $loop->index }}" value="{{ $item }}">
					<label class="custom-control-label" for="{{ $item }}{{ $loop->index }}">{{ $item }}</label>
				</div>
			</div>
			@endforeach

			<div class="col-md-12">
				<div class="form-group">
					<h5 class="d-inline-block border-bottom font-weight-bolder my-4">Description</h5>
					<textarea name="description" class="form-control summernote" cols="30" rows="10"></textarea>
				</div>
			</div>

			<div class="col-md-12">
				<div id="my-awesome-dropzone" class="dropzone">
					<div class="fallback">
						<input name="file" type="file" multiple />
					</div>
					<div class="dz-default dz-message">
						<span>Drop image files here to upload or click here</span>
					</div>
					<div class="dropzone-previews"></div>
				</div>
			</div>

			<div class="col-md-12 text-right grey lighten-4 p-3 mt-3">
				<button id="submitButton" type="submit" class="btn btn-success btn-lg rounded-0"><i class="fa fa-save mr-2"></i><strong>Submit</strong></button>
			</div>
		</div>

	</form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
<script>
	Dropzone.autoDiscover = false;

	$(function() {
		$('.summernote').summernote({
			placeholder: 'Description goes here...',
			tabsize: 2,
			height: 200
		});
	});

	// var myDropzone = new Dropzone('div#my-awesome-dropzone', {
		// url: '/hello',
		$('#my-awesome-dropzone').dropzone({
			url: '{{ route('property.set') }}',

	// Dropzone.options.myAwesomeDropzone = {
		acceptedFiles: '.png,.jpg,.jpeg,.gif',
		autoProcessQueue: false,
		uploadMultiple: true,
		parallelUploads: 10,
		maxFiles: 10,
		previewsContainer: '.dropzone-previews',
		init: function () {
			var myDropzone = this;
			$("#submitButton").click(function (e) {
				e.preventDefault();
				e.stopPropagation();
				myDropzone.processQueue();
			});

			this.on('complete', function(file) {
						// this.removeFile(file);
					});
			this.on("sendingmultiple", function() {
				      // Gets triggered when the form is actually being sent.
				      // Hide the success button or the complete form.
				      $('#submitButton').text('Publishing...');
				  });
			this.on("successmultiple", function(files, response) {
				      // Gets triggered when the files have successfully been sent.
				      // Redirect user or notify of success.
				      console.log(response);
				  });
			this.on("errormultiple", function(files, response) {
				      // Gets triggered when there was an error sending the files.
				      // Maybe show form again, and notify user of error
				      console.log(response);
				      $.each(response.errors, function(title, message) {
				      	$('.alert-messages').append('<div>* ' + message + '</div>');
				      });
				      $('#form-errors').show();
				      $('html, body').animate({scrollTop: $("#form-errors").offset().top}, 500);
				      $('#submitButton').text('Save');
				  });

		}
// };
	});
</script>
@endpush