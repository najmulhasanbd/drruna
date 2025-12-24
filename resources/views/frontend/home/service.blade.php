<section class="py-5 bg-white service-section" id="services">
    <div class="container">
        <div class="mb-5 text-center row justify-content-center">
            <div class="col-lg-7" data-aos="fade-up">
                <span class="text-success fw-bold text-uppercase ls-2">What I Provide</span>
                <h2 class="mt-2 display-5 fw-bold text-dark">Expert Medical <span class="text-success">Services</span>
                </h2>
                <div class="mx-auto mb-4 header-line"></div>
                <p class="text-muted">Specialized medical care focusing on high-risk pregnancy, fetal medicine, and
                    gynecological excellence with over 18 years of experience.</p>
            </div>
        </div>

        <div class="row g-4">
            @forelse ($services as $data)
                <article class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="p-4 border-0 shadow-sm service-card-premium h-100 rounded-4">
                        <div class="mb-4 icon-box-medical">
                           {!! $data->icon !!}
                        </div>
                        <h3 class="mb-3 h4 fw-bold">{{ $data->title }}</h3>
                        <p class="mb-4 text-secondary">{!! $data->description !!}</p>

                    </div>
                </article>
            @empty
                <p>No services found. 🏥</p>
            @endforelse

            
            <div class="mt-5 col-lg-12" data-aos="zoom-in">
                <div
                    class="p-5 overflow-hidden text-white cta-banner-dark rounded-5 d-flex align-items-center justify-content-between position-relative">
                    <div class="cta-content position-relative z-2">
                        <h2 class="mb-3 display-6 fw-bold">I Provide Best <br> Medical Treatment.</h2>
                        <p class="mb-4 opacity-75 lead">Dr. Runa Akter: Dedicated, Highly Experienced & Compassionate.
                        </p>
                        <a href="mailto:test@gmail.com"
                            class="px-5 shadow btn btn-primary btn-lg rounded-pill bookappoinment">
                            BOOK AN APPOINTMENT <i class="fas fa-calendar-check ms-2"></i>
                        </a>
                    </div>
                    <div class="cta-icon-bg z-1 d-none d-md-block">
                        <i class="opacity-25 fas fa-hand-holding-heart" style="font-size: 200px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
