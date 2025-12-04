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
                </div>
            </div>
        </div>
    </section>
    <!------------ My profile area end  ------------>
@endsection
@push('js')

@endpush
