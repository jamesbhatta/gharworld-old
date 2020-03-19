@extends('mail.template')

@section('content')
<h2>Property Enquiry.</h2>
<div>
    From:
    <br>
    <strong>{{ $formData->name }}</strong>
    <br>
    {{ $formData->email }}
    <br>
    {{ $formData->phone }}
</div>
<p>
    Interested in <a href="{{ route('property.view', $property->slug) }}">{{ $property->title }}</a>
</p>
@endsection
