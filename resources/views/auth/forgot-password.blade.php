@extends('layouts' . '.' . get_frontend_settings('theme'))
@push('title', __('Forgot Password'))
@push('meta')@endpush
@push('css')
@endpush
@section('content')
    <!------------------- Login Area Start  ------>
    <section class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="login-img ">
                        <img src="{{ asset('assets/frontend/pymais/images/favicon.svg') }}"   alt="..." style="width:70%; height:70%; float: center">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <form action="{{ route('password.email') }}" class="global-form login-form mt-25" method="POST">
                        @csrf
                        <h4 class="g-title">{{ __('Forgot Password') }}</h4>
                        <p class="description">{{ __('Submit your account email address') }}.</p>
                        <div class="form-group">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="{{ __('Enter Your Email') }}">
                        </div>
                        <button type="submit" class="eBtn gradient w-100 mt-5">{{ __('Send Request') }}</button>
                        <a href="{{route('login')}}" class="eBtn gradient w-100 mt-5 text-center">{{ __('Back to login page') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!------------------- Login Area End  ------>
@endsection
@push('js')

@endpush
