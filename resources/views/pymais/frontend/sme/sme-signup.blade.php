@extends('layouts.pymais')

@push('form-css')
<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/pymais/css/bootstrap.min.css')}}" />
   <!-- Font awesome 6 -->
   <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" />
   <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/pymais/forms/css/style.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/pymais/forms/css/responsive.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/pymais/forms/css/animation.css')}}">
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form class="show-section" id="steps" method="post" enctype="multipart/form-data" action="{{route('save.application')}}">
                @csrf
                <section id="section-1" class="steps step-1">
                    <div class="parent-wrap">
                        <div class="main-heading">
                            <span>Submit Opening Account Request</span>
                            <h1>PYMAIS</h1>
                        </div>
                        <div class="leftback step-1-inner">
                            <div class="child-wrap">
                                <h3 class="showfield">SELECT USER TYPE</h3>
                                <div class="showfield form-field">
                                    <select id="move" name="request">
                                        <option value="">-Select</option>
                                        <option value="sme">
                                            SME
                                        </option>
                                        {{-- <option value="participant">
                                            PARTICIPANT
                                        </option> --}}
                                    </select>
                                    <span></span>
                                </div>
                                {{-- <p class="showfield field-text">
                                    Please enter the details of your request. A member of our
                                    support staff will respond as soon as possible.
                                </p> --}}
                            </div>
                        </div>
                    </div>
                </section>
                <section id="section-2" class="steps step-2">
                    <div class="parent-wrap">
                        <div class="main-heading">
                            <span>Submit Request</span>
                            <h1>SME information</h1>
                        </div>
                        <div class="step-num">Step 2</div>
                        <div class="leftback step-2-inner" id="step2">
                            <div class="child-wrap">
                                <div class="showfield">
                                    <div class="single-field">
                                        <div class="single-field">
                                            <label class="label-heading">{{__('Main contact name')}}</label>
                                            <div class="form-field">
                                                <input type="text" id="contact_name" name="contact_name" placeholder="Enter the contact name" required />
                                                <span></span>
                                            </div>
                                        </div>

                                        <div class="single-field">
                                            <label class="label-heading">
                                                {{__('Position in company')}}
                                            </label>
                                            <div class="form-field">
                                                <input type="tel" id="position" name="position"
                                                    placeholder="Enter your position in company" required>
                                                <span></span>
                                            </div>
                                        </div>

                                        <div class="single-field">
                                            <label class="label-heading">
                                                {{__('Phone Number')}}
                                            </label>
                                            <div class="form-field">
                                                <input type="tel" id="phone" name="phone"
                                                    placeholder="Enter your phone number" required>
                                                <span></span>
                                            </div>
                                        </div>

                                        <div class="single-field">
                                            <label class="label-heading">
                                                {{__('Cellphone Number')}}
                                            </label>
                                            <div class="form-field">
                                                <input type="tel" id="phone" name="phone"
                                                    placeholder="Enter your phone number" required>
                                                <span></span>
                                            </div>
                                        </div>

                                        <div class="single-field">
                                            <label class="label-heading">Email</label>
                                            <div class="form-field">
                                                <input type="text" name="mail-email" id="mail-email" placeholder="Your Email"
                                                    required />
                                                <span></span>
                                            </div>
                                        </div>

                                        <div class="single-field">
                                            <label class="label-heading">
                                                Country
                                            </label>
                                            <div class="form-field">
                                                <input type="text" id="country" name="country"
                                                    placeholder="Enter your country" required>
                                                <span></span>
                                            </div>
                                        </div>

                                        <div class="single-field">
                                            <label class="label-heading">
                                                City
                                            </label>
                                            <div class="form-field">
                                                <input type="text" id="city" name="city"
                                                    placeholder="Enter your city " required>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>




                                    <!--<div class="single-field">
                                        <label class="label-heading">Who will sign the contract?</label>
                                        <div class="row">
                                            <div class="margin-sm tab-50 sm-100 col-md-4">
                                                <div class="row">
                                                    <div class="d-small col-md-3">
                                                        <div class="check-field">
                                                            <input class="mo" type="radio" name="contract" value="Me and Others" checked>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <label class="check-label">
                                                            <span class="head-text">Me and Others</span>
                                                            <span class="desc-text">if you sign the contract</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="margin-sm tab-50 sm-100 col-md-4">
                                                <div class="row">
                                                    <div class="d-small col-md-3">
                                                        <div class="check-field">
                                                            <input class="oo" type="radio" name="contract" value="Only Others">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <label class="check-label">
                                                            <span class="head-text">Only Others</span>
                                                            <span class="desc-text">if you sign the contract</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="margin-sm tab-50 sm-100 col-md-4">
                                                <div class="row">
                                                    <div class="d-small col-md-3">
                                                        <div class="check-field">
                                                            <input class="om" type="radio" name="contract" value="Only Me">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <label class="check-label">
                                                            <span class="head-text">Only Me</span>
                                                            <span class="desc-text">if you sign the contract</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                    {{-- <div class="single-field">
                                        <label class="label-heading">
                                            Location and fiscal domicile
                                        </label>
                                        <div class="form-field">
                                            <input type="email" id="othemail" name="oth-email"
                                                placeholder="Street number, city, ZIP code" required />
                                            <span></span>
                                        </div>
                                        <p class="field-text">
                                            This is the email address of the author you are
                                            collaborating with or giving the rights to use your
                                            item.
                                        </p>
                                    </div> --}}
                                    <div class="next-previous-btn">
                                        <button type="button" id="step2btn" class="next">
                                            Next Step
                                        </button>
                                        &nbsp;
                                        <button type="button" class="prev">
                                            Previous Step
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="section-3" class="steps step-3">
                    <div class="parent-wrap">
                        <div class="main-heading">
                            <span>Submit Request</span>
                            <h1>Professional Experience</h1>
                        </div>
                        <div class="step-num">Step 3</div>
                        <div class="leftback step-3-inner" id="step3">
                            <div class="child-wrap">
                                <div class="showfield">
                                    <div class="row">
                                        <div class="tab-50 sm-100 col-md-4">
                                            <div class="single-field">
                                                <label class="label-heading">Professional Title or Area of Specialization</label>
                                                <div class="form-field">
                                                    <input type="text" id="profesional_title" name="profesional_title" placeholder="Your Name"
                                                        required />
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-50 sm-100 col-md-4">
                                            <div class="single-field">
                                                <label class="label-heading">
                                                    Years of Experience in Your Area of Specialization
                                                </label>
                                                <div class="form-field">
                                                    <input type="number" id="years_expirence"
                                                        name="years_expirence"
                                                        placeholder="Enter your years of experience" required>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="tab-50 sm-100 col-md-4">
                                            <div class="single-field">
                                                <label class="label-heading">Have you previously been a mentor in
                                                    any programs?</label>
                                                <div class="form-field">
                                                    <select name="was_mentor" id="was_mentor"
                                                        required>
                                                        <option value="">Select an option</option>
                                                        <option value="career_guidance">Career Guidance</option>
                                                        <option value="technical_skills">Technical Skills</option>
                                                        <option value="soft_skills">Soft Skills</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-50 sm-100 col-md-8">
                                            <div class="single-field">
                                                <label class="label-heading">If the answer is "Yes," please detail
                                                    the programs you have participated in </label>
                                                <div class="form-field">
                                                    <input type="text" name="detail_programs"
                                                        placeholder="Enter your programs">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-field">
                                        <label class="label-heading">
                                            LinkedIn Handle
                                        </label>
                                        <div class="form-field">
                                            <input type="text" id="linkedin_handle" name="linkedin_handle"
                                                placeholder="Enter your LinkedIn handle">
                                        </div>
                                    </div>
                                    <div class="main-heading">
                                        <h1>Mentorship Areas</h1>
                                    </div>
                                    <div class="row">
                                        <div class="tab-50 sm-100 col-md-4">
                                            <div class="single-field">
                                                <label class="label-heading">
                                                    In which specific areas would you like to provide mentorship?
                                                </label>
                                                <div class="form-field">
                                                    <select name="area_mentorship"
                                                        id="area_mentorship" required>
                                                        <option value="">Select an option</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-50 sm-100 col-md-4">
                                            <div class="single-field">
                                                <label class="label-heading">
                                                    If you answered 'other' to the previous question, please specify
                                                    more about it in the field below.
                                                </label>
                                                <div class="form-field">
                                                    <input type="text" id="specify_other_area"
                                                        name="specify_other_area">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="single-field">
                                        <label class="label-heading">
                                            Pitch deck Attachments (optional)
                                        </label>
                                        <div class="upload-field">
                                            <label>
                                                <span><strong>Add File</strong> or Drop Files
                                                    Here</span>
                                                <input class="file" type="file" name="file" />
                                            </label>
                                        </div>
                                    </div> --}}
                                    <div class="next-previous-btn">
                                        <button type="button" class="prev">
                                            Previous Step
                                        </button>
                                        &nbsp;
                                        <button type="button" class="apply" id="sub">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            {{--  <form class="show-section" id="steps" method="post" enctype="multipart/form-data">
                <section id="section-1" class="steps step-1">
                    <div class="parent-wrap">
                        <div class="main-heading">
                            <h1>Applicant Information</h1>
                        </div>
                        <div class="step-num">Step 1</div>
                        <div class="leftback step-1-inner" id="step1">
                            <div class="child-wrap">
                                <div class="showfield">
                                    <div class="single-field">
                                        <label class="label-heading">Full Name</label>
                                        <div class="form-field">
                                            <input type="text" id="name" name="name"
                                                placeholder="Enter your full name" required>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="single-field">
                                        <label class="label-heading">Email</label>
                                        <div class="form-field">
                                            <input type="text" name="mail" id="mail-email"
                                                placeholder="Enter your email" required>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="single-field">
                                        <label class="label-heading">
                                            Contact Phone Number
                                        </label>
                                        <div class="form-field">
                                            <input type="tel" id="instructor-phone" name="instructor-phone"
                                                placeholder="Enter your contact phone number" required>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="single-field">
                                        <label class="label-heading">
                                            Country
                                        </label>
                                        <div class="form-field">
                                            <input type="text" id="instructor-country" name="instructor-country"
                                                placeholder="Enter your country" required>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="single-field">
                                        <label class="label-heading">
                                            City
                                        </label>
                                        <div class="form-field">
                                            <input type="text" id="instructor-city" name="instructor-city"
                                                placeholder="Enter your city " required>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="next-previous-btn">
                                        <button type="button" id="step1btn" class="next">Next Step</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="section-2" class="steps step-2">
                    <div class="parent-wrap">
                        <div class="main-heading">
                            <h1>Professional Experience </h1>
                        </div>
                        <div class="step-num">Step 2</div>
                        <div class="leftback step-2-inner" id="step2">
                            <div class="child-wrap">
                                <div class="showfield">
                                    <div class="row">
                                        <div class="tab-50 sm-100 col-md-4">
                                            <div class="single-field">
                                                <label class="label-heading">
                                                    Professional Title or Area of Specialization
                                                </label>
                                                <div class="form-field">
                                                    <input type="text" id="instructor-specialization"
                                                        name="instructor-specialization"
                                                        placeholder="Enter your area of specialization" required>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-50 sm-100 col-md-4">
                                            <div class="single-field">
                                                <label class="label-heading">
                                                    Years of Experience in Your Area of Specialization
                                                </label>
                                                <div class="form-field">
                                                    <input type="number" id="instructor-years-exp"
                                                        name="instructor-years-exp"
                                                        placeholder="Enter your years of experience" required>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="tab-50 sm-100 col-md-4">
                                            <div class="single-field">
                                                <label class="label-heading">Have you previously been a mentor in
                                                    any programs?</label>
                                                <div class="form-field">
                                                    <select name="instructor-mentor" id="instructor-mentor"
                                                        required>
                                                        <option value="">Select an option</option>
                                                        <option value="career_guidance">Career Guidance</option>
                                                        <option value="technical_skills">Technical Skills</option>
                                                        <option value="soft_skills">Soft Skills</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-50 sm-100 col-md-8">
                                            <div class="single-field">
                                                <label class="label-heading">If the answer is "Yes," please detail
                                                    the programs you have participated in </label>
                                                <div class="form-field">
                                                    <input type="text" name="instructor-programs"
                                                        placeholder="Enter your programs">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-field">
                                        <label class="label-heading">
                                            LinkedIn Handle
                                        </label>
                                        <div class="form-field">
                                            <input type="text" id="instructor-linkedin" name="instructor-linkedin"
                                                placeholder="Enter your LinkedIn handle">
                                        </div>
                                    </div>
                                    <div class="next-previous-btn">
                                        <button type="button" id="step2btn" class="next">Next Step</button>
                                        &nbsp;
                                        <button type="button" class="prev">Previous Step</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="section-3" class="steps step-3">
                    <div class="parent-wrap">
                        <div class="main-heading">
                            <h1>Mentorship Areas</h1>
                        </div>
                        <div class="step-num">Step 3</div>
                        <div class="leftback step-3-inner" id="step3">
                            <div class="child-wrap">
                                <div class="showfield">
                                    <div class="row">
                                        <div class="tab-50 sm-100 col-md-4">
                                            <div class="single-field">
                                                <label class="label-heading">
                                                    In which specific areas would you like to provide mentorship?
                                                </label>
                                                <div class="form-field">
                                                    <select name="instructor-mentor-area"
                                                        id="instructor-mentor-area" required>
                                                        <option value="">Select an option</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-50 sm-100 col-md-4">
                                            <div class="single-field">
                                                <label class="label-heading">
                                                    If you answered 'other' to the previous question, please specify
                                                    more about it in the field below.
                                                </label>
                                                <div class="form-field">
                                                    <input type="text" id="instructor-specify"
                                                        name="instructor-specify">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="next-previous-btn">
                                        <button type="button" id="step3btn" class="next">Next Step</button>
                                        &nbsp;
                                        <button type="button" class="prev">Previous Step</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="section-4" class="steps step-4">
                    <div class="parent-wrap">
                        <div class="main-heading">
                            <h1>Availability</h1>
                        </div>
                        <div class="step-num">Step 4</div>
                        <div class="leftback step-4-inner" id="step4">
                            <div class="child-wrap">
                                <div class="showfield">
                                    <div class="row">
                                        <div class="tab-50 sm-100 col-md-4">
                                            <div class="single-field">
                                                <label class="label-heading">
                                                    How many hours per week would you be available to provide
                                                    mentorship?
                                                </label>
                                                <div class="form-field">
                                                    <select name="instructor-hours-week" id="instructor-hours-week"
                                                        required>
                                                        <option value="">Select an option</option>
                                                        <option value="1_to_5">1 to 5 hours</option>
                                                        <option value="6_to_10">6 to 10 hours</option>
                                                        <option value="10_more">More than 10 hours</option>
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-50 sm-100 col-md-4">
                                            <div class="single-field">
                                                <label class="label-heading">
                                                    Are you available to participate in sessions in-person,
                                                    virtually, or both? (In-person might imply traveling)
                                                </label>
                                                <div class="form-field">
                                                    <select name="instructor-participate-session"
                                                        id="instructor-participate-session" required>
                                                        <option value="">Select an option</option>
                                                        <option value="in_person">In-person</option>
                                                        <option value="virtual">Virtual</option>
                                                        <option value="both">Both</option>
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="next-previous-btn">
                                        <button type="button" class="prev">Previous Step</button>
                                        &nbsp;
                                        <button type="button" class="apply" id="sub">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>  --}}

        </div>
    </div>
</div>

<div id="error"></div>
@endsection

@push('form-js')

<!-- bootstrap JS -->
	<script src="{{asset('assets/frontend/pymais/forms/js/bootstrap.min.js')}}"></script>
   <!-- Jquery -->
   {{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  --}}

   <!-- custom JS -->
   <script src="{{asset('assets/frontend/pymais/forms/js/custom.js')}}"></script>
@endpush
