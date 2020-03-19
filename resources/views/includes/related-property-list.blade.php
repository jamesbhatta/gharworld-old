<div class="row mb-5">
  @foreach ($properties as $property)
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="property-entry h-100">
      <a href="{{ route('property.view', $property->slug) }}" class="property-thumbnail">
        <div class="offer-type-wrap">
          @if ($property->property_for == 'Sale')
          <span class="offer-type bg-danger">Sale</span>
          @endif
          @if ($property->property_for == 'Rent')
          <span class="offer-type bg-success">Rent</span>
          @endif
        </div>
        @foreach ($property->images as $image)
        <img src="{{ asset('storage/'. $image->path) }}" alt="Image" class="img-fluid property-card-image">
        @break
        @endforeach
      </a>
      <div class="p-4 property-body">
        @auth
        <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
        @endauth
        <h2 class="property-title"><a href="{{ route('property.view', $property->slug) }}">{{ $property->title }}</a></h2>
        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> {{ $property->address }}, {{ $property->city->name }}</span>
        <strong class="property-price text-primary mb-3 d-block text-success">NRs. {{ number_format($property->price) }} /-</strong>
      </div>
    </div>
  </div>
  @endforeach
  {{-- End of properties --}}
</div>