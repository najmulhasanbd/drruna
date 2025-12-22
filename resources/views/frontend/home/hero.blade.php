<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT CONTENT -->
            <div class="col-lg-5 col-md-12 ">
                <div class="hero-content">
                    <span class="mb-3 badge medical-badge">
                        <i class="fas fa-certificate me-1"></i> BMDC Reg.: D32OV01
                    </span>

                    <h1 class="text-center hero-title">
                        Asst. Prof. Dr. <br>
                        <div class="position-relative d-flex justify-content-center">
                            <span style="color: #ffb703;">Runa Akter Dola</span>
                            <small class="right-0 position-absolute" style="bottom:-20px">MBBS, BCS (Health), FCPS (OBGYN), FCPS (Feto-Maternal Medicine)</small>
                        </div>
                    </h1>

                    {{-- <h5 class="mb-3 text-white fw-bold">MBBS, BCS (Health), FCPS (OBGYN)</h5> --}}

                    <p class=" hero-text">
                        Assistant Professor (Feto-Maternal Medicine) at Sir Salimullah Medical College.
                        Expert in <strong>High-Risk Pregnancy</strong> & Women's Health with 16+ years of
                        experience.
                    </p>

                    <div class="flex-wrap gap-3 hero-buttons d-flex justify-content-between">
                        <a href="tel:09611530530" class="btn btn-appointment">
                            <i class="fas fa-phone-alt"></i> Call: 09611530530
                        </a>
                        <a href="{{ route('service') }}" class="px-4 btn btn-outline-light"
                            style="border-radius: 8px; font-weight: 600; padding: 14px 26px;">
                            View Services
                        </a>
                    </div>
                </div>
            </div>

            <!-- RIGHT BACKGROUND -->
            <div class="col-lg-7 col-md-12 d-md-block">
                <div class="hero-swiper-container">
                    <div class="swiper heroSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide hero-slide">
                                <img src="{{ asset('frontend/image/slider/1.jpeg') }}" alt="Slider 1">
                            </div>
                            <div class="swiper-slide hero-slide">
                                <img src="{{ asset('frontend/image/slider/2.jpeg') }}" alt="Slider 2">
                            </div>
                            <div class="swiper-slide hero-slide">
                                <img src="{{ asset('frontend/image/slider/3.jpeg') }}" alt="Slider 3">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="trust-card">
        <h2 class="trust-title">Trusted by patients</h2>
        <div class="star-rating">
            &#9733;&#9733;&#9733;&#9733;&#9733;
        </div>
        <div class="avatar-group">
            <img src="https://i.pravatar.cc/150?u=1" class="avatar-item" alt="Patient 1">
            <img src="https://i.pravatar.cc/150?u=2" class="avatar-item" alt="Patient 2">
            <img src="https://i.pravatar.cc/150?u=3" class="avatar-item" alt="Patient 3">
            <img src="https://i.pravatar.cc/150?u=4" class="avatar-item" alt="Patient 4">
            <img src="https://i.pravatar.cc/150?u=5" class="avatar-item" alt="Patient 5">

            <div class="count-badge">+2k</div>
        </div>
    </div>
</section>
