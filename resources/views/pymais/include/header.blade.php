<!-- Mobile Menu Modal -->
        <div class="modal mobile-menu-modal offcanvas-modal fade" id="offcanvas-modal">
            <div class="modal-dialog offcanvas-dialog">
                <div class="modal-content">
                    <div class="modal-header offcanvas-header">
                        <!-- offcanvas-logo-start -->
                        <div class="offcanvas-logo">
                            <a href="{{route('home')}}">
                                <img src="{{asset('assets/frontend/pymais/images/logo-3.svg')}}" alt="#" />
                            </a>
                        </div>
                        <!-- offcanvas-logo-end -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fi fi-ss-cross"></i>
                        </button>
                    </div>
                    {{--  Menu movil  --}}
                    <div class="mobile-menu-modal-main-body">
                        <!-- offcanvas-menu start -->
                        <nav id="offcanvas-menu" class="navigation offcanvas-menu">
                            <ul id="nav mobile-nav" class="list-none offcanvas-men-list">
                                <li>
                                    <a href="{{route('home')}}">{{__('Home')}}</a>
                                </li>
                                {{-- Ocultar el elemento "Sign Up" si el usuario está en la ruta sme.signup --}}
                                @if (Route::currentRouteName() !== 'register')
                                    <li class="active">
                                        <a href="{{route('register')}}">{{__('Sign Up')}}</a>
                                    </li>
                                    
                                @endif
                                @if (Route::currentRouteName() !== 'login')
                                                <li class="active">
                                                    <a href="{{route('login')}}">{{__('Sign In')}}</a>
                                                </li>
                                            @endif
                            
                                {{--  <li>
                                    <a class="menu-arrow" href="javascript:void(0)">Courses</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="course.html">Course</a>
                                        </li>
                                        <li>
                                            <a href="course-details.html">Course Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-arrow" href="javascript:void(0)">Events</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="event.html">Event</a>
                                        </li>
                                        <li>
                                            <a href="event-details.html">Event Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-arrow" href="javascript:void(0)">Pages</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="about.html">About Us</a>
                                        </li>
                                        <li>
                                            <a href="team.html">Team</a>
                                        </li>
                                        <li>
                                            <a href="team-details.html">Team Details</a>
                                        </li>
                                        <li>
                                            <a href="login.html">Login</a>
                                        </li>
                                        <li>
                                            <a href="register.html">Register</a>
                                        </li>
                                        <li>
                                            <a href="404.html">404 Error</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-arrow" href="javascript:void(0)">Shop</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="shop.html">Shop</a>
                                        </li>
                                        <li>
                                            <a href="cart.html">Cart</a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html">Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="checkout.html">Checkout</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-arrow" href="javascript:void(0)">Blog</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog.html">Blog </a>
                                        </li>
                                        <li>
                                            <a href="blog-details.html">Blog Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>  --}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mobile Menu Modal -->

        <!-- Start Header Area -->
        <header class="ep-header ep-header--style2 position-relative">
            <!-- Header Middle -->
            <div id="active-sticky" class="ep-header__middle ep-header__middle--style2">
                <div class="container ep-container">
                    <div class="ep-header__inner ep-header__inner--style2">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-6">
                                <a class="ep-logo-a" href="{{ route('home') }}">
                                    <div class="ep-logo">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-10 col-6">
                                <div class="ep-header__inner-right">
                                    <nav class="ep-header__navigation">
                                        <ul class="ep-header__menu ep-header__menu--style2">
                                            {{-- <li class="active">
                                                <a href="{{route('home')}}">{{__('Home')}}</a>
                                            </li> --}}
                                            {{-- Ocultar el elemento "Sign Up" si el usuario está en la ruta sme.signup --}}
                                            @if (Route::currentRouteName() !== 'login')
                                                <li class="active">
                                                    <a href="{{route('login')}}">{{__('Sign In')}}</a>
                                                </li>
                                            @endif
                                            @if (Route::currentRouteName() !== 'register')
                                                <li class="active">
                                                    <a href="{{route('register')}}">{{__('Sign Up')}}</a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="#">{{__('Language')}} <i class="fi fi-ss-angle-small-down"></i>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="{{ route('set_language', ['es']) }}">{{__('Spanish')}}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('set_language', ['en']) }}">{{__('English')}}</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            {{--  <li>
                                                <a href="#">Courses <i class="fi fi-ss-angle-small-down"></i>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="course.html">Course</a>
                                                    </li>
                                                    <li>
                                                        <a href="course-details.html">Course Details</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Events <i class="fi fi-ss-angle-small-down"></i>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="event.html">Event</a>
                                                    </li>
                                                    <li>
                                                        <a href="event-details.html">Event Details</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Pages <i class="fi fi-ss-angle-small-down"></i>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="about.html">About Us</a>
                                                    </li>
                                                    <li>
                                                        <a href="team.html">Team</a>
                                                    </li>
                                                    <li>
                                                        <a href="team-details.html">Team Details</a>
                                                    </li>
                                                    <li>
                                                        <a href="login.html">Login</a>
                                                    </li>
                                                    <li>
                                                        <a href="register.html">Register</a>
                                                    </li>
                                                    <li>
                                                        <a href="404.html">404 Error</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Shop <i class="fi fi-ss-angle-small-down"></i>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="shop.html">Shop</a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html">Cart</a>
                                                    </li>
                                                    <li>
                                                        <a href="wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li>
                                                        <a href="checkout.html">Checkout</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Blog <i class="fi fi-ss-angle-small-down"></i>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="blog.html">Blog</a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-details.html">Blog Details</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="contact.html">Contact</a>
                                            </li>  --}}
                                        </ul>
                                    </nav>
                                    {{-- <div class="ep-header__btn">
                                        <a href="about.html" class="ep-btn ep5-bg">Read More <i class="fi fi-rs-arrow-small-right"></i>
                                        </a>
                                    </div> --}}
                                </div>
                                <!-- Mobile Menu Button -->
                                <button type="button" class="mobile-menu-offcanvas-toggler" data-bs-toggle="modal" data-bs-target="#offcanvas-modal">
                                    <span class="line"></span>
                                    <span class="line"></span>
                                    <span class="line"></span>
                                </button>
                                <!-- End Mobile Menu Button -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header Area -->
