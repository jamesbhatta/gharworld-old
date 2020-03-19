<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="mb-5">
          <h3 class="footer-heading mb-4">About Ghar World</h3>
          <p>
            Gharworld.com is a platform to disseminate real estate industry information. We provide comprehensive detail on real estate properties which are for sale or rent, including current news and information about real estate market.
          </p>
        </div>

      </div>
      <div class="col-lg-4 mb-5 mb-lg-0">
        <div class="row mb-5">
          <div class="col-md-12">
            <h3 class="footer-heading mb-4">Navigations</h3>
          </div>
          <div class="col-md-6 col-lg-6">
            <ul class="list-unstyled">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('property.search') }}?property_for=Sale">Buy</a></li>
              <li><a href="{{ route('property.search') }}?property_for=Rent">Rent</a></li>
              <li><a href="{{ route('property.search') }}">Properties</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-6">
            <ul class="list-unstyled">
              <li><a href="{{ route('about') }}">About Us</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="{{ route('contact') }}">Contact Us</a></li>
              <li><a href="#">Terms</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-5 mb-lg-0">
        <h3 class="footer-heading mb-4">Follow Us</h3>

        <div>
          <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
          <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
          <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
          <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
        </div>
      </div>
    </div>
    <div class="row pt-5 mt-5 text-center">
      <div class="col-md-12">
        <p>
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Powered by <a href="http://mohrain.com" target="_blank" >Mohrain Websoft</a>
        </p>
      </div>
    </div>
  </div>
</footer>
</div>


@include('includes.footer-scripts')