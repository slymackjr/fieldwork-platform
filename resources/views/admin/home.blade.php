<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Welcome to Fieldwork Platform</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
    <link href="{{ asset('node_modules/aos/dist/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/glightbox/dist/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Slider Area -->
<div class="slider_area">
    <div class="single_slider d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="slider_text">
                        <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">Welcome Back!</h5>
                        <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Thank you for choosing Fieldwork Platform.</h3>
                        <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">Explore More</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
        <img src="{{asset('img/banner/illustration.png')}}" alt="Illustration">
    </div>
</div>
<!-- End Slider Area -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <!-- Scripts at the bottom of the body for faster page load -->
    <script src="{{ asset('node_modules/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('node_modules/glightbox/dist/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('node_modules/isotope-layout/dist/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('node_modules/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('node_modules/typed.js/dist/typed.umd.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('js/script.js')}}"></script>

</body>

</html>
