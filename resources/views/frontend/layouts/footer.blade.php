<footer>
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="mb-4 col-lg-4 col-md-6 mb-lg-0">
                    <div class="footer-about">
                        <h3 class="footer-title">{{ config('settings.name') }}</h3>
                        <p class="doctor-credentials">{{ config('settings.degree') }}</p>
                        <p class="about-text">
                            {!! config('settings.short_about') !!}
                        </p>
                        <div class="footer-contact-info">
                            @if (config('settings.mobile'))
                                <div class="mb-2 d-flex align-items-center">
                                    <i class="fas fa-phone-alt me-2 text-warning"></i>
                                    <a href="tel:{{ config('settings.mobile') }}"
                                        class="text-white text-decoration-none">{{ config('settings.mobile') }}</a>
                                </div>
                            @endif
                            @if (config('settings.email'))
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-envelope me-2 text-warning"></i>
                                    <a href="mailto:{{ config('settings.email') }}"
                                        class="text-white text-decoration-none">{{ config('settings.email') }}</a>
                                </div>
                            @endif
                            @if (config('settings.address'))
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-map-marker me-2 text-warning"></i>
                                    <a href="javascript:void(0)"
                                        class="text-white text-decoration-none">{{ config('settings.address') }}</a>
                                </div>
                            @endif
                        </div>
                        <div class="gap-3 footer-social d-flex">
                            @if (config('settings.facebook'))
                                <a href="{!! config('settings.facebook') !!}" class="social-icon fb" title="Facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            @endif
                            @if (config('settings.linkedin'))
                                <a href="{!! config('settings.linkedin') !!}" class="social-icon ln" title="LinkedIn">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mb-4 col-lg-2 col-md-6 mb-lg-0">
                    <h4 class="footer-subtitle">Services</h4>
                    <ul class="footer-links list-unstyled">
                        @foreach ($services as $data)
                            <li><a href="javascript:void(0)">{{ ucwords($data->title) }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-4 col-lg-2 col-md-6 mb-lg-0">
                    <h4 class="footer-subtitle">Specialties</h4>
                    <ul class="footer-links list-unstyled">
                        @foreach ($specialist as $data)
                            <li><a href="javascript:void(0)">{{ ucwords($data->name) }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h4 class="footer-subtitle">Facebook Page</h4>
                    <div class="footer-fb-container">
                        <div class="facebook-page-wrapper">
                            @if (config('settings.facebook'))
                                <a href="{{ config('settings.facebook') }}" target="_blank">
                                    <img src="{{ config('settings.profile_photo') }}"
                                        alt="{{ config('settings.name') }}" loading="lazy" class="fb-img">
                                    <div class="fb-overlay">
                                        <span>Visit Our Page</span>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <hr class="footer-divider">

            <div class="row align-items-center footer-bottom">
                <div class="text-center col-md-6 text-md-start">
                    <p class="mb-0">&copy; 2025 <strong>{{ config('settings.copyright') }}</strong>. All rights
                        reserved.
                    </p>
                </div>
                <div class="mt-3 text-center col-md-6 text-md-end mt-md-0">
                    <p class="mb-0">Developed by <a href="#" class="text-warning text-decoration-none">Classic
                            IT</a></p>
                </div>
            </div>
        </div>

        <a href="#" class="shadow back-to-top"><i class="fas fa-arrow-up"></i></a>
    </footer>
</footer>
