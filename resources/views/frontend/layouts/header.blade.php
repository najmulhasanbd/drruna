    <header>
        <section class="header-area">
            <div class="container">
                <div class="row align-items-center d-none d-lg-flex">
                    <!-- LOGO -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend/image/logo.gif') }}" alt="dr runa" loading="lazy">
                            </a>
                        </div>
                    </div>

                    <!-- MENU -->
                    <div class="col-lg-7">
                        <nav class="main-menu">
                            <ul class="d-flex align-items-center justify-content-center">
                                <li>
                                    <a href="{{ url('/') }}" class="menu-link">
                                        <span class="text-default">Home</span>
                                        <span class="text-hover">Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}" class="menu-link">
                                        <span class="text-default">About</span>
                                        <span class="text-hover">About</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('service') }}" class="menu-link">
                                        <span class="text-default">Services</span>
                                        <span class="text-hover">Services</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('faq') }}" class="menu-link">
                                        <span class="text-default">FAQs</span>
                                        <span class="text-hover">FAQs</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!-- RIGHT NUMBER -->
                    <div class="col-lg-3">
                        <div class="header-right">
                            <img src="{{ asset('frontend/image/contact.svg') }}" alt="contact">
                            <a href="tel:+8801790118866">
                                <span class="num-default">+8801790118866</span>
                                <span class="num-hover">Call Now</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center d-lg-none">
                    <div class="col-2">
                        <div class="hamhurbar_menu" data-bs-toggle="offcanvas" href="#mobileMenu" role="button"
                            aria-controls="offcanvasExample">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                    <div class="col-6 d-flex justify-content-center">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend/image/logo.gif') }}" alt="dr runa" loading="lazy">
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="header-right">
                            <a href="tel:+8801790118866">
                                <span class="num-default">Call Now</span>
                                <span class="num-hover">Call Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="offcanvas offcanvas-start mobile-menu" tabindex="-1" id="mobileMenu"
                aria-labelledby="mobileMenuLabel">

                <div class="offcanvas-header">
                    <div class="offcanvas-logo">
                        <img src="{{ asset('frontend/image/logo.gif') }}" alt="dr runa" loading="lazy">
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>

                <div class="offcanvas-body">
                    <ul class="mobile-nav">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('service') }}">Services</a></li>
                        <li><a href="{{ route('faq') }}">FAQs</a></li>
                    </ul>
                </div>
            </div>

        </section>
    </header>
