<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-12 ">
                <div class="hero-content">
                    <span class="mb-3 badge medical-badge" title="Medical Registration Number">
                        <i class="fas fa-certificate me-1"></i> {{ config('settings.register') ?? 'BMDC Reg.: D32OV01' }}
                    </span>

                    <h1 class="text-center hero-title">
                        Asst. Prof. Dr. <br>
                        <div class="position-relative d-flex justify-content-center">
                            <span style="color: #ffb703;">{{ config('settings.name') ?? 'Runa Akter Dola' }}</span>
                            <small class="right-0 position-absolute"
                                style="bottom:-20px">{{ config('settings.degree') ?? 'MBBS, BCS (Health), FCPS (OBGYN), FCPS (Feto-Maternal Medicine)' }}</small>
                        </div>
                    </h1>

                    <p class="mt-3 hero-text">
                        {!! config('settings.short_about') ??
                            'Assistant Professor at Mitford Hospital (SSMC). Over 16 years of experience in High-Risk Pregnancy & Fetal Medicine.' !!}
                    </p>

                    <div class="flex-wrap gap-3 mt-4 hero-buttons d-flex justify-content-between">
                        <a href="tel:{{ config('settings.mobile') ?? '01790-118855' }}" class="btn btn-appointment"
                            title="Call for Appointment">
                            <i class="fas fa-phone-alt me-2"></i> Call:
                            {{ config('settings.mobile') ?? '01790-118855' }}
                        </a>
                        <a href="{{ route('service') }}" class="px-4 py-3 btn btn-outline-light"
                            style="border-radius: 8px; font-weight: 600;" title="Explore Medical Services">
                            View Services
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-md-12 d-md-block" data-aos="fade-down">
                <div class="hero-swiper-container">
                    <div class="swiper heroSwiper">
                        <div class="swiper-wrapper">
                            @foreach ($sliders as $index => $slider)
                                <div class="swiper-slide hero-slide">
                                    <img src="{{ asset($slider->image) }}"
                                        alt="{{ config('settings.name') ?? 'Dr. Runa Akter Dola' }} - {{ $slider->title ?? 'Professional Medical Specialist' }}"
                                        loading="{{ $index == 0 ? 'eager' : 'lazy' }}"
                                        @if ($index == 0) fetchpriority="high" @endif
                                        title="{{ config('settings.name') ?? 'Dr. Runa Akter Dola' }} Medical Service Slider">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shadow-sm trust-card">
        <h2 class="mb-2 trust-title h6">Trusted by {{ config('settings.patients') ?? '' }} Happy Patients</h2>
        <div class="mb-2 star-rating" aria-label="5 Star Rating">
            <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
        </div>
        <div class="avatar-group">
            <img src="https://i.pravatar.cc/150?u=1" class="avatar-item" alt="Reviewer 1" width="40" height="40"
                loading="lazy">
            <img src="https://i.pravatar.cc/150?u=2" class="avatar-item" alt="Reviewer 2" width="40" height="40"
                loading="lazy">
            <img src="https://i.pravatar.cc/150?u=3" class="avatar-item" alt="Reviewer 3" width="40" height="40"
                loading="lazy">
            <img src="https://i.pravatar.cc/150?u=4" class="avatar-item" alt="Reviewer 4" width="40" height="40"
                loading="lazy">
            <div class="count-badge">{{ config('settings.patients') ?? '' }}</div>
        </div>
    </div>
</section>
