@extends('layouts.' . get_frontend_settings('theme'))
@push('title', __('Sign Up'))
@push('meta')@endpush
@push('css')
    <style>
        body {
            background-color: #f2f2f2 !important;
        }

        .pymais-accordion-card {
            border: 1px solid #e0e0e0 !important;
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 8px !important;
            background-color: white;
            transition: background-color 0.3s ease;
        }

        .pymais-accordion-header {
            cursor: pointer;
            padding: 10px 0;
            display: flex;
            align-items: center;
        }

        .pymais-accordion-title {
            font-size: 1.25rem;
            cursor: pointer;
            padding: 10px 0;
            margin: 0;
        }

        .pymais-accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out;
        }

        .pymais-accordion-content p {
            margin: 0;
            padding: 0px 10px !important;
        }

        .pymais-accordion-card.active .pymais-accordion-content {
            max-height: none;
            overflow: visible;
            transition: max-height 0.5s ease-in;
        }

        /* Efecto de hover para la tarjeta */
        .pymais-accordion-card:hover {
            color: black;
            background-color: #2848e6;
        }

        /* Efecto de hover para los iconos dentro de la tarjeta */
        .pymais-accordion-card:hover .icon-class {
            background-color: #ddd;
            transition: background-color 0.3s ease;
        }

        .icon-container {
            background-color: #2848e6; /* Fondo azul */
            display: flex;
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
            padding: 20px; /* Espaciado adicional alrededor de la imagen */
            border-radius: 50%; /* Hacer el contenedor circular */
            width: 80px; /* Ajusta el ancho del contenedor */
            height: 80px; /* Ajusta la altura del contenedor */
            margin: 0 auto; /* Centra el contenedor en su contenedor padre */
        }

        .icon-container img {
            max-width: 100%; /* Ajusta la imagen para que sea más pequeña que el contenedor */
            height: auto;
            display: block; /* Evita el espacio en línea que puede causar que la imagen se desplace a un lado */
        }
        
        .active{
            background-color: #2848e6 !important;
        }
    </style>
@endpush
@section('content')
    <section class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    
                    <!-- Opciones del formulario -->
                    <div class="global-form login-form mt-25" >
                        <div class="row d-flex text-center">
                            <h1 class="g-title" style="color:#2849E6; margin-bottom: 60px">{{ __('Registration form') }}</h1>
                        </div>
                    </div>        
                    <section class="ep-category section-gap pt-0">
                        <div class="container ep-container">                            
                            <div class="row accordion accordion-flush" id="accordionExample">

                                <!-- Single Card with Accordion -->
                                <div class="col-lg-3 col-xl-3 col-md-3 col-12">
                                    <button type="button" id="form-student-btn" class="w-100 btn btn-outline-primary pymais-accordion-card active" onclick="showForm('form-student')">
                                        <div class="text-center pymais-accordion-title">
                                            <div class="icon-container">
                                                <img src="{{ asset('assets/frontend/Tv/images/category/category-1/1.svg') }}" alt="category-icon" />
                                            </div>
                                            <h3 class="pymais-accordion-title mt-3 fs-2">{{ __('SMEs') }}</h3>
                                        </div>
                                    </button>
                                </div>
                                <!-- Single Card as Button -->
                                <div class="col-lg-3 col-xl-3 col-md-3 col-12">
                                    <button type="button" id="form-instructor-btn" class="w-100 btn btn-outline-primary pymais-accordion-card" style="border: 2px solid blue;" onclick="showForm('form-instructor')">
                                        <div class="text-center pymais-accordion-title">
                                            <div class="icon-container">
                                                <img src="{{ asset('assets/frontend/Tv/images/category/category-1/2.svg') }}" alt="category-icon" />
                                            </div>
                                            <h3 class="pymais-accordion-title mt-3 fs-2">{{ __('Consultant and mentors') }}</h3>
                                        </div>
                                    </button>
                                </div>

                                <!-- Single Card as Button -->
                                <div class="col-lg-3 col-xl-3 col-md-3 col-12">
                                <button type="butto" id="form-industry-btn" class="w-100 btn btn-outline-primary pymais-accordion-card" style="border: 2px solid blue;" onclick="showForm('form-industry')">
                                        <div class="text-center pymais-accordion-title">
                                            <div class="icon-container">
                                                <img src="{{ asset('assets/frontend/Tv/images/category/category-1/3.svg') }}" alt="category-icon" />
                                            </div>
                                            <h3 class="pymais-accordion-title mt-3 fs-2">{{ __('Industry and corporate') }}</h3>
                                        </div>
                                    </button>
                                </div>

                                <!-- Single Card as Button -->
                                <div class="col-lg-3 col-xl-3 col-md-3 col-12">
                                <button type="butto" id="form-partnet-btn" class="w-100 btn btn-outline-primary pymais-accordion-card" style="border: 2px solid blue;" onclick="showForm('form-partnet')">
                                        <div class="text-center pymais-accordion-title">
                                            <div class="icon-container">
                                                <img src="{{ asset('assets/frontend/Tv/images/category/category-1/7.svg') }}" alt="category-icon" />
                                            </div>
                                            <h3 class="pymais-accordion-title mt-3 fs-2">{{ __('Allies and partners') }}</h3>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>           

                    <!-- Inicia formulario Student-->                                        
                    <form id="form-student" action="{{ route('save.application') }}" class="global-form login-form mt-25" method="post" style="display: block;">
                        @csrf                            
                        <h2 style="margin-top: 120px; margin-bottom: 30px">{{ __('Please fill in the following information to continue with the registration') }}.</h2>
                        
                        
                        <h3 class="g-title" style="color:#2849E6; margin-bottom: 20px">{{ __('Main Contact') }}</h3>
                        <p class="description">{{ __('This person will manage the company\'s profile') }}.</p>

                        {{--  Main Contact  --}}
                        <div class="pymais-padding-section">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" class="form-control pymais-input-background"
                                           aria-label="Name" name="name" autofocus value="{{ old('name') }}">
                                           @error('name') <div class="bg-info">{{ __('The contact name is required') }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('Last name') }}(s)</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="Last name"
                                           name="last_name" value="{{ old('last_name') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('Phone') }}</label>
                                    <input type="text" class="form-control pymais-input-background @error('phone') border border-danger @enderror"
                                        aria-label="Phone" name="phone" value="{{ old('phone') }}">
                                        @error('phone') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('Position') }}</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="Position"
                                        name="position" value="{{ old('position') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('Job area (e.g. Sales)') }}</label>
                                    <input type="text" class="form-control pymais-input-background"
                                        aria-label="Area of the post" name="job_area" value="{{ old('job_area') }}">
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('LinkedIn profile') }}</label>
                                    <input type="text" class="form-control pymais-input-background"
                                        aria-label="LinkedIn profile" name="linkedin" value="{{ old('linkedin') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('User email') }}</label>
                                    <input type="email" class="form-control pymais-input-background @error('email') border border-danger @enderror" aria-label="Email"
                                           name="email" value="{{ old('email') }}">
                                           @error('email') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('Password') }}</label>
                                    <div class="input-group justify-content-end">
                                        <input type="password" class="form-control pymais-input-background rounded-4 @error('password_user') border border-danger @enderror"
                                            id="password" aria-label="Password" name="password_user" value="{{ old('password_user') }}">
                                        <div class="input-group-append position-absolute mt-3" style="z-index: 99">
                                            <button id="showPassword" class="btn btn-outline-secondary w-25 rounded-circle d-flex justify-content-center" type="button">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('password_user') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <label>{{ __('Confirm password') }}</label>
                                    <div class="input-group justify-content-end">
                                        <input type="password" class="form-control pymais-input-background rounded-4 @error('confirm_password_user') border border-danger @enderror"
                                            id="confirmPassword" aria-label="Confirm Password" name="confirm_password_user" value="{{ old('confirm_password_user') }}">
                                        <div class="input-group-append position-absolute mt-3" style="z-index: 99">
                                            <button id="showConfirmPassword" class="btn btn-outline-secondary w-25 rounded-circle d-flex justify-content-center" type="button">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('confirm_password_user') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
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


                        <h3 class="g-title" style="color:#2849E6; margin-bottom: 60px; margin-top: 60px">
                            {{ __('Company Information') }}</h3>
                        {{--  Company details  --}}
                        <div class="pymais-padding-section">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>{{ __('Trade Name') }}</label>
                                    <input type="text" class="form-control pymais-input-background"
                                        aria-label="Trade Name" name="trade_name" value="{{ old('trade_name') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('RFC') }}</label>
                                    <input type="text" class="form-control pymais-input-background"
                                        aria-label="RFC" name="rfc" value="{{ old('rfc') }}">
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('Legal Name') }}</label>
                                    <input type="text" class="form-control pymais-input-background"
                                        aria-label="Legal Name" name="legal_name" value="{{ old('legal_name') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('Contact phone') }}</label>
                                    <input type="text" aria-label="Contact phone" name="company_contact_phone" class="form-control pymais-input-background @error('company_contact_phone') border border-danger @enderror" value="{{ old('company_contact_phone') }}">
                                    @error('company_contact_phone') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('Contact email') }}</label>
                                    <input type="email" class="form-control pymais-input-background"
                                           aria-label="Contact email" name="company_contact_mail" value="{{ old('company_contact_mail') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('NAICS Code') }}</label> <a href="https://www.naics.com/search/" style="color:blue" target="_blank">{{ __('Search') }}</a>
                                    <select class="form-control pymais-select-background @error('naics_code') border border-danger @enderror" name="naics_code">
                                        <optgroup>
                                            <option value="">{{ __('Select an option') }}</option>
                                            @foreach ($naics_code as $codes)
                                                <option value="{{ $codes->id }}" {{ old('naics_code') == $codes->id ? 'selected' : '' }}>
                                                    {{ $codes->code }} - {{ $codes->name }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('naics_code') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-3">
                                    <label>{{ __('Number of employees') }} </label>
                                    <input type="text" class="form-control pymais-input-background"
                                        aria-label="Number of employees" name="number_employees" value="{{ old('number_employees') }}">
                                </div>
                                <div class="col-md-3">
                                    <label>{{ __('Seniority in the company') }} </label>
                                    <input type="text" class="form-control pymais-input-background"
                                        aria-label="Seniority in the company" name="seniority" value="{{ old('seniority') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('Sector to which it belongs') }}</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="Sector to which it belongs"
                                           name="sector" value="{{ old('sector') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <label>{{ __('Products and/or Services they offer') }}</label>
                                    <textarea type="text" class="form-control pymais-input-background" 
                                        aria-label="Products and/or Services they offer" name="products_services">{{ old('products_services') }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="mt-5 mb-3">{{ __('Address') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('Street') }}</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="Street"
                                           name="street" value="{{ old('street') }}">
                                </div>
                                <div class="col-md-3">
                                    <label>{{ __('Number') }}</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="Number"
                                           name="number" value="{{ old('number') }}">
                                </div>
                                <div class="col-md-3">
                                    <label>{{ __('Postal code') }}</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="Postal code"
                                           name="postal_code" value="{{ old('postal_code') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('Neighborhood') }}</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="Neighborhood"
                                           name="neighborhood" value="{{ old('neighborhood') }}">
                                </div>
                                <div class="col-md-3">
                                    <label>{{ __('City') }}</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="City"
                                           name="city" value="{{ old('city') }}">
                                </div>
                                <div class="col-md-3">
                                    <label>{{ __('State') }}</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="State"
                                           name="state" value="{{ old('state') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex align-items-center p-3">
                                    <input type="checkbox" id="toggleInputs" class="m-3" name="incorporated_united_states" value="{{ old('incorporated_united_states') }}"
                                        style="width: 20px; height: 20px; cursor: pointer; position: relative; margin-top; 20px">
                                    <label for="toggleInputs" class="mt-2 ms-2">{{ __('Are you incorporated in the United States?') }}</label>
                                </div>
                                <div id="additionalInputs" style="display: none;" class="row">
                                    <div class="col-md-6">
                                    <label>{{ __('Company Name') }}</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="Company Name"
                                           name="company_name" value="{{ old('company_name') }}">
                                    </div>
                                    <div class="col-md-6">
                                    <label>{{ __('Business Line') }}</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="Business Line"
                                           name="business_line" value="{{ old('business_line') }}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <h3 class="g-title" style="color:#2849E6; margin-bottom: 20px; margin-top: 60px">
                            {{ __('Digital Presence') }}</h3>
                        {{--  Social media  --}}
                        <p class="description">{{ __('In which digital platforms can your company be found?') }}.</p>

                        <div class="pymais-padding-section mb-5">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Company LinkedIn') }}</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="Company LinkedIn"
                                        name="company_linkedin" value="{{ old('company_linkedin') }}">
                                    <div class="d-flex align-items-center p-1">
                                        <label class="me-3">{{ __('Does your company not yet have a presence on LinkedIn?') }}</label>
                                        <a href="https://www.linkedin.com/learning/growing-your-business-with-linkedin-pages-22873022" target="_blank" style="color:#2849E6;">{{ __('Learn how') }}.</a>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Website') }}</label>
                                    <input type="text" class="form-control pymais-input-background"
                                        aria-label="Website" name="website" value="{{ old('website') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Social Networking') }}</label>
                                    <input type="text" class="form-control pymais-input-background"
                                        aria-label="Social Networking" name="social_networking" value="{{ old('social_networking') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 p-3">
                                    <button type="button" class="w-100 btn btn-outline-primary btn-lg" style="border: 2px solid blue;">
                                        <h4>{{ __('Add networks') }}</h4>
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="p-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <button type="button" id="addParticipant" class="w-100 btn btn-outline-primary btn-lg" style="border: 2px solid blue;">
                                        <h4>{{ __('Add participant') }}</h4>
                                    </button>
                                </div>
                            </div>
                        </div> --}}

                        <div class="pymais-padding-section" id="participantForm" style="display: none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('Participants name') }}</label>
                                    <input type="text" value="{{ old('participant_name') }}"
                                        class="form-control pymais-input-background @error('participant_name') border border-danger @enderror"
                                        aria-label="Participant Name" name="participant_name">
                                    @error('participant_name') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('Participant\'s last name(s)') }}</label>
                                    <input type="text" value="{{ old('participant_last_name') }}"
                                        class="form-control pymais-input-background @error('participant_last_name') border border-danger @enderror"
                                        aria-label="Participant Name" name="participant_last_name">
                                    @error('participant_last_name') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-md-6">
                                    <label>{{ __('Position') }}</label>
                                    <input type="text" value="{{ old('participant_position') }}"
                                        class="form-control pymais-input-background @error('participant_position') border border-danger @enderror"
                                        aria-label="Position" name="participant_position">
                                    @error('participant_position') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" value="{{ old('participant_email') }}"
                                        class="form-control pymais-input-background @error('participant_email') border border-danger @enderror"
                                        aria-label="Email" name="participant_email">
                                    @error('participant_email') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('Phone') }}</label>
                                    <input type="text" value="{{ old('participant_phone') }}"
                                        class="form-control pymais-input-background @error('participant_phone') border border-danger @enderror"
                                        aria-label="Phone" name="participant_phone">
                                    @error('participant_phone') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('LinkedIn profile') }}</label>
                                    <input type="text" value="{{ old('participant_linkedin') }}"
                                        class="form-control pymais-input-background @error('participant_linkedin') border border-danger @enderror"
                                        aria-label="LinkedIn profile" name="participant_linkedin">
                                    @error('participant_linkedin') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                            </div>
                                {{-- <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <button type="button" class="w-100 btn btn-primary btn-lg" id="submitParticipant">
                                            <h4>{{ __('Add participant') }}</h4>
                                        </button>
                                    </div>
                                </div> --}}
                        </div>

                        <div class="pymais-padding-section" id="participantForm" style="{{ $participants ? 'display: block;' : 'display: none;' }}">
                            @if(!empty($participants))
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
                                            @foreach($participants as $index => $participant)
                                            <tr>
                                                <td>{{ $participant['name'] }}</td>
                                                <td>{{ $participant['last_name'] }}</td>
                                                <td>{{ $participant['position'] }}</td>
                                                <td>{{ $participant['email'] }}</td>
                                                <td>{{ $participant['name'] }}</td>
                                                <td class="col mx-2">
                                                    <div class="d-flex justify-content-between gap-2">
                                                        <button type="button" class="btn ol-btn-light ol-icon-btn"
                                                            onclick="removeParticipant({{ $index }})">
                                                            <i class="fi-rr-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                            
                        <div class="d-flex align-items-center p-5" style="margin-top: 60px;">
                            <input type="checkbox" id="toggleInputs" class="m-3 @error('accept_terms_and_conditions') border border-danger @enderror" name="accept_terms_and_conditions" 
                                style="width: 20px; height: 20px; cursor: pointer; position: relative; margin-top; 20px">
                            <label for="toggleInputs" class="mt-2 ms-2">{{ __('I accept') }}
                            <a href="{{ asset(app()->getLocale() == 'es' ? 'pdfs/Terminos_y_Condiciones.pdf' : 'pdfs/Terminos_y_Condiciones.pdf') }}"
                                class="text-info" target="_blank">
                                {{ __('terms and conditions') }}
                            </a>
                        </div>
                        @error('accept_terms_and_conditions') <p class="text-danger ms-2 mb-3">{{ __('Confirm terms and conditions') }}</p> @enderror
                        

                        <div class="row mt-5">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 d-grid gap-2">
                                <button type="submit" class="pymais-button-gradient btn-lg">
                                    {{ __('Submit') }}
                                </button>
                                <p class="mt-20">{{ __('Already have account') }}.
                                    <a href="{{ route('login') }}">{{ __('Sign In') }}</a>
                                </p>
                            </div>
                        </div>
                    </form>
                    {{-- Formulario oculto pero se muestran los campos debajo del botón 'Add Participant' --}}
                    <form id="participantActionForm" action="{{ route('add.remove.participant.application') }}" method="post" style="display: none;">
                        @csrf
                        <input type="hidden" name="participant_name" id="hiddenParticipantName">
                        <input type="hidden" name="participant_last_name" id="hiddenParticipantLastName">
                        <input type="hidden" name="participant_position" id="hiddenParticipantPosition">
                        <input type="hidden" name="participant_email" id="hiddenParticipantEmail">
                        <input type="hidden" name="participant_phone" id="hiddenParticipantPhone">
                        <input type="hidden" name="participant_linkedin" id="hiddenParticipantLinkedIn">
                    </form>

                    

                    <!-- Inicia formulario Intructor-->
                    <form id="form-instructor" action="{{ route('save.application.instructor') }}" class="global-form login-form mt-25" method="post" style="display: none;">
                        @csrf                        
                        <h2 style="margin-top: 120px; margin-bottom: 30px">{{ __('Please fill in the following information to continue with the registration') }}.</h2>
                        
                        
                        <h3 class="g-title" style="color:#2849E6; margin-bottom: 20px">{{ __('Instructor Contact') }}</h3>
                        <p class="description">{{ __('This person will manage the profile') }}.</p>

                        {{--  Main Contact  --}}
                        <div class="pymais-padding-section">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" class="form-control pymais-input-background"
                                           aria-label="Name" name="name" autofocus value="{{ old('name') }}">
                                           @error('name') <div class="bg-info">{{ __('The contact name is required') }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('Last name') }}(s)</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="Last name"
                                           name="last_name" value="{{ old('last_name') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('Phone') }}</label>
                                    <input type="text" class="form-control pymais-input-background @error('phone') border border-danger @enderror"
                                        aria-label="Phone" name="phone" value="{{ old('phone') }}">
                                        @error('phone') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('Position') }}</label>
                                    <input type="text" class="form-control pymais-input-background" aria-label="Position"
                                        name="position" value="{{ old('position') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('Job area (e.g. Sales)') }}</label>
                                    <input type="text" class="form-control pymais-input-background"
                                        aria-label="Area of the post" name="job_area" value="{{ old('job_area') }}">
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('LinkedIn profile') }}</label>
                                    <input type="text" class="form-control pymais-input-background"
                                        aria-label="LinkedIn profile" name="linkedin" value="{{ old('linkedin') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ __('User email') }}</label>
                                    <input type="email" class="form-control pymais-input-background @error('email') border border-danger @enderror" aria-label="Email"
                                           name="email" value="{{ old('email') }}" >
                                           @error('email') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('Password') }}</label>
                                    <div class="input-group justify-content-end">
                                        <input type="password" class="form-control pymais-input-background rounded-4 @error('password_instructor') border border-danger @enderror"
                                            id="password2" aria-label="Password" name="password_instructor" value="{{ old('password_instructor') }}" >
                                        <div class="input-group-append position-absolute mt-3" style="z-index: 99">
                                            <button id="showPassword2" class="btn btn-outline-secondary w-25 rounded-circle d-flex justify-content-center" type="button">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('password_instructor') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <label>{{ __('Confirm password') }}</label>
                                    <div class="input-group justify-content-end">
                                        <input type="password" class="form-control pymais-input-background rounded-4 @error('confirm_password_instructor') border border-danger @enderror"
                                            id="confirmPassword2" aria-label="Confirm Password" name="confirm_password_instructor" value="{{ old('confirm_password_instructor') }}" >
                                        <div class="input-group-append position-absolute mt-3" style="z-index: 99">
                                            <button id="showConfirmPassword2" class="btn btn-outline-secondary w-25 rounded-circle d-flex justify-content-center" type="button">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('confirm_password_instructor') <p class="text-danger ms-2 mb-3">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="d-flex align-items-center" style="margin-top: 60px;">
                                <input type="checkbox" id="toggleInputs" class="m-3 @error('accept_terms_and_conditions') border border-danger @enderror" name="accept_terms_and_conditions" 
                                    style="width: 20px; height: 20px; cursor: pointer; position: relative; margin-top; 20px" required>
                                <label for="toggleInputs" class="mt-2 ms-2">{{ __('I accept') }}
                                <a href="{{ asset(app()->getLocale() == 'es' ? 'pdfs/Terminos_y_Condiciones.pdf' : 'pdfs/Terminos_y_Condiciones.pdf') }}"
                                    class="text-info" target="_blank">
                                    {{ __('terms and conditions') }}
                                </a>
                            </div>
                            @error('accept_terms_and_conditions') <p class="text-danger ms-2 mb-3">{{ __('Confirm terms and conditions') }}</p> @enderror
                        </div>                        

                        <div class="row mt-5">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 d-grid gap-2">
                                <button type="submit" class="pymais-button-gradient btn-lg">
                                    {{ __('Submit') }}
                                </button>
                                <p class="mt-20">{{ __('Already have account') }}.
                                    <a href="{{ route('login') }}">{{ __('Sign In') }}</a>
                                </p>
                            </div>
                        </div>

                    </form>

                    <form id="form-industry" class="global-form login-form mt-25" method="post" style="display: none;">
                        @csrf                        
                    </form>

                    <form id="form-partnet" class="global-form login-form mt-25" method="post" style="display: none;">
                        @csrf                        
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        "use strict";

        $(document).ready(function() {
            $('#toggleInputs').change(function() {
                $('#additionalInputs').toggle(this.checked);
            });

            $('#addParticipant').click(function() {
                $('#participantForm').toggle();
            });

            document.getElementById('submitParticipant').addEventListener('click', function() {
                var participantName = document.querySelector('input[name="participant_name"]').value;
                var participantLastName = document.querySelector('input[name="participant_last_name"]').value;
                var participantPosition = document.querySelector('input[name="participant_position"]').value;
                var participantEmail = document.querySelector('input[name="participant_email"]').value;
                var participantPhone = document.querySelector('input[name="participant_phone"]').value;
                var participantLinkedIn = document.querySelector('input[name="participant_linkedin"]').value;

                document.getElementById('hiddenParticipantName').value = participantName;
                document.getElementById('hiddenParticipantLastName').value = participantLastName;
                document.getElementById('hiddenParticipantPosition').value = participantPosition;
                document.getElementById('hiddenParticipantEmail').value = participantEmail;
                document.getElementById('hiddenParticipantPhone').value = participantPhone;
                document.getElementById('hiddenParticipantLinkedIn').value = participantLinkedIn;

                document.getElementById('participantActionForm').submit();
            });

            function removeParticipant(index) {
                fetch('{{ route('add.remove.participant.application') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ remove_index: index })
                })
                .then(response => {
                    if (response.ok) {
                        location.reload();
                    } else {
                        alert('Failed to remove participant.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
            
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
        });
    </script>        
@endpush

@push('js')
    <script>
        function showForm(formId) {        
            document.getElementById('form-student').style.display = 'none';
            document.getElementById('form-instructor').style.display = 'none';        
            document.getElementById('form-industry').style.display = 'none';        
            document.getElementById('form-partnet').style.display = 'none';        
            
            document.getElementById(formId).style.display = 'block';        
            
            document.getElementById('form-student-btn').classList.remove('active');
            document.getElementById('form-instructor-btn').classList.remove('active');
            document.getElementById('form-industry-btn').classList.remove('active');
            document.getElementById('form-partnet-btn').classList.remove('active');
            document.getElementById(formId + '-btn').classList.add('active');
            }
    </script>
@endpush
