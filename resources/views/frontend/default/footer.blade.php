<section class="tv-cta-banner text-center py-5">
    <div class="container">
        <h2 class="display-5 fw-bold text-white mb-3">
            Empoderando a las PyME para el futuro
        </h2>
        <p class="lead text-white-50 mb-4 fs-3">
            Impulsa a las PyME mexicanas a expandir sus horizontes, modernizar su modelo de negocio y adoptar nuevas tecnologías.
        </p>
        <a href="#" class="btn tv-cta-btn btn-lg">
            Contáctanos
        </a>
    </div>
</section>
<footer class="tv-footer-bg py-5">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-3 col-md-6 mb-4">
                <img src="{{ asset('assets/frontend/Tv/images/LogoOk.png') }}" alt="Talento Visible Logo" class="footer-logo mb-3" style="max-height: 40px; background: white;">
                <p class="text-white-50 small">
                {{ __('Impulsamos el talento de México con cursos, certificaciones digitales, programas especializados y formación dual.') }}
                </p>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="fw-bold text-white mb-3">Contáctanos</h5>
                <ul class="list-unstyled text-white-50 small">
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i> administracion@talentovisible.com.mx</li>
                    <li class="mb-2"><i class="fas fa-phone me-2"></i> +52 (55) 1700-5987</li>
                    <li class="mb-2"><i class="fas fa-globe me-2"></i> www.talentovisible.com.mx</li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4"> 
                <h5 class="fw-bold text-white mb-3">Enlaces de Interés</h5>
                <ul class="list-unstyled tv-footer-links">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Beneficios</a></li>
                    <li><a href="#">Programa</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="fw-bold text-white mb-3">Síguenos</h5>
                <div class="tv-social-icons">
                    <a href="{{ get_frontend_settings('facebook') }}" class="social-icon-btn me-2"><i class="fab fa-linkedin-in"></i></a>
                    <a href="{{ get_frontend_settings('linkedin') }}" class="social-icon-btn"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
        </div>
        
        <hr style="border-color: rgba(255, 255, 255, 0.1);">
        
        <div class="row small text-white-50">
            <div class="col-md-6">
                &copy; Talento Visible 2024 | Todos los Derechos Reservados.
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ route('terms.condition') }}" class="text-white-50 me-3">Términos y Condiciones</a>
              <a href="#" class="text-white-50">Política de Privacidad</a>
                <!-- <a href="{{ route('privacy.policy') }}" class="text-white-50">Política de Privacidad</a> -->
            </div>
        </div>
    </div>
</footer>