@extends('layouts.app')

@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 white p-4" data-aos="fade-up" data-aos-delay="200">
                <div class="lead">
                   {!! $about->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
