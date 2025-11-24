<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all" />
    <meta name="keywords"
        content="online learning, education, e-learning, courses, tutorials, educational resources, skill development, career enhancement" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/frontend/pymais/images/favicon.svg') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/pymais/plugins/css/bootstrap.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/pymais/plugins/css/animate.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/pymais/plugins/css/owl.carousel.min.css') }}">
    <!-- Maginific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/pymais/plugins/css/maginific-popup.min.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/pymais/plugins/css/nice-select.min.css') }}">
    <!-- Icofont -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/pymais/plugins/css/icofont.css') }}">
    <!-- Uicons -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/pymais/plugins/css/uicons.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/pymais/style.css') }}">

    @stack('form-css')
    @stack('accordion-css')

</head>

<body>

    <!-- Start Preloader  -->
    <div id="preloader">
        <div id="ep-preloader" class="ep-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Start Back To Top  -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- End Back To Top -->

            @include('pymais.include.header')

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                @yield('content')
            </main>
            <!-- Start Footer Area -->
            @include('pymais.include.footer')
            <!-- End Footer Area -->
        </div>
    </div>
    <!-- Jquery JS -->
    <script src="{{ asset('assets/frontend/pymais/plugins/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/pymais/plugins/js/jquery-migrate.js') }}"></script>
    <!-- Modernizer JS -->
    <script src="{{ asset('assets/frontend/pymais/plugins/js/modernizer.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/frontend/pymais/plugins/js/bootstrap.min.js') }}"></script>
    <!-- Gsap JS -->
    <script src="{{ asset('assets/frontend/pymais/plugins/js/gsap/gsap.js') }}"></script>
    <script src="{{ asset('assets/frontend/pymais/plugins/js/gsap/gsap-scroll-to-plugin.js') }}"></script>
    <script src="{{ asset('assets/frontend/pymais/plugins/js/gsap/gsap-scroll-smoother.js') }}"></script>
    <script src="{{ asset('assets/frontend/pymais/plugins/js/gsap/gsap-scroll-trigger.js') }}"></script>
    <script src="{{ asset('assets/frontend/pymais/plugins/js/gsap/gsap-split-text.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('assets/frontend/pymais/plugins/js/wow.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('assets/frontend/pymais/plugins/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('assets/frontend/pymais/plugins/js/magnific-popup.min.js') }}"></script>
    <!-- CounterUp  JS -->
    <script src="{{ asset('assets/frontend/pymais/plugins/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/pymais/plugins/js/waypoints.min.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('assets/frontend/pymais/plugins/js/nice-select.min.js') }}"></script>
    <!-- Cursor JS -->
    <script src="{{ asset('assets/frontend/pymais/plugins/js/ep-cursor.js') }}"></script>
    <!-- Back To Top JS -->
    <script src="{{ asset('assets/frontend/pymais/plugins/js/backToTop.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/frontend/pymais/plugins/js/active.js') }}"></script>

    <!-- toster file -->
    @include('frontend.default.toaster')

    @stack('form-js')
    @stack('accordion-js')
</body>

</html>
