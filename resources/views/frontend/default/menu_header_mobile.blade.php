<!-- Off Canves Menu -->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel"></h5>
    </div>
    <div class="offcanvas-body px-4">
        <div class="off-menu">
            <div class="logo-image d-flex align-items-center justify-content-between mb-4">
                <a href="{{ route('home') }}">
                    <img src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="system logo">
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="mt-3 flex-shrink-0">
                <ul class="list-unstyled ps-0">
                    @auth
                        <li>
                            <div class="d-flex align-items-center my-4 mt-5">
                                <img src="{{ get_image(Auth()->user()->photo) }}" alt="user-img" class="image-45">
                                <div class="ms-3 pt-2">
                                    <h3>{{ Auth()->user()->name }}</h3>
                                    <small class="text-muted">{{ Auth()->user()->email }}</small>
                                </div>
                                <a data-bs-toggle="tooltip" title="{{ get_phrase('Logout') }}" class="btn btn-light text-14px me-3 ms-auto" href="{{ route('logout') }}"> <i class="fi-rr-arrow-right-to-bracket"></i> </a>
                            </div>
                        </li>
                        @if (auth()->user() && auth()->user()->role == 'student')
                            @php
                                $numberof_wishlist_item = App\Models\Wishlist::where('user_id', auth()->user()->id)->count();
                            @endphp
                            <li><a href="{{ route('my.courses') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3"> {{ get_phrase('My Courses') }}</a></li>
                            <li><a href="{{ route('wishlist') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3"> {{ get_phrase('Wishlist') }} <span class="badge bg-pink ms-auto">{{ $numberof_wishlist_item }}</span></a></li>
                            <li><a href="{{ route('my.profile') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3"> {{ get_phrase('My profile') }}</a></li>
                            <li><a href="{{ route('message') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3"> {{ get_phrase('Message') }}</a></li>
                            <li><a href="{{ route('purchase.history') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3"> {{ get_phrase('Purchase History') }}</a></li>
                        @elseif (auth()->user() && auth()->user()->role == 'admin')
                            <li><a href="{{ route('admin.dashboard') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3"> {{ get_phrase('Admin Dashboard') }}</a></li>
                        @endif
                        <li>
                            <hr>
                        </li>
                    @endauth

                    <li><a href="{{ route('home') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3"> {{ get_phrase('Home') }}</a></li>
                    <li>
                        <button class="btn btn-toggle d-inline-flex align-items-center text-16px fw-500 w-100 collapsed rounded border-0 py-3" data-bs-toggle="collapse" data-bs-target="#category-collapse" aria-expanded="false">
                            {{ get_phrase('Courses') }}
                            <span class="icons float-end ms-auto"><i class="fa-solid fa-angle-down"></i></span>
                        </button>
                        <div class="collapse" id="category-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal small bg-white pb-1 pb-3 pt-0">
                                @php
                                    $parent_categories = DB::table('categories')->where('parent_id', 0)->latest('id')->get();
                                @endphp
                                @foreach ($parent_categories->take(30) as $parent_category)
                                    <li>
                                        <a class="w-100 px-3 py-2" href="{{ route('courses', $parent_category->slug) }}">{{ $parent_category->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    {{-- <li><a href="{{ route('bootcamps') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3">{{ get_phrase('Bootcamp') }}</a></li>
                    <li><a href="{{ route('team.packages') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3">{{ get_phrase('Team Training') }}</a></li> --}}
                </ul>
            </div>
            @guest
                <div class="btn-off">
                    <a href="{{ route('login') }}" class="eBtn btn gradient mb-3">{{ get_phrase('Sign In') }}</a>
                    <a href="{{ route('register') }}" class="eBtn btn gradient sign">{{ get_phrase('Sign Up') }}</a>
                </div>
            @endguest
        </div>
    </div>
</div>
