@extends('layouts.app')
@section('content')
<div class="site-wrap">
  <div class="slide-one-item home-slider owl-carousel">
    <div class="site-blocks-cover overlay" style="background-image: url({{ asset('/theme/images/hero_bg_1.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">For Rent</span>
            <h1 class="mb-2">Dream Palace</h1>
            <p class="mb-5 d-none"><strong class="h2 text-success font-weight-bold">$2,250,500</strong></p>
            <p><a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-blocks-cover overlay" style="background-image: url({{ asset('/theme/images/hero_bg_2.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <span class="d-inline-block bg-danger text-white px-3 mb-3 property-offer-type rounded">For Sale</span>
            <h1 class="mb-2">Property For Sale</h1>
            <p class="mb-5 d-none"><strong class="h2 text-success font-weight-bold">$1,000,500</strong></p>
            <p><a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>
          </div>
        </div>
      </div>
    </div>

  </div>

  @include('includes.search-bar')

  @include('includes.property-list')

</div>

<div class="site-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 text-center">
        <div class="site-section-title">
          <h2>Why Choose Us?</h2>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque, deleniti cupiditate officia.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-4">
        <a href="#" class="service text-center">
          <span class="icon flaticon-house"></span>
          <h2 class="service-heading">Research Subburbs</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
          <p><span class="read-more">Read More</span></p>
        </a>
      </div>
      <div class="col-md-6 col-lg-4">
        <a href="#" class="service text-center">
          <span class="icon flaticon-sold"></span>
          <h2 class="service-heading">Sold Houses</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
          <p><span class="read-more">Read More</span></p>
        </a>
      </div>
      <div class="col-md-6 col-lg-4">
        <a href="#" class="service text-center">
          <span class="icon flaticon-camera"></span>
          <h2 class="service-heading">Security Priority</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
          <p><span class="read-more">Read More</span></p>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection