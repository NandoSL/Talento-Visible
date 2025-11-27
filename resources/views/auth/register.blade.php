
@extends('layouts' . '.' . get_frontend_settings('theme'))
@push('title', __('Sign Up'))
@push('meta')@endpush
@push('css')
    <style>
        .form-icons .right {
            right: 20px;
            cursor: pointer !important;
        }
    </style>
@endpush
@section('content')
    @if (get_frontend_settings('theme') == 'default')
        <!------------------- Register Area Start  ------>
        <section class="login-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="login-img ">
                            <img src="{{ asset('assets/frontend/Tv/images/LogoOk.png') }}"   alt="..." style="width:70%; height:70%; float: center">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <form action="{{ route('register') }}" class="global-form login-form mt-25" method="POST">
                            @csrf
                            <h4 class="g-title">{{ __('Sign Up') }}</h4>
                            <p class="description">{{ __('See your growth and get consulting support') }}!</p>
                            <div class="form-group">
                                <label for="" class="form-label">{{ __('Username') }}</label>
                                <input type="text" id="username" name="username" class="form-control mb-4 @error('username') border border-danger @enderror" placeholder="{{ __('Username') }}">
                                @error('username') <p class="text-danger ms-5 mb-3">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" id="email" name="email" class="form-control mb-4 @error('email') border border-danger @enderror" placeholder="{{ __('Email') }}">
                                @error('email') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <!-- <label for="" class="form-label">{{ __('Password') }}</label>
                                <input type="password" class="form-control pymais-input-background rounded-4 @error('password_user') border border-danger @enderror"
                                            id="password" aria-label="Password" name="password_user" value="{{ old('password_user') }}">
                                <div class="input-group-append position-absolute mt-3" style="z-index: 99">
                                    <button id="showPassword" class="btn btn-outline-secondary w-25 rounded-circle d-flex justify-content-center" type="button">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror -->
                                <label class="form-label">{{ __('Password') }}</label>
                                <div class="input-group justify-content-end">
                                    <input type="password" class="form-control mb-4 @error('password') border border-danger @enderror" 
                                        id="password" name="password" value="{{ old('password') }}" placeholder="{{ __('Password') }}">
                                    <div class="input-group-append position-absolute mt-3" style="z-index: 99">
                                        <button id="showPassword" class="btn btn-outline-secondary w-25 rounded-circle d-flex justify-content-center" type="button">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('password') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __('Confirm password') }}</label>
                                <div class="input-group justify-content-end">
                                    <input type="password" class="form-control mb-4 @error('confirm_password') border border-danger @enderror"
                                        id="confirmPassword" name="confirm_password" value="{{ old('confirm_password') }}" placeholder="{{ __('Confirm password') }}">
                                    <div class="input-group-append position-absolute mt-3" style="z-index: 99">
                                        <button id="showConfirmPassword" class="btn btn-outline-secondary w-25 rounded-circle d-flex justify-content-center" type="button">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('confirm_password') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check mb-5">
                                    <input class="form-check-input" type="checkbox" value="true" id="checkedInstructor" name="checkedInstructor">
                                    <label class="form-check-label pt-2" for="checkedInstructor">{{ __('Apply to become an instructor') }}</label>
                                </div>
                            </div>

                            <button type="submit" class="eBtn gradient w-100">{{ __('Sign Up') }}</button>
                            <p class="mt-20">{{ __('Already have account') }}?
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!------------------- Register Area End  ------>
    @endif
@endsection
@push('js')
    <script>
        function togglePasswordBtn(btnId, inputId) {
            $(btnId).on('click', function(e) {
                e.preventDefault();
                const passwordInput = $(inputId);
                const type = passwordInput.attr('type');

                if (type == 'password') {
                    passwordInput.attr('type', 'text');
                    $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordInput.attr('type', 'password');
                    $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        }

        togglePasswordBtn('#showPassword', '#password');
        togglePasswordBtn('#showConfirmPassword', '#confirmPassword');

        togglePasswordBtn('#showPassword2', '#password2');
        togglePasswordBtn('#showConfirmPassword2', '#confirmPassword2');
    </script>
@endpush
