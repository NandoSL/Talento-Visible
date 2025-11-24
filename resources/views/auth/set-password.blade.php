@extends('layouts.' . get_frontend_settings('theme'))
@push('title', __('Set your new password'))
@push('meta')@endpush
@push('css')
@endpush
@section('content')
<section class="login-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="login-img text-center">
                    <img class="w-75 h-auto ms-auto me-auto" src="{{ asset('assets/frontend/pymais/images/favicon.svg') }}" alt="...">
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <form action="{{ route('set.password.sett', $id) }}" class="global-form login-form mt-25" method="POST">
                    @csrf
                    <h4 class="g-title">{{ __('Set your new password') }}</h4>
                    <p class="description">{{ __('Set a new password to log in') }}.</p>
                    <div class="form-group mb-5">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input type="password" name="password" class="form-control" placeholder="{{ __('Your Password') }}">
                        @error('password') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">{{ __('Confirm password') }}</label>
                        <input type="password" name="password_confirm" class="form-control" placeholder="{{ __('Your Password') }}">
                        @error('password_confirm') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="eBtn gradient w-100 mt-5">{{ __('Confirm') }}</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')@endpush
