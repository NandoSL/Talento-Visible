<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{ config(['app.name' => get_settings('system_title')]) }}
    <title>{{ get_phrase('Home') }} | {{ config('app.name') }}</title>


    @include('layouts.seo')
    <!-- all the meta tags -->
    <meta content="" name="author" />
    <meta content="{{ csrf_token() }}" name="csrf_token" />

    @stack('meta')


    <!-- fav icon -->
    <link rel="shortcut icon" href="{{ asset(get_frontend_settings('favicon')) }}" />

    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/owl.theme.default.min.css') }}">



    <!-- Nice Select Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/nice-select.css') }}">


    <!-- Fontawasome Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/all.min.css') }}">

    {{-- New Css Link --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/vendors/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/vendors/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/vendors/slick/slick-theme.css') }}">

    <!-- FlatIcons Css -->
    
    <link rel="stylesheet" href="{{ asset('assets/global/icons/uicons-regular-rounded/css/uicons-regular-rounded.css') }}" />


    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/custome-front/custom-fronts.css') }}">


    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/bootstrap.min.css') }}">


    <!-- Main Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/responsive.css') }}">




    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/custom_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/new_responsive.css') }}">

    <!-- Jquery Js -->
    <script src="{{ asset('assets/frontend/default/js/jquery-3.7.1.min.js') }}"></script>
    <style>
        .ui-sortable-handle{
            -ms-touch-action: auto;
            touch-action: auto;
        }
    </style>

    @stack('css')
</head>

<body>


    @php
        if (isset($page_id)) {
            $static_home_page_html = App\Models\Builder_page::where('id', $page_id)->first()->html;
        } else {
            $static_home_page_html = App\Models\Builder_page::where('status', 1)->first()->html;
        }

        if (!$static_home_page_html) {
            return redirect()->route('admin.pages');
        }else{
            if(file_exists('public')){
                $static_home_page_html = str_replace('"/uploads/', '"'.asset('').'uploads/', $static_home_page_html);
                $static_home_page_html = str_replace('"/assets/', '"'.asset('').'assets/', $static_home_page_html);
            }
        }

        $dom = new \DOMDocument();
        @$dom->loadHTML($static_home_page_html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Define an array of classes to target
        $classesToReplace = [
            'topbar',
            'header-menu',
            'hero-button',
            'hero-banner',
            'category',
            'featured-course',
            'featured-course-all-button',
            'promo-more-button',
            'blog-view-all-button',
            'blog',
            'footer-social-contact',
            'footer-widget-1',
            'footer-widget-2',
            'footer-widget-3',
            'footer-subscription-form',
            'footer-bottom',
        ];

        foreach ($classesToReplace as $class) {
            // Find all elements with the specified class attribute
            $xpath = new \DOMXPath($dom);
            $elements = $xpath->query("//span[@class='$class']");

            // Replace content for each found element
            foreach ($elements as $element) {
                $newElement = $dom->createElement($class, ''); // Create a new span element (you can change it according to your needs)

                // Replace the old element with the new one
                $element->parentNode->replaceChild($newElement, $element);
            }
        }

        // Get the modified HTML
        $modifiedHtml = $dom->saveHTML();

        // Replace the new HTML with dynamic content

        foreach ($classesToReplace as $class) {
            $newElementContent = view('components.home-page.' . $class)->render();
            $modifiedHtml = str_replace("<$class></$class>", $newElementContent, $modifiedHtml);
        }

        $current_route = Route::currentRouteName();
        $modifiedHtml = str_replace('%5C.', '\.', $modifiedHtml);
        $modifiedHtml = str_replace('%5Cpublic', '\public', $modifiedHtml);
        if ($current_route == 'admin.page.preview') {
            $modifiedHtml = str_replace('..\public', 'public', $modifiedHtml);
        } else {
            $modifiedHtml = str_replace('..\..\..\..\public', 'public', $modifiedHtml);
        }
        echo $modifiedHtml;
    @endphp




    <!-- Bootstrap Js -->
    <script src="{{ asset('assets/frontend/default/js/bootstrap.bundle.min.js') }}"></script>

    <!-- nice select js -->
    <script src="{{ asset('assets/frontend/default/js/jquery.nice-select.min.js') }}"></script>


    <!-- owl carousel js -->
    <script src="{{ asset('assets/frontend/default/js/owl.carousel.min.js') }}"></script>


    <!-- Main Js -->
    <script src="{{ asset('assets/frontend/default/js/script.js') }}"></script>

    <!-- toster file -->
    @include('frontend.default.toaster')


    <!-- custom scripts -->
    @include('frontend.default.scripts')
    @stack('js')


    <script>
        "use strict";
        $(document).ready(function() {
            $('.gSearch-icon').on('click', function() {
                $('.gSearch-show').toggleClass('active');
            });
        });
    </script>
</body>

</html>
