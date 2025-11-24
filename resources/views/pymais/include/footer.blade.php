<footer class="ep-footer ep-footer--style2 position-relative">
    <div class="ep-footer__overlay"></div>
    <div class="container ep-container">
        <div class="ep-footer__top">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="ep-footer__widget footer-about">
                        <div class="ep-footer__logo ep-footer__logo--style2">
                            <a href="#">
                                <img src="{{asset('assets/frontend/pymais/images/logo-2.svg')}}" alt="footer-logo" />
                            </a>
                        </div>
                        <p class="ep-footer__text mg-top-46"> {{__('Modernize, engage and promote: A proven acceleration program to strengthen & professionalize industry supply chain.')}}
                        </p>
                        <div class="ep-footer__social mg-top-42">
                            <h5 class="ep-footer__social-title">{{__('Follow Us')}}</h5>
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/pymais" target="_blank" >
                                        <i class="icofont-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/company/pymais" target="_blank" >
                                        <i class="icofont-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="ep-footer__widget footer-services--style2">
                        <h4 class="ep-footer__widget-title ep-footer__widget-title--style2"> {{__('Useful Links')}} </h4>
                        <ul class="ep-footer__links-list ep-footer__links-list--style2">
                            <li>
                                <a href="{{route('register')}}">
                                    <i class="fi fi-br-angle-double-small-right ep10-color"></i>{{__('Become a participant')}} </a>
                            </li>
                            <li>
                                <a href="/login">
                                    <i class="fi fi-br-angle-double-small-right ep10-color"></i>{{__('Sign In')}} </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="ep-footer__widget footer-services--style2">
                        <h4 class="ep-footer__widget-title ep-footer__widget-title--style2"> {{__('Help')}} </h4>
                        <ul class="ep-footer__links-list ep-footer__links-list--style2">
                            <li>
                                <a href="#">
                                    <i class="fi fi-br-angle-double-small-right ep10-color"></i>{{__('Contact Us')}} </a>
                            </li>
                            <!-- <li>
                                <a href="#">
                                    <i class="fi fi-br-angle-double-small-right ep10-color"></i>{{__('About Us')}} </a>
                            </li> -->
                            <li>
                                <a href="#">
                                    <i class="fi fi-br-angle-double-small-right ep10-color"></i>{{__('FAQ')}} </a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{--  <div class="col-lg-3 col-md-6 col-12">
                    <div class="ep-footer__widget footer-newsletter">
                        <h4 class="ep-footer__widget-title ep-footer__widget-title--style2"> Newsletter </h4>
                        <p class="ep-footer__text m-0"> Subscribe to our newletter and stay up with the latest news. </p>
                        <form action="{{ route('newsletter.store') }}" method="post" class="ep-footer__newsletter ep-footer__newsletter--style2 mg-top-30">
                            @csrf
                            <input type="email" name="email" placeholder="Your e-mail" required />
                            <button type="submit">
                                <i class="fi fi-ss-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>  --}}
            </div>
        </div>
        <div class="ep-footer__bottom">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="ep-footer__copyright">
                        <p> © PYMAIS @php echo date('Y'); @endphp | {{__('All Rights Reserved')}} </p>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="ep-footer__bottom-link">
                        <ul>
                            <li>
                                <a href="#"> {{__('Terms & Conditions')}} </a>
                            </li>
                            <li>
                                <a href="#">{{__('Privacy Policy')}}</a>
                            </li>
                            <li>
                                <a href="#">{{__('Contact Us')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ep-footer__brand">
        {{--  <img src="{{asset('assets/frontend/pymais/images/logo-2.svg')}}" alt="footer-brand-name" />  --}}
    </div>
</footer>
