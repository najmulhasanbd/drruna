<header>
    <section class="header-area header-sticky">
        <div class="container">
            <div class="row align-items-center d-none d-lg-flex">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="{{ url('/') }}" title="{{ config('settings.name') }}">
                            @if (Request::is('/'))
                                <h1 class="d-none">{{ config('settings.name') }}</h1>
                            @endif
                            <img src="{{ asset(config('settings.logo')) }}"
                                alt="{{ config('settings.name') }} - Doctor Website" loading="lazy">
                        </a>
                    </div>
                </div>

                <div class="col-md-6">
                    <nav class="main-menu" aria-label="Main Navigation">
                        <ul class="mb-0 d-flex align-items-center justify-content-center list-unstyled">
                            <li>
                                <a href="{{ url('/') }}" class="menu-link {{ Request::is('/') ? 'active' : '' }}"
                                    title="Home Page">
                                    <span class="text-default">Home</span>
                                    <span class="text-hover">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}"
                                    class="menu-link {{ Request::is('about*') ? 'active' : '' }}"
                                    title="About Dr. Runa">
                                    <span class="text-default">About</span>
                                    <span class="text-hover">About</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('service') }}"
                                    class="menu-link {{ Request::is('service*') ? 'active' : '' }}"
                                    title="Our Services">
                                    <span class="text-default">Services</span>
                                    <span class="text-hover">Services</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq') }}"
                                    class="menu-link {{ Request::is('faq*') ? 'active' : '' }}"
                                    title="Frequently Asked Questions">
                                    <span class="text-default">FAQs</span>
                                    <span class="text-hover">FAQs</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('gallery') }}"
                                    class="menu-link {{ Request::is('gallery*') ? 'active' : '' }}"
                                    title="Photo Gallery">
                                    <span class="text-default">Gallery</span>
                                    <span class="text-hover">Gallery</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="col-md-2">
                    <div class="gap-3 footer-social d-flex header-social justify-content-center">
                        @if (config('settings.facebook'))
                            <a href="{{ config('settings.facebook') }}" target="_blank" rel="noopener noreferrer"
                                class="social-icon fb" title="Facebook Profile">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        @endif
                        @if (config('settings.linkedin'))
                            <a href="{{ config('settings.linkedin') }}" target="_blank" rel="noopener noreferrer"
                                class="social-icon ln" title="LinkedIn Profile">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="col-md-2 text-end">
                    <div class="header-right">
                        <a href="tel:{{ config('settings.mobile') ?? '01790-118855' }}" title="Call for Appointment">
                            <span class="num-default"><i
                                    class="fa fa-phone-alt me-1"></i>{{ config('settings.mobile') ?? '01790-118855' }}</span>
                            <span class="num-hover">Call Now</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row align-items-center d-lg-none">
                <div class="col-2">
                    <button class="bg-transparent border-0 hamhurbar_menu" data-bs-toggle="offcanvas"
                        data-bs-target="#mobileMenu" aria-label="Open Menu">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="col-6 d-flex justify-content-center">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset(config('settings.logo')) }}" alt="{{ config('settings.name') }}"
                                loading="lazy" height="40">
                        </a>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="header-right">
                        <a href="tel:{{ config('settings.mobile') ?? '01790-118855' }}" class="btn btn-sm btn-success rounded-pill">
                            <span class="num-default">Call Now</span>
                            <span class="num-hover">Call Now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="offcanvas offcanvas-start mobile-menu" tabindex="-1" id="mobileMenu"
            aria-labelledby="mobileMenuLabel">
            <div class="offcanvas-header border-bottom">
                <div class="offcanvas-logo" id="mobileMenuLabel">
                    <img src="{{ asset(config('settings.logo')) ?? '' }}" alt="{{ config('settings.name') }}"
                        height="40">
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <nav>
                    <ul class="mobile-nav list-unstyled">
                        <li class="mb-2"><a href="{{ url('/') }}"
                                class="py-2 d-block text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="{{ route('about') }}"
                                class="py-2 d-block text-decoration-none">About</a></li>
                        <li class="mb-2"><a href="{{ route('service') }}"
                                class="py-2 d-block text-decoration-none">Services</a></li>
                        <li class="mb-2"><a href="{{ route('faq') }}"
                                class="py-2 d-block text-decoration-none">FAQs</a></li>
                        <li class="mb-2"><a href="{{ route('gallery') }}"
                                class="py-2 d-block text-decoration-none">Gallery</a></li>
                    </ul>
                </nav>
                <hr>
                <div class="gap-3 mt-4 footer-social d-flex">
                    @if(config('settings.facebook'))
                    <a href="{{ config('settings.facebook') }}" target="_blank" rel="noopener noreferrer"
                        class="social-icon fb fs-4" title="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    @endif
                    @if(config('settings.linkedin'))
                    <a href="{{ config('settings.linkedin') }}" target="_blank" rel="noopener noreferrer"
                        class="social-icon ln fs-4" title="LinkedIn">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    @endif
                </div>
                @if(config('settings.mobile'))
                <div class="mt-4">
                    <a href="tel:{{ config('settings.mobile') }}" class="py-2 btn btn-success w-100">
                        <i class="fa fa-phone-alt me-2"></i> {{ config('settings.mobile') }}
                    </a>
                </div>
                @endif
            </div>
        </div>
    </section>
</header>
