@if (count($properties))
<div class="site-section site-section-sm bg-light">
  <div class="container">
    <div class="mt-3 mb-2">
      Showing {{ $properties->firstItem() }} - {{ $properties->lastItem() }} of {{ $properties->total() }} results
    </div>
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
            @auth()
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

    <div class="row">
      <div class="col-md-12 text-center">
        <div class="d-flex justify-content-center">
          {{ $properties->links() }}
        </div>
      </div>
    </div>

  </div>
  {{-- End of container --}}

</div>
@else
<div class="white text-center p-5 m-4">
  <div class="h1-responsive"><i class="fa fa-info-circle mr-2"></i>OOPS!</div>
  <div>
    No Records found for the given selection.
  </div>
</div>
@endif