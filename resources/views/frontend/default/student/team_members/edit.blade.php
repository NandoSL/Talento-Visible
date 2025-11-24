@extends('layouts.default')
@push('title', __('My profile'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
    <!------------ Team members create area start  ------------>
    @if(Auth::user()->role != 'student' )        
        <script>window.location = "/my-courses";</script>
    @endif
    <section class="course-content">
        <div class="profile-banner-area"></div>
        <div class="container profile-banner-area-container">
            <div class="row">
                @include('frontend.default.student.left_sidebar')
                <div class="col-lg-9">
                    <h4 class="g-title mb-5">{{ __('Team Members') }}</h4>
                    <div class="my-panel message-panel">
                        <div class="d-flex justify-content-end">
                            <button class="px-1 bg-transparent border border-1 rounded-4">
                                <a href="{{ route('team.members') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px ms-auto">
                                    <span class="fi-rr-arrow-left fs-"></span>
                                    <span class="pt-1 ms-3 fs-4">{{ get_phrase('Back') }}</span>
                                </a>
                            </button>
                        </div>
                        <div class="p-4 mb-5">
                            {{-- METHOD POST --}}
                            <form action="{{ route('team.members.update', $member->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>{{ __('Participants name') }}</label>
                                        <input type="text" value="{{ old('name', $member->name) }}" class="form-control pymais-input-background @error('name') border border-danger @enderror" aria-label="Participant Name" name="name">
                                        @error('name') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{ __('Participant\'s last name(s)') }}</label>
                                        <input type="text" value="{{ old('last_name', $member->last_name) }}" class="form-control pymais-input-background @error('last_name') border border-danger @enderror" aria-label="Participant Name" name="last_name">
                                        @error('last_name') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-md-6">
                                        <label>{{ __('Position') }}</label>
                                        <input type="text" value="{{ old('position', $member->position) }}" class="form-control pymais-input-background @error('position') border border-danger @enderror" aria-label="Position" name="position">
                                        @error('position') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{ __('Email') }}</label>
                                        <input type="email" value="{{ old('email', $member->email) }}" class="form-control pymais-input-background @error('email') border border-danger @enderror" aria-label="Email" name="email">
                                        @error('email') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>{{ __('Phone') }}</label>
                                        <input type="text" value="{{ old('phone', $member->phone) }}" class="form-control pymais-input-background @error('phone') border border-danger @enderror" aria-label="Phone" name="phone">
                                        @error('phone') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{ __('LinkedIn profile') }}</label>
                                        <input type="text" value="{{ old('linkedin', $member->linkedin) }}" class="form-control pymais-input-background @error('linkedin') border border-danger @enderror" aria-label="LinkedIn profile" name="linkedin">
                                        @error('linkedin') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="row mt-5 d-flex justify-content-center">
                                    <button type="submit" id="participantFormSubmit" class="btn btn-primary w-75 p-3"><h3>{{ __('Save Changes') }}</h3></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------ Team members create area end  ------------>
@endsection
@push('js')
@endpush