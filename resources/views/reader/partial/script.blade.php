<script src="{{ asset('reader/assets/vendor/js/helpers.js') }}"></script>
{{-- <script src="{{ asset('reader/assets/vendor/js/template-customizer.js') }}"></script> --}}
<script src="{{ asset('reader/assets/js/config.js') }}"></script>
<script src="{{ asset('reader/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('reader/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('reader/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('reader/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('reader/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('reader/assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('reader/assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('reader/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
<script src="{{ asset('reader/assets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('reader/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('reader/assets/vendor/libs/swiper/swiper.js') }}"></script>
<script src="{{ asset('reader/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('reader/assets/js/main.js') }}"></script>
<script src="{{ asset('reader/assets/js/dashboards-analytics.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script>
    toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
    }
    @if(Session::has('success'))
        toastr.success("{{ session('success') }}")
    @endif
  </script>
  <script>
    toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
    }
    @if(Session::has('error'))
        toastr.error("{{ session('error') }}")
    @endif
  </script>
