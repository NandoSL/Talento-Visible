@php
    $parent_categories = DB::table('categories')->where('parent_id', 0)->latest('id')->get();
    $current_route = Route::currentRouteName();
@endphp
@php
    $parent_categories = DB::table('categories')->where('parent_id', 0)->latest('id')->get();
    $current_route = Route::currentRouteName();
@endphp
@php
    $parent_categories = DB::table('categories')->where('parent_id', 0)->latest('id')->get();
    $current_route = Route::currentRouteName();
@endphp

<header class="header-area">
    <div class="container">
        <div class="row flex-md-nowrap"> 
            
            <div class="col-auto order-1"> 
                <div class="logo-image">
                    <a href="{{ route('home') }}">
                        <img src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="system logo" class="object-fit-cover rounded">
                    </a>
                </div>
            </div>
            
            <div class="mx-auto order-2 d-flex justify-content-center"> 
                <div class="mi-header-menu d-flex mt-2 pt-1">
                    <div class="mi-nav-menu">
                        <ul class="mi-primary-menu mi-main-menu-ul d-flex align-items-center">
                            <li><a href="{{ route('home') }}" class="@if ($current_route == 'home') active @endif">{{ get_phrase('Home') }}</a></li>
                            <li class="mi-have-mega-menu"><a class="mi-menu-parent-a @if ($current_route == 'courses') active @endif" href="{{ route('courses') }}">{{ get_phrase('Courses') }}</a>
                                <ul class="mi-mega-dropdown-menu mega mi-main-mega-menu">
                                    <div class="mi-mega-menu-items">
                                        <ul class="mi-mega-list">
                                            @foreach ($parent_categories->take(10) as $parent_category)
                                                @php
                                                    $child_categories = App\Models\Category::where('parent_id', $parent_category->id);
                                                @endphp
                                                <li>
                                                    <a href="{{ route('courses', $parent_category->slug) }}">
                                                        <span class="me-3"><i class="{{ $parent_category->icon }}"></i></span>
                                                        <span class="me-auto">{{ ucfirst($parent_category->title) }}</span>
                                                        @if ($child_categories->count() > 0)
                                                            <span><i class="fi fi-sr-angle-small-right"></i></span>
                                                        @endif
                                                    </a>

                                                    @if ($child_categories->count() > 0)
                                                        <ul class="mi-child-category-menu">
                                                            @foreach ($child_categories->get() as $child_category)
                                                                <li>
                                                                    <a href="{{ route('courses', $child_category->slug) }}">
                                                                        {{ ucfirst($child_category->title) }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                            <li>
                                                <a href="{{ route('courses') }}">
                                                    <span class="me-3"><i class="fas fa-list-ul"></i></span>
                                                    <span class="me-auto">{{ get_phrase('All Courses') }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-auto ms-auto pt-1 order-3">
                <div class="primary-end d-flex align-items-center pe-4 @auth pt-1 @endif">
                    @if (isset(auth()->user()->id))
                        <div class="Userprofile me-0 me-md-2 ms-2 ms-md-3 d-none d-lg-inline-block">
                            <button class="us-btn dropdown-toggle pt-0" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                <img class="image-40" src="{{ get_image(Auth()->user()->photo) }}" alt="user-img">
                            </button>
                            <ul class="dropdown-menu dropmenu-end " data-popper-placement="bottom-start">
                                <li class="figure_user d-flex">
                                    <img src="{{ get_image(Auth()->user()->photo) }}" alt="user-img">
                                    <div class="figure_text">
                                        <h4>{{ ucfirst(Auth()->user()->name) }}</h4>
                                        <p>{{ ucfirst(Auth()->user()->role) }}</p>
                                    </div>
                                </li>

                                @if (in_array(auth()->user()->role, ['admin', 'instructor']))
                                    <li>
                                        <a class="dropdown-item" href="{{ route(auth()->user()->role . '.dashboard') }}">
                                            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" id="dashboard-icon" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_975_218)">
                                                    <path
                                                        d="M3 0H1.66667C0.747667 0 0 0.747667 0 1.66667V2.33333C0 2.701 0.299 3 0.666667 3H3C3.36767 3 3.66667 2.701 3.66667 2.33333V0.666667C3.66667 0.299 3.36767 0 3 0ZM0.666667 2.33333V1.66667C0.666667 1.11533 1.11533 0.666667 1.66667 0.666667H3L3.00067 2.33333H0.666667ZM7.33333 5H5C4.63233 5 4.33333 5.299 4.33333 5.66667V7.33333C4.33333 7.701 4.63233 8 5 8H6.33333C7.25233 8 8 7.25233 8 6.33333V5.66667C8 5.299 7.701 5 7.33333 5ZM7.33333 6.33333C7.33333 6.88467 6.88467 7.33333 6.33333 7.33333H5V5.66667H7.33333V6.33333ZM6.33333 0H5C4.63233 0 4.33333 0.299 4.33333 0.666667V3.66667C4.33333 4.03433 4.63233 4.33333 5 4.33333H7.33333C7.701 4.33333 8 4.03433 8 3.66667V1.66667C8 0.747667 7.25233 0 6.33333 0ZM5 3.66667V0.666667H6.33333C6.88467 0.666667 7.33333 1.11533 7.33333 1.66667L7.334 3.66667H5ZM3 3.66667H0.666667C0.299 3.66667 0 3.96567 0 4.33333V6.33333C0 7.25233 0.747667 8 1.66667 8H3C3.36767 8 3.66667 7.701 3.66667 7.33333V4.33333C3.66667 3.96567 3.36767 3.66667 3 3.66667ZM1.66667 7.33333C1.11533 7.33333 0.666667 6.88467 0.666667 6.33333V4.33333H3L3.00067 7.33333H1.66667Z"
                                                        fill="#747579" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_975_218">
                                                        <rect width="8" height="8" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                            {{ get_phrase('Dashboard') }}
                                        </a>
                                    </li>
                                @endif

                                @if (Auth()->user()->role != 'admin')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('my.courses') }}">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.4077 21.45C4.87507 21.45 4.42396 21.2652 4.05437 20.8956C3.68479 20.526 3.5 20.0749 3.5 19.5423V4.4077C3.5 3.87507 3.68479 3.42396 4.05437 3.05438C4.42396 2.68479 4.87507 2.5 5.4077 2.5H16.5922C17.1249 2.5 17.576 2.68479 17.9456 3.05438C18.3152 3.42396 18.5 3.87507 18.5 4.4077V10.3923C18.5 10.6051 18.4198 10.7917 18.2595 10.9519C18.0993 11.1122 17.9128 11.1923 17.7 11.1923C17.4871 11.1923 17.3006 11.1122 17.1404 10.9519C16.9801 10.7917 16.9 10.6051 16.9 10.3923V4.4077C16.9 4.33077 16.8679 4.26024 16.8038 4.19613C16.7397 4.13203 16.6692 4.09998 16.5922 4.09998H11.9999V9.8134C11.9999 10.0116 11.9105 10.1589 11.7317 10.2553C11.5529 10.3517 11.3782 10.3448 11.2077 10.2346L9.72497 9.32495L8.2423 10.2346C8.07178 10.3448 7.8971 10.3517 7.71825 10.2553C7.53942 10.1589 7.45 10.0116 7.45 9.8134V4.09998H5.4077C5.33077 4.09998 5.26024 4.13203 5.19612 4.19613C5.13202 4.26024 5.09997 4.33077 5.09997 4.4077V19.5423C5.09997 19.6192 5.13202 19.6897 5.19612 19.7538C5.26024 19.8179 5.33077 19.85 5.4077 19.85H11.0058C11.2186 19.85 11.4051 19.9301 11.5654 20.0904C11.7256 20.2506 11.8057 20.4371 11.8057 20.65C11.8057 20.8628 11.7256 21.0493 11.5654 21.2096C11.4051 21.3698 11.2186 21.45 11.0058 21.45H5.4077ZM17.697 22.3461C16.4336 22.3461 15.3599 21.9031 14.476 21.0171C13.592 20.1312 13.15 19.0565 13.15 17.7931C13.15 16.5297 13.593 15.4561 14.4789 14.5721C15.3649 13.6881 16.4396 13.2462 17.703 13.2462C18.9663 13.2462 20.04 13.6891 20.924 14.5751C21.8079 15.4611 22.2499 16.5358 22.2499 17.7991C22.2499 19.0625 21.8069 20.1362 20.921 21.0201C20.035 21.9041 18.9603 22.3461 17.697 22.3461ZM17.5442 19.3134L19.1788 18.2134C19.3365 18.1198 19.4153 17.9743 19.4153 17.7769C19.4153 17.5794 19.3365 17.4339 19.1788 17.3404L17.5442 16.2404C17.3737 16.1134 17.1974 16.1014 17.0154 16.2043C16.8333 16.3072 16.7423 16.4647 16.7423 16.6769V18.8769C16.7423 19.089 16.8333 19.2466 17.0154 19.3495C17.1974 19.4523 17.3737 19.4403 17.5442 19.3134ZM11.0058 4.09998H5.09997H16.9H11.0058Z"
                                                    fill="#6B7385" />
                                            </svg>
                                            {{ get_phrase('My Courses') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('my.profile') }}">
                                            </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('wishlist') }}">
                                            </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('message') }}">
                                            </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('purchase.history') }}">
                                            </a>
                                    </li>
                                @endif
                            
                                <li>
                                    <a class="dropdown-item mb-0" href="{{ route('logout') }}">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                        {{ get_phrase('Log Out') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @else
                    <div class="d-flex align-items-center d-none d-lg-flex"> 
                         <a href="{{ route('login') }}" class="gradient2">{{ get_phrase('Sign In') }}</a> 
                        <a href="{{ route('register') }}" class="eBtn btn gradient me-2">{{ get_phrase('Register') }}</a>
                       
                    @endif 
                    <span class="toggle-bar text-dark ms-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                        <i class="fa-sharp fa-solid fa-bars"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>

        @include('frontend.default.menu_header_mobile')
    </div>
</header>
<!-----------  Header Area End   ------------->

@push('js')
    <script>
        "use strict";
        $(document).ready(function() {
            $('#lng-selector').change(function(e) {
                e.preventDefault();
                $(this).parent().trigger('submit');
            });
        });
    </script>
@endpush
