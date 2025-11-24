@extends('layouts.default')
@push('title', get_phrase('Home'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
    <!-----------  Banner Area Start   ------------->
    <section class="banner-wraper">
        @include('frontend.default.home.banner')
    </section>
    <!-----------  Banner Area End   ------------->

    <!-----------  Performance Area Start   ------------->
    <section class="performance-wrapper section-padding">
        @include('frontend.default.home.sort_banner')
    </section>
    <!-----------  Performance Area End   ------------->

    <!-----------  Category Area Start   ------------->
    <section class="category-wrapper section-padding">
        @include('frontend.default.home.top_categories')
    </section>
    <!-----------  Category Area End   ------------->

    <!-----------  Feature Area Start   ------------->
    <section class="feature-wrapper section-padding">
        @include('frontend.default.home.featured_courses')
    </section>
    <!-----------  Feature Area End   ------------->

    <!-----------  Skill Area Start   ------------->
    <section class="skill-wrapper section-padding">
        @include('frontend.default.home.about_us')
    </section>
    <!-----------  Skill Area End   ------------->

    <!-----------  Blog  Area Start   ------------->
    <section class="blog-wrapper section-padding">
        @if (get_frontend_settings('blog_visibility_on_the_home_page'))
            @include('frontend.default.home.blog')
        @endif
    </section>
    <!-----------  Blog Area End   ------------->
@endsection
