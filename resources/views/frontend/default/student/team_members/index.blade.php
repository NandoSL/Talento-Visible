@extends('layouts.default')
@push('title', __('My profile'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
<!------------ Team members area start  ------------>
@if(Auth::user()->role != 'student' )
<script>
window.location = "/my-courses";
</script>
@endif
<section class="course-content">
    <div class="profile-banner-area"></div>
    <div class="container profile-banner-area-container">
        <div class="row">
            @include('frontend.default.student.left_sidebar')
            <div class="col-lg-9">
                <h4 class="g-title mb-5">{{ __('Team Members') }}</h4>
                <div class="my-panel message-panel">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="pt-4">
                                <h3 class="text-black">{{ __('Enter the details of the other participants from the company. Register up to 4 people') }}.</h3>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <div class=" d-flex justify-content-end mb-5 mt-0">
                                <button class="eBtn btn gradient mt-10 w-15 h-75"
                                    onclick="window.location='{{ route('team.members.create') }}'" @if(count($members)>
                                    3 )
                                    disabled @endif>
                                    {{ __('Add participant') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- <div class=" d-flex justify-content-end mb-5 mt-0">
                        <button class="eBtn btn gradient mt-10 w-15 h-75"
                            onclick="window.location='{{ route('team.members.create') }}'" @if(count($members)>
                            3 )
                            disabled @endif>
                            {{ __('Add participant') }}
                        </button>
                    </div> --}}
                   
                    @if (count($members) > 0)
                    <div class="table-responsive course_list px-4">
                        <table class="table eTable eTable-2 print-table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Last name') }}</th>
                                    <th scope="col">{{ __('Position') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Options') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($members as $m)
                                <tr>
                                    <td>{{ $m->id }}</td>
                                    <td>{{ $m->name }}</td>
                                    <td>{{ $m->last_name }}</td>
                                    <td>{{ $m->position }}</td>
                                    <td>{{ $m->email }}</td>
                                    <td class="col mx-2">
                                        <div class="d-flex justify-content-between gap-2">
                                            <button type="button" class="btn ol-btn-light ol-icon-btn"
                                                onclick="window.location='{{ route('team.members.edit', $m->id) }}'">
                                                <i class="fa-regular fa-pen-to-square "></i>
                                            </button>
                                            <button type="button" class="btn ol-btn-light ol-icon-btn"
                                                onclick="confirmModal('{{ route('team.members.delete', $m->id) }}')">
                                                <i class="fi-rr-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    @include('frontend.default.empty')
                    @endif
                </div>
                {{-- METHOD POST --}}
                <div class="p-4 mb-5" id="participantFormContainer"
                    style="{{ $errors->any() ? 'display: block;' : 'display: none;' }}">
                    <form action="{{ route('team.members') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ __('Participants name') }}</label>
                                <input type="text" value="{{ old('name') }}"
                                    class="form-control pymais-input-background @error('name') border border-danger @enderror"
                                    aria-label="Participant Name" name="name">
                                @error('name') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-md-6">
                                <label>{{ __('Participant\'s last name(s)') }}</label>
                                <input type="text" value="{{ old('last_name') }}"
                                    class="form-control pymais-input-background @error('last_name') border border-danger @enderror"
                                    aria-label="Participant Name" name="last_name">
                                @error('last_name') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-md-6">
                                <label>{{ __('Position') }}</label>
                                <input type="text" value="{{ old('position') }}"
                                    class="form-control pymais-input-background @error('position') border border-danger @enderror"
                                    aria-label="Position" name="position">
                                @error('position') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-md-6">
                                <label>{{ __('Email') }}</label>
                                <input type="email" value="{{ old('email') }}"
                                    class="form-control pymais-input-background @error('email') border border-danger @enderror"
                                    aria-label="Email" name="email">
                                @error('email') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ __('Phone') }}</label>
                                <input type="text" value="{{ old('phone') }}"
                                    class="form-control pymais-input-background @error('phone') border border-danger @enderror"
                                    aria-label="Phone" name="phone">
                                @error('phone') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-md-6">
                                <label>{{ __('LinkedIn profile') }}</label>
                                <input type="text" value="{{ old('linkedin') }}"
                                    class="form-control pymais-input-background @error('linkedin') border border-danger @enderror"
                                    aria-label="LinkedIn profile" name="linkedin">
                                @error('linkedin') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="row mt-5 d-flex justify-content-center">
                            <button type="submit" id="participantFormSubmit" class="btn btn-primary w-75 p-3">
                                <h3>{{ __('Add Participant') }}</h3>
                            </button>
                        </div>
                    </form>
                </div>
                {{-- METHOD PUT --}}
                {{-- <div class="p-4 mb-5" id="participantFormContainer" style="{{ $errors->any() ? 'display: block;' : 'display: none;' }}">
                <form action="{{ route('team.members.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ __('Participants name') }}</label>
                            <input type="text" value="{{ old('name') }}"
                                class="form-control pymais-input-background @error('name') border border-danger @enderror"
                                aria-label="Participant Name" name="name">
                            @error('name') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('Participant\'s last name(s)') }}</label>
                            <input type="text" value="{{ old('last_name') }}"
                                class="form-control pymais-input-background @error('last_name') border border-danger @enderror"
                                aria-label="Participant Name" name="last_name">
                            @error('last_name') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-6">
                            <label>{{ __('Position') }}</label>
                            <input type="text" value="{{ old('position') }}"
                                class="form-control pymais-input-background @error('position') border border-danger @enderror"
                                aria-label="Position" name="position">
                            @error('position') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('Email') }}</label>
                            <input type="email" value="{{ old('email') }}"
                                class="form-control pymais-input-background @error('email') border border-danger @enderror"
                                aria-label="Email" name="email">
                            @error('email') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ __('Phone') }}</label>
                            <input type="text" value="{{ old('phone') }}"
                                class="form-control pymais-input-background @error('phone') border border-danger @enderror"
                                aria-label="Phone" name="phone">
                            @error('phone') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('LinkedIn profile') }}</label>
                            <input type="text" value="{{ old('linkedin') }}"
                                class="form-control pymais-input-background @error('linkedin') border border-danger @enderror"
                                aria-label="LinkedIn profile" name="linkedin">
                            @error('linkedin') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="row mt-5 d-flex justify-content-center">
                        <button type="submit" id="participantFormSubmit" class="btn btn-primary w-75 p-3">
                            <h3>{{ __('Add Participant') }}</h3>
                        </button>
                    </div>
                </form>
            </div> --}}
        </div>
    </div>
    </div>
    </div>
</section>
<!------------ Team members area end  ------------>
@endsection
@push('js')
@endpush