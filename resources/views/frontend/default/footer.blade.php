  <!-----------  Footer Area Start   ------------->
  <footer class="footer-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 col-md-4">
                  <div class="footer-content">
                      <img src="{{ asset('assets/frontend/pymais/images/logo.svg') }}" alt="logo">
                      <p class="description">
                          {{ __('Modernize, engage and promote: A proven acceleration program to strengthen & professionalize industry supply chain.') }}
                      </p>
                      <ul class="f-socials d-flex">
                          <li><a href="{{ get_frontend_settings('facebook') }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                          <li><a href="{{ get_frontend_settings('linkedin') }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-8 col-md-8">
                  <div class="row">
                      <div class="col-lg-6 col-md-6">
                          <div class="footer-widget">
                              <h4>{{ __('Useful Links') }}</h4>
                              <ul>
                                <li><a href="{{route('register')}}">{{__('Become a participant')}}</a></li>
                                <li><a href="#">{{__('All courses')}}</a></li>
                                <li><a href="{{route('register')}}">{{__('Sign Up')}}</a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="footer-widget">
                              <h4>{{ __('Help') }}</h4>
                              <ul>
                                  <li><a href="#">{{ __('Contact Us') }}</a></li>
                                  <li><a href="#">{{ __('About Us') }}</a></li>
                                  <li><a href="#">{{ __('FAQ') }}</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-bottom">
          <div class="container">
              <div class="row">
                  <div class="col-lg-8">
                      <ul class="footer-policy">
                          <li><a href="#">{{ __('About Us') }}</a></li>
                          <li><a href="#">{{ __('Privacy Policy') }}</a></li>
                          <li><a href="#">{{ __('Terms And Use') }}</a></li>
                      </ul>
                  </div>
                  <div class="col-lg-4">
                      <div class="copyright-text">
                          <p>© PYMAIS @php echo date('Y')@endphp All Rights Reserved</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!-----------  Footer Area End   ------------->
