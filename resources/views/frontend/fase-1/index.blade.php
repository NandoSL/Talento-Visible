@extends('layouts.fase-1')

@section('content')

<!-- Start Hero Area -->
<section class="ep-hero section-gap section-bg-1 hero-background hero-bg-opacity">
    <div class="overlay"></div> 
    <div class="container ep-container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-xl-6 col-12">
                <div class="ep-hero__content ep-content-opacity">
                    <h3 class="ep-section-head__big-title ep-split-text left"> Welcome to PYMAIS PLATFORM</h3>
                    <p class="ep-section-head__text"> An innovative training program to accelerate the growth of manufacturing industry supply chain businesses, to strengthen and professionalize them based on real demands of each region.</p>
                    <a class="apply-now-btn">
                        <span>Apply now</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Start Hero Area -->
<!-- Start About Area -->
<section class="ep-about section-gap ep-section position-relative">
    <div class="ep-about__shape updown-ani">
        <img src="./assets/images/about/about-1/circle-shape.svg" alt="circle-shape" />
    </div>
    <div class="container ep-container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-12">
                <div class="ep-section__content text-center">
                    <div class="ep-section-head">
                        <h3 class="ep-section-head__big-title ep-split-text">Value Offer</h3>
                        <p class="ep-section-head__text">Strengthen Supply Chain Integration through six key areas:</p>
                        <div class="ep-section__widget ep-section__widget--style2">
                            <div class="ep-feature-buttons row">
                                <!-- First Row: Offset 0 -->
                                <div class="col-6 offset-0">
                                    <button class="ep-btn feature-btn">Innovation</button>
                                </div>
                                <div class="col-6 offset-0">
                                    <button class="ep-btn feature-btn">Scalability and growth</button>
                                </div>
                            
                                <!-- Second Row: Offset 1 -->
                                <div class="col-6 offset-2">
                                    <button class="ep-btn feature-btn">Digital transformation</button>
                                </div>
                                <div class="col-6 offset-2">
                                    <button class="ep-btn feature-btn">Modernization and improvement of operations</button>
                                </div>
                            
                                <!-- Third Row: Offset 3 -->
                                <div class="col-6 offset-1">
                                    <button class="ep-btn feature-btn">Financial preparedness</button>
                                </div>
                                <div class="col-6 offset-1">
                                    <button class="ep-btn feature-btn">Make SMEs visible within value chains</button>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <div class="ep-section__btn">
                        <a href="about.html" class="ep-btn border-btn">Why this program?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Start About Area -->
<!-- Start Event Area -->
<section class="ep-features ep-section position-relative">
    <div class="container ep-container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <h3 class="ep-section-head__big-title ep-split-text">Perfiles</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="ep-feature-box">
                    <h4 class="ep-feature-box__title">SME's</h4>
                    <p class="ep-feature-box__description">SME's</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="ep-feature-box">
                    <h4 class="ep-feature-box__title">Mentor</h4>
                    <p class="ep-feature-box__description">Mentor</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="ep-feature-box">
                    <h4 class="ep-feature-box__title">Corporate</h4>
                    <p class="ep-feature-box__description">Description for feature 3.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Event Area -->
<!-- Start Course Area -->
<section class="ep-video-section section-gap ep-section position-relative">
    <div class="container ep-container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <h3 class="ep-section-head__big-title ep-split-text">How PYMAIS works</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                <div class="ep-video-wrapper">
                    <video id="promoPlayer" playsinline controls>
                        <source src="{{ asset('path/to/your/video.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Course Area -->
<!-- Start Event Area -->
<section>
</section>
<!-- End Event Area -->
<!-- Start Category Area -->
<section class="ep-category section-gap ep-section">
    <div class="container ep-container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-4 col-md-8 col-12">
                <div class="ep-section-head text-center">
                    
                    <h3 class="ep-section-head__big-title ep-split-text left"> <span>1.</span>Business Enhancer
                    </h3>
                    <p class="ep-section-head__text"> Helping SMEs accelerate AI and tech adoption along with other crucial business functions.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Card -->
            <div class="ep-event__widget">
                <h3 class="ep-event__widget-title">1.1 Primer Program
                </h3>
                <p class="ep-event__widget-text"> Through asynchronous online sessions, participating companies will become aware of US - Mexico business opportunities and will be equipped with six 1-hour topics.
                </p>
                <br />
                
                <br />
                <ul class="ep-event__widget-list">
                    <li>
                        <i class="fi-ss-check-circle"></i> US - Mexico Business Opportunities Overview
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i> Industry Trends + Digital Transformation
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>Generative AI
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>Cybersecurity and Data Protection
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>Sustainability
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>Open Innovation
                    </li>
                </ul>
                <h3 class="ep-event__widget-title">1.2 Accelerating Program
                </h3>
                <p class="ep-event__widget-text"> After the Primer program participants will accelerate their business model by receiving 5 modules of online asynchronous sessions plus optional online synchronic mentoring activities to improve their value proposition.
                </p>
                <p class="ep-event__widget-text"> Program's key modules:
                </p>
                <br />
                <ul class="ep-event__widget-list">
                    <li>
                        <i class="fi-ss-check-circle"></i>Innovation
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>Scalability and Growth
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>Digital Transformation
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>Key operations
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>Financial readiness
                    </li>
                </ul>
                <br />
                <p class="ep-event__widget-text"> During each of the modules deployment AI tools will be included as part of the programming, learning and activities.
                </p>
            </div>
            
        </div>
    </div>
</section>
<!-- End  Category Area -->
<section class="ep-category section-gap pt-0">
    <div class="container ep-container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="ep-section-head text-center">
                    
                    <h3 class="ep-section-head__big-title ep-split-text left"> <span>2.</span> Market Access & Specialization

                    </h3>
                    <p class="ep-section-head__text"> Promoting SMEs' value propositions to potential binational industry customers through speed dating and demo day's sessions furthermore participating companies will have the opportunity to take specialization content according to their development needs<br />
                    (To access this stage SME's must pay a 350 USD annual membership, 4 sessions live mentoring, platform exposure, continuous learning, up to 5 participants per SME).
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Card -->
            <div class="ep-event__widget">
                <h3 class="ep-event__widget-title">2.1 On-going Visibility
                </h3>
                <p class="ep-event__widget-text"> Participating companies that complete Primer and Accelerating programs will have the chance to be continuously exposed through online and in-person events, such as:
                </p>
                <br />
                <ul class="ep-event__widget-list">
                    <li>
                        <i class="fi-ss-check-circle"></i><strong>Continuous exposure on the platform: </strong>Tailored to their line of business, participants will have a constant presence on our platform, increasing their reach.
                    </li>
                </ul>
                <div class="ep-course__comment">
                    <div class="ep-course__comment-content">
                        <i class="fi-ss-check-circle"></i>
                        <div class="ep-course__comment-top">
                            <h6 class="title">Business sessions.</h6>
                        </div>
                        <span class="subtitle"><strong>Virtual Demo Days: </strong>Participants will present 1-minute pitch videos, highlighting their value propositions.</span>
                        <span class="subtitle"><strong>Speed dating meeting/interviews (online and in-person): </strong>These sessions will allow participants to engage in business conversations at different levels:</span>
                        <ul>
                            <li>
                                Local
                            </li>
                            <li>
                                Regional
                            </li>
                            <li>
                                National
                            </li>
                            <li>
                                Binational
                            </li>
                        </ul>
                    </div>
                </div>
                <h3 class="ep-event__widget-title">2.2 Specialization Opportunities
                </h3>
                <p class="ep-event__widget-text"> During the program participating companies will be able to take specialization and certification content according to their industry vertical of interest e.g.
                </p>
                <br />
                <ul class="ep-event__widget-list">
                    <li>
                        <i class="fi-ss-check-circle"></i>Automotive
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>Bio-medical
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>Electronics
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>IT
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>Aerospace-aeronautical
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>Advanced Technologies
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>Cybersecurity
                    </li>
                    <li>
                        <i class="fi-ss-check-circle"></i>AI
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</section>
<!-- Start Course Area -->
<section class="ep-blog section-gap pt-0 position-relative">
    <div class="container ep-container">
        <div class="row">
            <div class="col-12">
                <div class="ep-section-head ep-section-head--style2">
                    <h2 class="ep-section-head__big-title ep-split-text left">Courses</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Blog Card -->
            <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                <div class="ep-blog__card ep-blog__card--style2 wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                    <a href="blog-details.html" class="ep-blog__img">
                        <img src="./assets/images/blog/blog-1/4.png" alt="blog-img" />
                    </a>
                    <div class="ep-blog__info">
                        <div class="ep-blog__content">
                            <a href="blog-details.html" class="ep-blog__title">
                                <h5 class="m-0"> Qué es la IA generativa </h5>
                            </a>
                            <div class="ep-blog__btn">
                                <a href="blog-details.html">Signup now</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Blog Card -->
            <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                <div class="ep-blog__card ep-blog__card--style2 wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                    <a href="blog-details.html" class="ep-blog__img">
                        <img src="./assets/images/blog/blog-1/5.png" alt="blog-img" />
                    </a>
                    <div class="ep-blog__info">
                        <div class="ep-blog__content">
                            <a href="blog-details.html" class="ep-blog__title">
                                <h5 class="m-0"> Prompt Engineering: Aprende a hablar con una inteligencia artificial generativa </h5>
                            </a>
                            <div class="ep-blog__btn">
                                <a href="blog-details.html">Signup now</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Blog Card -->
            <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                <div class="ep-blog__card ep-blog__card--style2 wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                    <a href="blog-details.html" class="ep-blog__img">
                        <img src="./assets/images/blog/blog-1/6.png" alt="blog-img" />
                    </a>
                    <div class="ep-blog__info">
                        <div class="ep-blog__content">
                            <a href="blog-details.html" class="ep-blog__title">
                                <h5 class="m-0"> Agiliza tu trabajo con el chat de Microsoft Copilot </h5>
                            </a>
                            <div class="ep-blog__btn">
                                <a href="blog-details.html">Signup now</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                <!-- End Event Area -->

@endsection
