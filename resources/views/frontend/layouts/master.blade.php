<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>Sazao || @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('frontend') }}/images/favicon.png">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery.nice-number.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery.calendar.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/add_row_custon.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/mobile_menu.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery.exzoom.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/multiple-image-video.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/ranger_style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery.classycountdown.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/venobox.min.css">

    {{-- toaster css --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/> --}}
    {{-- sweetalert2 css --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css">
    <!-- <link rel="stylesheet" href="{{ asset('frontend') }}/css/rtl.css"> -->

    @yield('front_css')

</head>

<body>

    <!--============================
        HEADER START
    ==============================-->
    @include('frontend.inc.header')
    <!--============================
        HEADER END
    ==============================-->


    <!--============================
        MAIN MENU START
    ==============================-->
    @include('frontend.inc.main_menu')
    <!--============================
        MAIN MENU END
    ==============================-->


    <!--============================
        MOBILE MENU START
    ==============================-->
    @include('frontend.inc.mobile_menu')
    <!--============================
        MOBILE MENU END
    ==============================-->


    <!--==========================
        POP UP START
    ===========================-->
    @include('frontend.inc.popup')
    <!--==========================
        POP UP END
    ===========================-->


    <!--==========================
      PRODUCT MODAL VIEW START
    ===========================-->
    @include('frontend.inc.popup_modal')
    <!--==========================
      PRODUCT MODAL VIEW END
    ===========================-->


    @yield('content')


    <!--============================
        FOOTER PART START
    ==============================-->
    @include('frontend.inc.footer')
    <!--============================
        FOOTER PART END
    ==============================-->


    <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->


    <!--jquery library js-->
    <script src="{{ asset('frontend') }}/js/jquery-3.6.0.min.js"></script>
    <!--bootstrap js-->
    <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend') }}/js/Font-Awesome.js"></script>
    <!--select2 js-->
    <script src="{{ asset('frontend') }}/js/select2.min.js"></script>
    <!--slick slider js-->
    <script src="{{ asset('frontend') }}/js/slick.min.js"></script>
    <!--simplyCountdown js-->
    <script src="{{ asset('frontend') }}/js/simplyCountdown.js"></script>
    <!--product zoomer js-->
    <script src="{{ asset('frontend') }}/js/jquery.exzoom.js"></script>
    <!--nice-number js-->
    <script src="{{ asset('frontend') }}/js/jquery.nice-number.min.js"></script>
    <!--counter js-->
    <script src="{{ asset('frontend') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.countup.min.js"></script>
    <!--add row js-->
    <script src="{{ asset('frontend') }}/js/add_row_custon.js"></script>
    <!--multiple-image-video js-->
    <script src="{{ asset('frontend') }}/js/multiple-image-video.js"></script>
    <!--sticky sidebar js-->
    <script src="{{ asset('frontend') }}/js/sticky_sidebar.js"></script>
    <!--price ranger js-->
    <script src="{{ asset('frontend') }}/js/ranger_jquery-ui.min.js"></script>
    <script src="{{ asset('frontend') }}/js/ranger_slider.js"></script>
    <!--isotope js-->
    <script src="{{ asset('frontend') }}/js/isotope.pkgd.min.js"></script>
    <!--venobox js-->
    <script src="{{ asset('frontend') }}/js/venobox.min.js"></script>
    <!--classycountdown js-->
    <script src="{{ asset('frontend') }}/js/jquery.classycountdown.js"></script>

    {{-- toaster js --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script> --}}
    {{-- sweetalert2 css --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>

    <!--main/custom js-->
    <script src="{{ asset('frontend') }}/js/main.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('front_js')

    <script>
      @if(session()->has('messege'))
        var type = "{{ session()->get('alert-type') }}";
        // alert('siam');

        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 5000,
          timerProgressBar: true,
          showCloseButton: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
        });
        
        switch(type) {
          case 'success':
            Toast.fire({
              icon: "success",
              title: "{{ session()->get('messege') }}"
            });
            break;
          case 'error':
            Toast.fire({
              icon: "error",
              title: "{{ session()->get('messege') }}"
            });
            break;
          case 'info':
            Toast.fire({
              icon: "info",
              title: "{{ session()->get('messege') }}"
            });
            break;
          case 'warning':
            Toast.fire({
              icon: "warning",
              title: "{{ session()->get('messege') }}"
            });
            break;
          default:
            // code block
        }
      @endif
    </script>

</body>

</html>
