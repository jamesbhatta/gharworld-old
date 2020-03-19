@extends('layouts.app')

@push('styles')
<style>
	.home-slider .property-image-top{
		height: 500px;
	}

	@media (max-width: 576px) {
		.home-slider .property-image-top{
			height: 300px;
		}
	}

	.site-visit-box{
		background-color: #7cb21f;
		color: #fff;
		padding: 10px 15px;
	}
</style>
@endpush
@section('content')
<div class="site-section site-section-sm">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div>
					<div class="slide-one-item home-slider owl-carousel">
						@foreach ($property->images as $image)
						<div><img class="img-fluid property-image-top" src="{{ asset('storage/'. $image->path) }}" alt="Image"></div>
						@endforeach
					</div>
				</div>
				<div class="bg-white property-body border-bottom border-left border-right">

					<div class="row mb-5">
						<div class="col-md-8">
							<div>
								<strong class="text-success h2 mb-3">{{ $property->title }}</strong>
							</div>
							<div class="property-specs-number"><i class="fa fa-map-marker-alt mr-2"></i>{{ $property->address }}, {{ $property->city->name }}</div>
						</div>
						<div class="col-md-4">
							<div>
								<p><strong class="h2 text-warning font-weight-bold">NRs. {{ number_format($property->price) }}/-</strong></p>
							</div>
							<ul class="property-specs-wrap mb-3 mb-lg-0 float-lg-right d-none">
								<li>
									<span class="property-specs">For</span>
									<span class="property-specs-number">{{ $property->property_for }}</span>
								</li>
								<li>
									<span class="property-specs">Last Updated</span>
									<span class="property-specs-number">{{ \Carbon\Carbon::parse($property->updated_at)->diffForHumans() }}</span>
								</li>
							</ul>
						</div>
						<div class="col-md-12">
							<div class="d-flex my-2">
								@if ($property->negotiable)
								<div class="align-self-center">
									<span class="font-italic">* The price is Negotiable.</span>
								</div>
								@endif
								<div class="ml-auto">
									<ul class="property-specs-wrap mb-3 mb-lg-0">
										<li>
											<span class="property-specs">For</span>
											<span class="property-specs-number">{{ $property->property_for }}</span>
										</li>
										<li>
											<span class="property-specs">Last Updated</span>
											<span class="property-specs-number">{{ \Carbon\Carbon::parse($property->updated_at)->diffForHumans() }}</span>
										</li>
									</ul>
								</div>
							</div>

						</div>
					</div>
					<div class="d-flex justify-content-around border-bottom border-top mb-5">
						<div class=" text-center py-3">
							<span class="d-inline-block text-black mb-0 caption-text">Bedrooms</span>
							<strong class="d-block">{{ $property->bedroom }}</strong>
						</div>
						<div class="text-center py-3">
							<span class="d-inline-block text-black mb-0 caption-text">Living Rooms</span>
							<strong class="d-block">{{ $property->living_room }}</strong>
						</div>
						<div class="text-center py-3">
							<span class="d-inline-block text-black mb-0 caption-text">Kitchen</span>
							<strong class="d-block">{{ $property->kitchen }}</strong>
						</div>
						<div class="text-center py-3">
							<span class="d-inline-block text-black mb-0 caption-text">Bathroom</span>
							<strong class="d-block">{{ $property->bathroom }}</strong>
						</div>
					</div>

					@if ($property->facilities)
					<div class="mb-3">
						<h2 class="h4 text-black">Facilities</h2>
						<div>
							<div class="row">
								@foreach (explode(',', $property->facilities) as $facilities)
								<div class="col-md-4 mb-2">
									<div class="bg-light p-2">
										<i class="fa fa-check-circle text-success mr-2"></i>{{ $facilities }}
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
					@endif

					@auth
					<form action="{{ route('enquiry.process') }}" method="POST" class="form">
						@csrf
						<input type="hidden" name="property_slug" value="{{ $property->slug }}" hidden="true">
						<input type="hidden" name="name" value="{{ auth()->user()->name }}" hidden="true">
						<input type="hidden" name="email" value="{{ auth()->user()->email }}" hidden="true">
						@if(isset(auth()->user()->mobile))
						<input type="hidden" name="phone" value="{{ auth()->user()->mobile }}" hidden="true">
						@endif

						<div class="d-flex site-visit-box bg-success mb-4">
							<div class="align-self-center">If you like what you see,  take a visit to this project.</div>
							<div class="ml-auto">
								<button type="submit" id="requestVisitButton" class="btn btn-white btn-sm">Request Visit</button>
							</div>
						</div>
					</form>
					@endauth

					@if ($property->description)
					<h2 class="h4 text-black">More Info</h2>
					<div>
						{!! $property->description !!}
					</div>
					@endif

					<div class="row no-gutters mt-5">
						<div class="col-12">
							<h2 class="h4 text-black mb-3">Gallery</h2>
						</div>
						@foreach ($property->images as $image)
						<div class="col-sm-6 col-md-4 col-lg-3 p-1">
							<a href="{{ asset('storage/'. $image->path) }}" class="image-popup gal-item"><img src="{{ asset('/storage/'. $image->path) }}" alt="Image" class="img-fluid"></a>
						</div>
						@endforeach

					</div>
				</div>
			</div>
			<div class="col-lg-4">

				<div class="bg-white widget border rounded" style="position: sticky; top: 20px;">
					<h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
					<form action="{{ route('enquiry.process') }}" method="POST" class="form-contact-agent">
						@csrf
					{{-- @if(Session::has('enquirySuccess'))
						<div class="form-group">
							<div class="alert alert-primary" role="alert">
								Enquiry Submitted- Our agent will be in touch with you soon.
							</div>
						</div>
						@endif --}}
						<input type="hidden" name="property_slug" value="{{ $property->slug }}" hidden="true">
						@php
						$name = isset(auth()->user()->name) ? auth()->user()->name : old('name');
						$email = isset(auth()->user()->email) ? auth()->user()->email : old('email');
						$phone = isset(auth()->user()->mobile) ? auth()->user()->mobile : old('phone');
						@endphp
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" value="{{ $name }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" value="{{ $email }}">
						</div>
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" name="phone" class="form-control"  value="{{ $phone }}">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Enquiry">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@if ($relatedProperties)
<div class="site-section site-section-sm bg-light">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="site-section-title mb-5">
					<h2>Related Properties</h2>
				</div>
			</div>
		</div>

		@include('includes.related-property-list', ['properties' => $relatedProperties])

	</div>
</div>
@endif

{{-- Enquiry Modal --}}
<div class="modal fade" id="enquirySuccessModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title w-100" id="myModalLabel">Request Submitted</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<p>Your enquiry for the property has been submitted.</p>
			<p>Our agent will be in touch with you as soon as possible.</p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary btn-sm z-depth-0" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
</div>
<!-- End of Enquiry Modal -->
@endsection
@push('scripts')
<script>
	$(function() {
		$('#requestVisitButton').click(function() {
			$(this).html('Requesting...');
			$(this).attr('disabled', 'true');
		});

		@if(Session::has('enquirySuccess'))
		$('#enquirySuccessModal').modal('show')
		@endif
	});
</script>
@endpush