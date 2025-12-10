@php $current_route = Route::currentRouteName(); @endphp

<div class="sidebar-logo-area">
    <a href="#" class="sidebar-logos">
        <img class="sidebar-logo-lg" height="50px" src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="">
        <img class="sidebar-logo-sm" height="40px" src="{{ get_image(get_frontend_settings('favicon')) }}" alt="">
    </a>
    <button class="sidebar-cross menu-toggler d-block d-lg-none">
        <span class="fi-rr-cross"></span>
    </button>
</div>
<h3 class="sidebar-title fs-12px px-30px pb-20px text-uppercase mt-4">{{ get_phrase('Main Menu') }}</h3>
<div class="sidebar-nav-area">
    <nav class="sidebar-nav">
        <ul class="px-14px pb-24px">

            <li class="sidebar-first-li" >
               <a href="{{ route('instructor.dashboard') }}" class="{{ $current_route == 'instructor.dashboard' ? 'active' : '' }}">
                    <span class="icon fi fi-rr-layout-fluid"></span>

                    <div class="text">
                        <span>{{ get_phrase('Dashboard') }}</span>
                    </div>
                </a>
            </li>


            <li class="sidebar-first-li  @if (
               $current_route == 'instructor.courses' ||
               $current_route == 'instructor.course.create' ||
                $current_route == 'instructor.course.edit') active  @endif">
                <a href="{{ route('instructor.courses') }}"class="{{ $current_route == 'instructor.courses' ? 'active' : '' }}">
                    <span class="icon fi fi-sr-book-open-cover"></span>
                    <div class="text">
                        <span>{{ get_phrase('Course') }}</span>
                    </div>
                </a>

            </li>


            {{--
           <li class="sidebar-first-li @if (
              $current_route == 'instructor.bootcamps' ||
              $current_route == 'instructor.bootcamp.purchase.history' ||
              $current_route == 'instructor.bootcamp.purchase.invoice' ||
              $current_route == 'instructor.bootcamp.create' ||
              $current_route == 'instructor.bootcamp.edit' ||
              $current_route == 'instructor.bootcamp.categories') active @endif">
               <a href="{{ route('instructor.bootcamps') }}"class="{{ $current_route == 'instructor.bootcamps' ? 'active' : '' }}">
                 <span class="icon fi fi-rr-rocket"></span>
                  <div class="text">
                    <span>{{ get_phrase('Bootcamp') }}</span>
                  </div>
                 </a>
            </li>



            <li class="sidebar-first-li  @if (
              $current_route == 'instructor.team.packages' ||
              $current_route == 'instructor.team.packages.create' ||
              $current_route == 'instructor.team.packages.edit' ||
              $current_route == 'instructor.team.packages.purchase.history' ||
              $current_route == 'instructor.team.packages.purchase.invoice') active  @endif">
                <a href="{{ route('instructor.team.packages') }}"class="{{ $current_route == 'instructor.team.packages' ? 'active' : '' }}">
                   <span class="icon fi fi-rr-users"></span>
                    <div class="text">
                        <span>{{ get_phrase('Team Training') }}</span>
                    </div>
                </a>
            </li>
            --}}


            <li class="sidebar-first-li {{ $current_route == 'instructor.sales.report' ? 'active' : '' }}">
                <a href="{{ route('instructor.sales.report') }}"class="{{ $current_route == 'instructor.sales.report' ? 'active' : '' }}">
                    <span class="icon fi fi-sr-arrow-trend-up"></span>
                    <div class="text">
                        <span>{{ get_phrase('Sales') }}</span>
                    </div>
                </a>
            </li>

            <li class="sidebar-first-li  @if ($current_route == 'instructor.payout.reports' || $current_route == 'instructor.payout.setting') active showMenu @endif">
                <a href="{{ route('instructor.payout.reports') }}"class="{{ $current_route == 'instructor.payout.reports' ? 'active' : '' }}">
                    <span class="icon fi fi-rr-file-invoice-dollar"></span>
                    <div class="text">
                        <span>{{ get_phrase('Payout') }}</span>
                    </div>
                </a>
            </li>


            @if (get_frontend_settings('instructors_blog_permission'))
                <li class="sidebar-first-li  @if ($current_route == 'instructor.blogs' || $current_route == 'instructor.blog.create' || $current_route == 'instructor.blog.edit' || $current_route == 'instructor.blog.pending') active showMenu @endif">
                    <a href="{{ route('instructor.blogs') }}"class="{{ $current_route == 'instructor.blogs' ? 'active' : '' }}">
                        <span class="icon fi fi-rr-blog-text"></span>
                        <div class="text">
                            <span>{{ get_phrase('Blogs') }}</span>
                        </div>
                    </a>
                </li>
            @endif

            <li class="sidebar-first-li {{ $current_route == 'instructor.manage.profile' ? 'active' : '' }}">
                <a href="{{ route('instructor.manage.profile') }}"class="{{ $current_route == 'instructor.manage.profile' ? 'active' : '' }}">
                    <span class="icon fi-rr-circle-user"></span>
                    <div class="text">
                        <span>{{ get_phrase('Manage Profile') }}</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</div>
