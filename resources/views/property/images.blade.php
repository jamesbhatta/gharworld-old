@extends('layouts.control-panel')

@section('title')
Property Images
@endsection

@section('content')
<div class="white px-3">
	<ul class="stepper stepper-horizontal">
		<li class="complete">
			<a href="#!">
				<span class="circle">1</span>
				<span class="label">Add Property Details</span>
			</a>
		</li>
		<li class="active">
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
	@include('property.images-section')
		<div class="text-right">
			<a class="btn btn-success z-depth-0" href="{{ route('property.index') }}"><i class="fa fa-save mr-2"></i>Publish</a>
		</div>
</div>
@endsection