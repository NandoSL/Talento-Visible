@extends('layouts.fase-1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form class="show-section" id="steps" method="post" enctype="multipart/form-data">

                <section id="section-1" class="steps step-1">
                    <div class="parent-wrap">
                        <div class="main-heading">
                            <h1>Applicant Information</h1>
                        </div>
                        <div class="step-num">Step 1</div>
                        <div class="leftback step-1-inner" id="step1">
                            <div class="showfield">
                                <div class="single-field">
                                    <label class="label-heading">Company Name</label>
                                    <div class="form-field">
                                        <input type="text" id="applicant-company" name="applicant-company"
                                            placeholder="Enter your company name" required>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="single-field">
                                    <label class="label-heading">RFC</label>
                                    <div class="form-field">
                                        <input type="text" name="applicant-company-rfc" id="applicant-company-rfc"
                                            placeholder="Enter your company RFC" required>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="single-field">
                                    <label class="label-heading">
                                        Sector/Business line
                                    </label>
                                    <div class="form-field">
                                        <select name="applicant-sector" id="applicant-sector" required>
                                            <option value="">Select an option</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="single-field">
                                    <label class="label-heading">
                                        Locations
                                    </label>
                                    <div class="form-field">
                                        <input type="text" id="applicant-locations" name="applicant-locations"
                                            required>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="next-previous-btn">
                                    <button type="button" id="step1btn" class="next">Next Step</button>
                                    &nbsp;
                                    <button type="button" class="prev">Previous Step</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="section-2" class="steps step-2">
                    <div class="parent-wrap">
                        <div class="main-heading">
                            <h1>Company Information</h1>
                        </div>
                        <div class="step-num">Step 2</div>
                        <div class="leftback step-2-inner" id="step2">
                            <div class="showfield">
                                <div class="row">
                                    <div class="tab-50 sm-100 col-md-4">
                                        <div class="single-field">
                                            <label class="label-heading">
                                                Company name or legal entity name
                                            </label>
                                            <div class="form-field">
                                                <input type="text" id="applicant-company-name"
                                                    name="applicant-company-name"
                                                    placeholder="Enter your company name" required>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-50 sm-100 col-md-4">
                                        <div class="single-field">
                                            <label class="label-heading">Industry sector of the company</label>
                                            <div class="form-field">
                                                <input type="number" id="applicant-company-sector"
                                                    name="applicant-company-sector"
                                                    placeholder="Enter industry sector of the company" required>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tab-50 sm-100 col-md-4">
                                        <div class="single-field">
                                            <label class="label-heading">What is the company's unique selling point
                                                or
                                                value
                                                proposition?</label>
                                            <div class="form-field">
                                                <input type="text" id="applicant-company-selling-point"
                                                    name="applicant-company-selling-point" required>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-50 sm-100 col-md-8">
                                        <div class="single-field">
                                            <label class="label-heading">Company size</label>
                                            <div class="form-field">
                                                <input type="number" id="applicant-company-size"
                                                    name="applicant-company-size"
                                                    placeholder="Enter your company size">
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tab-50 sm-100 col-md-4">
                                        <div class="single-field">
                                            <label class="label-heading">Average monthly revenue</label>
                                            <div class="form-field">
                                                <select name="applicant-revenue" id="applicant-revenue" required>
                                                    <option value="">Select an option</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-50 sm-100 col-md-8">
                                        <div class="single-field">
                                            <label class="label-heading">What is the estimated value of your
                                                company?</label>
                                            <div class="form-field">
                                                <input type="text" id="applicant-company-value"
                                                    name="applicant-company-value"
                                                    placeholder="Enter your programs">
                                                <span></span>
                                            </div>
                                        </div>
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
                </section>
                <section id="section-3" class="steps step-3">
                    <div class="parent-wrap">
                        <div class="main-heading">
                            <h1>Contact Method</h1>
                        </div>
                        <div class="step-num">Step 3</div>
                        <div class="leftback step-3-inner" id="step3">
                            <div class="showfield">
                                <div class="single-field">
                                    <label class="label-heading">
                                        How would you like to be contacted?
                                    </label>
                                    <div class="form-field">
                                        <select name="applicant-contact-method" id="applicant-contact-method"
                                            required>
                                            <option value="">Select an option</option>
                                            <option value="phone">Phone Call</option>
                                            <option value="correo">Email</option>
                                            <option value="whatsapp">Whatsapp</option>
                                        </select>
                                        <span></span>
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
                </section>
                <section id="section-4" class="steps step-4">
                    <div class="parent-wrap">
                        <div class="main-heading">
                            <h1>Discount code</h1>
                        </div>
                        <div class="step-num">Step 4</div>
                        <div class="leftback step-4-inner" id="step4">
                            <div class="showfield">
                                <div class="single-field">
                                    <label class="label-heading">
                                        If you have a discount code enter it in the field below (if applicable)
                                    </label>
                                    <div class="form-field">
                                        <input type="text" id="applicant-discount-code"
                                            name="applicant-discount-code" placeholder="Enter your discount code">
                                        <span></span>
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
                </section>
            </form>

        </div>
    </div>
</div>


@endsection
