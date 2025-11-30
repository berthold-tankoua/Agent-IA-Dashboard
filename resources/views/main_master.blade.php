<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    	<link href="{{ asset('/frontend/favicon.png') }}" rel="icon">
    <link href="{{ asset('/frontend/favicon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<!-- Font Awesome CDN (version 6) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

	<link rel="stylesheet" href="{{ asset('frontend/assets/vendor/fonts/iconify-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <script src="{{ asset('frontend/assets/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/config.js') }}"></script>
  </head>
    <style>

      .toast {
        background-color: #030303 !important;
      }
      .toast-info {
        background-color: #3276b1 !important;
      }
      .toast-info2 {
        background-color: #2f96b4 !important;
      }
      .toast-error {
        background-color: #bd362f !important;
      }
      .toast-success {
        background-color: #51a351 !important;
      }
      .toast-warning {
        background-color: #f89406 !important;
      }

    </style>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <!-- Layout container -->
         @yield('content')
        <!-- / Layout page -->

      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
			<!-- Footer -->
        @include('components.footer')
		<!-- / Footer -->
    <!-- / Layout wrapper -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Core JS -->

    <script src="{{ asset('frontend/assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('frontend/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/js/bootstrap.js') }}"></script>

    <script src="{{ asset('frontend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('frontend/assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('frontend/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<!-- jjjjjjjj -->
    <!-- Main JS -->

    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('frontend/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
      <script>

    @if(Session::has('message'))

      var type = "{{ Session::get('alert-type', 'info') }}";
      switch (type) {
        case 'info':
          toastr.info(" {{ Session::get('message') }} ")
          break;

        case 'success':
          toastr.success(" {{ Session::get('message') }} ")
          break;

        case 'warning':
          toastr.warning(" {{ Session::get('message') }} ")
          break;

        case 'error':
          toastr.error(" {{ Session::get('message') }} ")
          break;
      }

    @endif

  </script>

  <script type="text/javascript">
    $(function(){
        $(document).on('click','#delete',function(e){
          e.preventDefault();
          var link = $(this).attr("href");

          Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link
              Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
              )
            }
          }); //end sweet alert script
        });
      }); //end script
  </script>
  <script>
    flatpickr("#publish_at", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today" // empêcher les dates passées
    });
</script>

  </body>
</html>
