<script src="{{ asset('/theme/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/theme/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('/theme/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/theme/js/popper.min.js') }}"></script>
<script src="{{ asset('/theme/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/theme/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/theme/js/mediaelement-and-player.min.js') }}"></script>
<script src="{{ asset('/theme/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('/theme/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('/theme/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/theme/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/theme/js/aos.js') }}"></script>

<script src="{{ asset('/theme/js/main.js') }}"></script>
{{-- Dropzone --}}
<script src="{{ asset('/dropzone/dropzone.min.js') }}"></script>

<script src="{{ asset('/js/mdb.min.js') }}"></script>

<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  $(function() {
  // $('[data-toggle="tooltip"]').tooltip();
  $('[data-toggle="tooltip"]').tooltip()
});
</script>

@stack('scripts')