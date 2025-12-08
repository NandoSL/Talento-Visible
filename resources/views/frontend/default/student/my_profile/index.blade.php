@extends('layouts.default')
@push('title', __('My profile'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
    @php
        $sidebar = session('sidebar', false);
    @endphp
    <!------------ My profile area start  ------------>
    <section class="course-content">
        {{-- <div class="profile-banner-area"></div> --}}
        {{-- <div class="container profile-banner-area-container"> --}}
        <div class="profile-banner-area-container">
            <div class="row">
                @include('frontend.default.student.left_sidebar')
                <div class="{{ $sidebar ? 'content-3' : 'content-2' }} bg-r" id="profile-contenedor">
                    <div class="container header-content-student">
                        <h1>
                            <span class="g-title mb-2 mt-20 ml-20">{{ __('My Profile') }} | </span>
                            {{ get_settings('system_title') }}
                        </h1>
                        <h3 class="mt-20 ml-20">Gestiona tu información personal y preferencias</h3>
                    </div>
                    <div class="my-panel message-panel edit_profile container" style="padding: 10rem; margin-bottom: 10rem;">
                        <form action="{{ route('update.profile', $user_details->id) }}" method="POST">@csrf
                            <div class="row">
                                <div class="col-lg-12 mb-20">
                                    <div class="form-group">
                                        <label for="name" class="form-label">{{ __('Full Name') }}</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $user_details->name }}" id="name">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <div class="form-group">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $user_details->email }}" id="email">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">{{ __('Phone Number') }}</label>
                                        <input type="tel" class="form-control" name="phone"
                                            value="{{ $user_details->phone }}" id="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <div class="form-group">
                                        <label for="website" class="form-label">{{ __('Website') }}</label>
                                        <input type="text" class="form-control" name="website"
                                            value="{{ $user_details->website }}" id="website">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <div class="form-group">
                                        <label for="facebook" class="form-label">{{ __('Facebook') }}</label>
                                        <input type="text" class="form-control" name="facebook"
                                            value="{{ $user_details->facebook }}" id="facebook">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <div class="form-group">
                                        <label for="twitter" class="form-label">{{ __('Twitter') }}</label>
                                        <input type="text" class="form-control" name="twitter"
                                            value="{{ $user_details->twitter }}" id="twitter">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <div class="form-group">
                                        <label for="linkedin" class="form-label">{{ __('Linkedin') }}</label>
                                        <input type="text" class="form-control" name="linkedin"
                                            value="{{ $user_details->linkedin }}" id="linkedin">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="form-group">
                                        <label for="skills" class="form-label">{{ __('Skills') }}</label>
                                        <input type="text" class="form-control tagify" name="skills"
                                            data-role="tagsinput" value="{{ $user_details->skills }}" id="skills">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="form-group">
                                        <label for="biography" class="form-label">{{ __('Biography') }}</label>
                                        <textarea name="biography" class="form-control" id="biography" cols="30" rows="5">{{ $user_details->biography }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="eBtn btn gradient mt-10 d-flex">{{ __('Save Changes') }}</button>
                        </form>
                    </div>
                    <div class="my-panel message-panel edit_profile container"
                        style="padding: 10rem; margin-bottom: 10rem;">
                        <h3 class="ml-10">Gestiona tu contraseña</h3><br><br>

                        <form action="{{ route('update.password') }}" method="post"> @csrf
                            <div class="fpb7 mb-2">
                                <label class="form-label ol-form-label">{{ get_phrase('Current password') }}</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control ol-form-control" name="current_password"
                                        required id="password" />
                                    <button class="btn btn-outline-secondary" type="button" id="btn-password"
                                        style="cursor: pointer" onclick="handleType('password')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="fpb7 mb-2">
                                <label class="form-label ol-form-label">{{ get_phrase('New password') }}</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control ol-form-control" name="new_password"
                                        required id="new-password"/>
                                    <button class="btn btn-outline-secondary" type="button" id="btn-new-password"
                                        style="cursor: pointer" onclick="handleType('new-password')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="fpb7 mb-2">
                                <label class="form-label ol-form-label">{{ get_phrase('Confirm password') }}</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control ol-form-control"
                                        name="confirm_password" id="confirm-password"/>
                                    <button class="btn btn-outline-secondary" type="button" id="btn-confirm-password"
                                        style="cursor: pointer" onclick="handleType('confirm-password')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                    </button>
                                </div>
                            </div><br>
                            <div class="fpb7 mt-10">
                                <button type="submit"
                                    class="eBtn btn gradient mt-10 d-flex">{{ get_phrase('Update password') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------ My profile area end  ------------>
@endsection
@push('js')
    <script>
        function handleType(id) {
            const input = document.getElementById(id)
            const btn = document.getElementById('btn-' + id)
            input.type == 'password' ? input.type = 'text' : input.type = 'password';
            input.type != 'password' ? btn.classList.add("active") : btn.classList.remove("active");
        }
    </script>

@endpush
