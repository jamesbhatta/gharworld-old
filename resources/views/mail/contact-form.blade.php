@extends('mail.template')

@section('content')
<h2>New Entry in Contact Form.</h2>
<div>
    From:
    <br>
    {{ $formData->fullname }}
    <br>
    {{ $formData->email }}
</div>
@if($formData->subject)
<div>Subject: <strong>{{ $formData->subject }}</strong></div>
@endif
<p>
    {{ $formData->message }}
</p>
@endsection
