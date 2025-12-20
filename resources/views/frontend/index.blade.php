@extends('frontend.layouts.master')

@section('content')
    <section class="hero-section"
        style="background-image: linear-gradient(rgba(10, 143, 77, 0.85), rgba(7, 107, 57, 0.85)), url('{{ asset('frontend/image/hero_bg.webp') }}')">
        <div class="container">
            <div class="row align-items-center min-vh-100">

                <!-- LEFT CONTENT -->
                <div class="col-md-6">
                    <div class="hero-content">
                        <span class="mb-3 badge medical-badge">
                            <i class="fas fa-certificate me-1"></i> BMDC Reg.: D32OV01
                        </span>

                        <h1 class="hero-title">
                            Asst. Prof. Dr. <br>
                            <span style="color: #ffb703;">Runa Akter Dola</span>
                        </h1>

                        <h5 class="mb-3 text-white fw-bold">MBBS, BCS (Health), FCPS (OBGYN)</h5>

                        <p class="hero-text">
                            Assistant Professor (Feto-Maternal Medicine) at Sir Salimullah Medical College.
                            Expert in <strong>High-Risk Pregnancy</strong> & Women's Health with 16+ years of
                            experience.
                        </p>

                        <div class="gap-3 hero-buttons d-flex">
                            <a href="tel:09611530530" class="btn btn-appointment">
                                <i class="fas fa-phone-alt"></i> Call: 09611530530
                            </a>
                            <a href="#" class="px-4 btn btn-outline-light"
                                style="border-radius: 8px; font-weight: 600; padding: 14px 26px;">
                                View Services
                            </a>
                        </div>
                    </div>
                </div>

                <!-- RIGHT BACKGROUND -->
                <div class="col-md-6 d-md-block">
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
    </section>


    {{-- service --}}
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
                <article class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="p-4 border-0 shadow-sm service-card-premium h-100 rounded-4">
                        <div class="mb-4 icon-box-medical">
                            <i class="fas fa-microscope"></i>
                        </div>
                        <h3 class="mb-3 h4 fw-bold">Endometriosis</h3>
                        <p class="mb-4 text-secondary">Comprehensive diagnosis and advanced treatment for endometriosis to
                            improve your quality of life.</p>
                        <button class="p-0 bg-transparent border-0 btn-read-more text-primary fw-bold"
                            data-bs-toggle="modal" data-bs-target="#serviceDetailModal"
                            data-title="Endometriosis Specialist Care"
                            data-desc="Endometriosis is a condition where tissue similar to the lining of the uterus grows outside the uterus. Dr. Runa Akter offers advanced laparoscopic management and hormonal therapy tailored to each patient's needs.">
                            Read More <i class="fas fa-arrow-right ms-1"></i>
                        </button>
                    </div>
                </article>

                <article class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-4 border-0 shadow-sm service-card-premium h-100 rounded-4">
                        <div class="mb-4 icon-box-medical">
                            <i class="fas fa-baby"></i>
                        </div>
                        <h3 class="mb-3 h4 fw-bold">Fetal Medicine</h3>
                        <p class="mb-4 text-secondary">Specialized monitoring and high-resolution ultrasound for the health
                            and safety of your unborn baby.</p>
                        <button class="p-0 bg-transparent border-0 btn-read-more text-primary fw-bold"
                            data-bs-toggle="modal" data-bs-target="#serviceDetailModal"
                            data-title="Fetal Medicine & Feto-Maternal Health"
                            data-desc="With a fellowship in Feto-Maternal Medicine from the Philippines, Dr. Runa specializes in high-risk pregnancies, ensuring the best outcome for both mother and child through advanced prenatal screenings.">
                            Read More <i class="fas fa-arrow-right ms-1"></i>
                        </button>
                    </div>
                </article>

                <article class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-4 border-0 shadow-sm service-card-premium h-100 rounded-4">
                        <div class="mb-4 icon-box-medical">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h3 class="mb-3 h4 fw-bold">Cervical Cancer</h3>
                        <p class="mb-4 text-secondary">Expert screening, preventive vaccination, and comprehensive
                            management for cervical health.</p>
                        <button class="p-0 bg-transparent border-0 btn-read-more text-primary fw-bold"
                            data-bs-toggle="modal" data-bs-target="#serviceDetailModal"
                            data-title="Cervical Cancer Screening & Prevention"
                            data-desc="Early detection is vital. We provide HPV testing, Pap smears, and colposcopy to ensure early diagnosis and prevention of cervical cancer.">
                            Read More <i class="fas fa-arrow-right ms-1"></i>
                        </button>
                    </div>
                </article>

                <div class="mt-5 col-lg-12" data-aos="zoom-in">
                    <div
                        class="p-5 overflow-hidden text-white cta-banner-dark rounded-5 d-flex align-items-center justify-content-between position-relative">
                        <div class="cta-content position-relative z-2">
                            <h2 class="mb-3 display-6 fw-bold">I Provide Best <br> Medical Treatment.</h2>
                            <p class="mb-4 opacity-75 lead">Dr. Runa Akter: Dedicated, Highly Experienced & Compassionate.
                            </p>
                            <a href="tel:01790118866" class="px-5 shadow btn btn-primary btn-lg rounded-pill">
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

    <div class="modal fade" id="serviceDetailModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="overflow-hidden border-0 shadow modal-content rounded-4">
                <div class="py-3 text-white border-0 modal-header bg-success">
                    <h5 class="modal-title fw-bold" id="modalLabel">Service Detail</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="p-5 modal-body">
                    <div class="row align-items-center">
                        <div class="mb-4 text-center col-md-3 mb-md-0">
                            <div class="mx-auto modal-icon-display rounded-circle bg-light text-success d-flex align-items-center justify-content-center"
                                style="width: 100px; height: 100px;">
                                <i class="fas fa-stethoscope display-4"></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h3 id="serviceTitle" class="mb-3 fw-bold text-dark">Service Name</h3>
                            <p id="serviceDescription" class="text-muted lh-lg">Description goes here...</p>
                            <hr class="my-4">
                            <a href="#" class="px-4 btn btn-success rounded-pill">BOOK AN APPOINMENT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- about me --}}
    <section class="py-5 overflow-hidden bg-white about-area" id="about">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="about-image-wrapper position-relative" data-aos="fade-right">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="mb-3 img-box bounce-animation">
                                    <img src="{{ asset('frontend/image/about/about-One.jpg') }}"
                                        alt="Dr. Runa Akter Consulting Patient" class="shadow-sm img-fluid rounded-4">
                                </div>
                                <div class="img-box bounce-animation-delay">
                                    <img src="{{ asset('frontend/image/about/service_image.jpg') }}"
                                        alt="Medical Treatment at Clinic" class="shadow-sm img-fluid rounded-4">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="img-box main-img bounce-animation">
                                    <img src="{{ asset('frontend/image/about/about_two.png') }}"
                                        alt="Dr. Runa Akter Dhola - OBGYN Specialist"
                                        class="shadow-lg img-fluid rounded-4 h-100 object-fit-cover">
                                </div>
                            </div>
                        </div>

                        <div class="video-promotion-wrap">
                            <div class="circle-rotating-text">
                                <svg viewBox="0 0 100 100" width="150" height="150">
                                    <defs>
                                        <path id="circlePath"
                                            d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0 " />
                                    </defs>
                                    <text fill="#198754" font-weight="bold" font-size="9">
                                        <textPath xlink:href="#circlePath">
                                            SINCE 2025 • 24 HOURS SOLUTION • SINCE 2025 •
                                        </textPath>
                                    </text>
                                </svg>
                                <button type="button" class="shadow-lg play-btn-inner" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" aria-label="Watch Introduction Video">
                                    <i class="fas fa-play"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-content">
                        <span class="text-success fw-bold text-uppercase ls-2">About Me</span>
                        <h2 class="mt-2 mb-4 display-5 fw-bold text-dark">Dr. Runa Akter Dhola</h2>
                        <p class="mb-4 text-secondary lead-sm">
                            I'm Dr. Runa Akter Dhola, a specialized OBGYN with a passion for providing holistic,
                            evidence-based medical care. Committed to serving women with excellence for over 18 years.
                        </p>

                        <div class="mb-4 row g-3">
                            <div class="col-sm-6">
                                <ul class="list-unstyled checklist">
                                    <li><i class="fas fa-check-circle text-primary"></i> Monthly Checkups</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Caring & Support Always</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Proactive and Fast Results</li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled checklist">
                                    <li><i class="fas fa-check-circle text-primary"></i> Specialized Consultation</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Advanced Diagnostics</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Complete Care Solutions</li>
                                </ul>
                            </div>
                        </div>

                        <a href="#" class="read-more-link fw-bold text-primary text-decoration-none">
                            Read More <span class="arrow-wrap"><i class="fas fa-arrow-up-right-from-square"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="bg-transparent border-0 modal-content">
                <div class="p-0 border-0 modal-header">
                    <button type="button" class="mb-2 btn-close btn-close-white ms-auto" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="p-0 modal-body">
                    <div class="overflow-hidden border border-white shadow-lg ratio ratio-16x9 rounded-4 border-5">
                        <iframe src="https://www.youtube.com/embed/flr3QfrM6XI?autoplay=1&rel=0"
                            title="Dr. Runa Akter Introduction"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- process --}}
    <section class="py-5 overflow-hidden bg-light consultation-section">
        <div class="container">
            <div class="mb-5 text-center" data-aos="fade-up">
                <h2 class="fw-bold display-6">My Consultation <span class="text-success">Process</span></h2>
                <div class="mx-auto header-line"></div>
            </div>

            <div class="row g-5 align-items-center">
                <div class="col-lg-4" data-aos="fade-right">
                    <div class="p-4 bg-white shadow-sm schedule-card rounded-4 sticky-top" style="top: 100px;">
                        <div class="mb-4 d-flex align-items-center">
                            <div class="text-white icon-circle bg-success me-3">
                                <i class="fas fa-hospital"></i>
                            </div>
                            <h4 class="m-0 fw-bold">Chamber Location</h4>
                        </div>

                        <div class="mb-4 location-item">
                            <h5 class="text-success fw-bold"><i class="fas fa-map-marker-alt me-2"></i>Dhaka Hospital</h5>
                            <p class="text-muted ms-4">শনিবার: ১০:০০ AM - ১২:০০ PM</p>
                        </div>

                        <div class="mb-4 location-item">
                            <h5 class="text-primary fw-bold"><i class="fas fa-map-marker-alt me-2"></i>Central Clinic</h5>
                            <p class="text-muted ms-4">সোমবার: ০৪:০০ PM - ০৭:০০ PM</p>
                        </div>
                        <div class="mb-4 location-item">
                            <h5 class="text-success fw-bold"><i class="fas fa-map-marker-alt me-2"></i>Dhaka Hospital</h5>
                            <p class="text-muted ms-4">শনিবার: ১০:০০ AM - ১২:০০ PM</p>
                        </div>

                        <div class="mb-4 location-item">
                            <h5 class="text-primary fw-bold"><i class="fas fa-map-marker-alt me-2"></i>Central Clinic</h5>
                            <p class="text-muted ms-4">সোমবার: ০৪:০০ PM - ০৭:০০ PM</p>
                        </div>
                        <div class="mb-4 location-item">
                            <h5 class="text-success fw-bold"><i class="fas fa-map-marker-alt me-2"></i>Dhaka Hospital</h5>
                            <p class="text-muted ms-4">শনিবার: ১০:০০ AM - ১২:০০ PM</p>
                        </div>

                        <div class="mb-4 location-item">
                            <h5 class="text-primary fw-bold"><i class="fas fa-map-marker-alt me-2"></i>Central Clinic</h5>
                            <p class="text-muted ms-4">সোমবার: ০৪:০০ PM - ০৭:০০ PM</p>
                        </div>
                        <div class="mb-4 location-item">
                            <h5 class="text-primary fw-bold"><i class="fas fa-map-marker-alt me-2"></i>Central Clinic</h5>
                            <p class="text-muted ms-4">সোমবার: ০৪:০০ PM - ০৭:০০ PM</p>
                        </div>

                        <div class="pt-3 mt-4 border-top">
                            <a href="tel:017XXXXXXXX" class="py-2 shadow-sm btn btn-success w-100 rounded-pill">
                                <i class="fas fa-phone-alt me-2"></i>Call for Appointment
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-left">
                    <div class="process-timeline ps-4">
                        <div class="mb-5 process-item position-relative" data-aos="fade-up">
                            <div class="shadow step-number">1</div>
                            <div class="ms-5 ps-3">
                                <h4 class="fw-bold">Book an Appointment</h4>
                                <p class="text-secondary">Schedule your consultation easily through phone or online
                                    booking. Emergency and follow-up appointments are prioritized for expectant mothers.</p>
                            </div>
                        </div>

                        <div class="mb-5 process-item position-relative" data-aos="fade-up" data-aos-delay="100">
                            <div class="shadow step-number">2</div>
                            <div class="ms-5 ps-3">
                                <h4 class="fw-bold">Initial Consultation & Checkup</h4>
                                <p class="text-secondary">During the first visit, a detailed medical history is reviewed
                                    and necessary clinical examinations or ultrasound tests are performed.</p>
                            </div>
                        </div>

                        <div class="mb-5 process-item position-relative" data-aos="fade-up" data-aos-delay="200">
                            <div class="shadow step-number">3</div>
                            <div class="ms-5 ps-3">
                                <h4 class="fw-bold">Diagnosis & Treatment Planning</h4>
                                <p class="text-secondary">Based on test results, an individualized care plan is created
                                    covering prenatal care, gynecological issues, or feto-maternal evaluations.</p>
                            </div>
                        </div>

                        <div class="process-item position-relative" data-aos="fade-up" data-aos-delay="300">
                            <div class="shadow step-number">4</div>
                            <div class="ms-5 ps-3">
                                <h4 class="fw-bold">Follow-up & Ongoing Care</h4>
                                <p class="text-secondary">Patients receive continuous monitoring, lifestyle guidance, and
                                    compassionate support to ensure safe recovery and the best maternal-fetal outcomes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 overflow-hidden experience-area bg-light" id="experience">
        <div class="container">
            <header class="mb-5 text-center" data-aos="fade-up">
                <h2 class="fw-bold display-6 text-dark">Professional <span class="text-success">Experience</span></h2>
                <div class="mx-auto mt-2 header-underline bg-success"
                    style="width: 70px; height: 4px; border-radius: 10px;"></div>
            </header>

            <div class="row g-4 justify-content-center">
                <article class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-4 text-center bg-white border-0 shadow-sm experience-card h-100 rounded-4">
                        <figure class="mx-auto mb-4 overflow-hidden shadow-sm hospital-logo-box rounded-3">
                            <img src="{{ asset('frontend/image/about/about-One.jpg') }}"
                                alt="Green Life Hospital, Dhaka - Senior Consultant Obstetrics & Gynecology"
                                class="img-fluid w-100 h-100 object-fit-cover">
                        </figure>
                        <h3 class="mb-1 h5 fw-bold text-dark">Green Life Hospital, Dhaka</h3>
                        <p class="mb-2 text-success small fw-bold">Senior Consultant — OBGYN</p>
                        <time class="mb-3 text-muted d-block small" datetime="2018/2025">2018 – Present</time>
                        <p class="mb-4 text-secondary small">Leading advanced ultrasound and maternal-fetal monitoring
                            programs for high-risk pregnancies.</p>
                        <button class="px-4 btn btn-outline-success btn-sm rounded-pill stretched-link-custom"
                            data-bs-toggle="modal" data-bs-target="#experienceDetailsModal"
                            data-hospital="Green Life Hospital"
                            data-details="Dr. Runa Akter Dhola provides specialized care in high-risk pregnancy and prenatal diagnosis. Leading advanced ultrasound and maternal-fetal monitoring programs since 2018.">
                            Read More
                        </button>
                    </div>
                </article>

                <article class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-4 text-center bg-white border-0 shadow-sm experience-card h-100 rounded-4">
                        <figure class="mx-auto mb-4 overflow-hidden shadow-sm hospital-logo-box rounded-3">
                            <img src="{{ asset('frontend/image/about/about-One.jpg') }}"
                                alt="Square Hospital, Dhaka - Consultant OBGYN"
                                class="img-fluid w-100 h-100 object-fit-cover">
                        </figure>
                        <h3 class="mb-1 h5 fw-bold text-dark">Square Hospital, Dhaka</h3>
                        <p class="mb-2 text-success small fw-bold">Consultant — Obstetrics & Gynecology</p>
                        <time class="mb-3 text-muted d-block small" datetime="2015/2018">2015 – 2018</time>
                        <p class="mb-4 text-secondary small">Expertise in complex maternal cases and minimally invasive
                            gynecological procedures.</p>
                        <button class="px-4 btn btn-outline-success btn-sm rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#experienceDetailsModal" data-hospital="Square Hospital"
                            data-details="Delivered comprehensive maternity care and managed complex maternal cases with a multidisciplinary team. Expertise in performing minimally invasive surgical procedures.">
                            Read More
                        </button>
                    </div>
                </article>

                <article class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-4 text-center bg-white border-0 shadow-sm experience-card h-100 rounded-4">
                        <figure class="mx-auto mb-4 overflow-hidden shadow-sm hospital-logo-box rounded-3">
                            <img src="{{ asset('frontend/image/about/about-One.jpg') }}"
                                alt="United Hospital, Dhaka - Registrar OB-GYN"
                                class="img-fluid w-100 h-100 object-fit-cover">
                        </figure>
                        <h3 class="mb-1 h5 fw-bold text-dark">United Hospital, Dhaka</h3>
                        <p class="mb-2 text-success small fw-bold">Registrar — OB-GYN Department</p>
                        <time class="mb-3 text-muted d-block small" datetime="2012/2015">2012 – 2015</time>
                        <p class="mb-4 text-secondary small">Hands-on experience in labor management, antenatal counseling,
                            and infertility evaluation.</p>
                        <button class="px-4 btn btn-outline-success btn-sm rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#experienceDetailsModal" data-hospital="United Hospital"
                            data-details="Gained extensive experience in labor management, antenatal counseling, infertility evaluation, and postnatal patient care during 2012-2015.">
                            Read More
                        </button>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <div class="modal fade" id="experienceDetailsModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="border-0 shadow-lg modal-content rounded-4">
                <div class="py-3 text-white modal-header bg-success">
                    <h5 class="modal-title fw-bold" id="modalLabel">Hospital Experience</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="p-4 modal-body">
                    <div class="mb-3 d-flex align-items-center">
                        <div class="p-3 icon-box bg-light text-success rounded-circle me-3">
                            <i class="fas fa-briefcase-medical fa-lg"></i>
                        </div>
                        <h4 id="displayHospitalName" class="mb-0 h5 fw-bold">Hospital Name</h4>
                    </div>
                    <p id="displayExperienceDetails" class="text-secondary lh-lg"></p>
                </div>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="p-1 shadow-lg help-section-wrapper rounded-4" data-aos="zoom-in">
            <div
                class="p-4 help-banner-premium d-flex flex-column flex-md-row align-items-center justify-content-between p-md-5">
                <div class="mb-4 text-center content-side text-md-start mb-md-0">
                    <h2 class="mb-2 fw-bold">Do You Have Health Concerns?</h2>
                    <p class="mb-0 opacity-75">
                        Need Immediate Medical Attention? Get Expert Help From <strong>Dr. Runa Akter Dola</strong> —
                        <span class="text-success-light fw-semibold">Specialist in High-Risk Pregnancy & Feto-Maternal
                            Medicine.</span>
                    </p>
                </div>
                <div class="button-side">
                    <button class="btn-help-pulse">
                        <span>I NEED HELP</span>
                        <i class="fas fa-hand-holding-medical ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <section class="py-5 overflow-hidden review-section">
        <div class="container">
            <div class="mb-5 text-center" data-aos="fade-up">
                <h2 class="fw-bold display-6">What Patients Are Saying!</h2>
                <div class="mx-auto mt-2 divider bg-success" style="width: 60px; height: 4px;"></div>
            </div>

            <div class="py-4 swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="p-4 bg-white border shadow-sm review-card rounded-4">
                            <div class="mb-3 quote-icon"><i class="opacity-25 fas fa-quote-left text-success fa-2x"></i>
                            </div>
                            <p class="mb-4 text-muted small">"Dr. Runa Akter Dola is one of the most caring doctors I've
                                ever met. She explains everything clearly and gives you confidence throughout your
                                treatment."</p>
                            <div class="mb-3 stars text-warning">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="m-0 fw-bold">Sadia Rahman</h6>
                                    <small class="text-muted">Green Life Hospital, Dhaka</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-4 bg-white border shadow-sm review-card rounded-4">
                            <div class="mb-3 quote-icon"><i class="opacity-25 fas fa-quote-left text-success fa-2x"></i>
                            </div>
                            <p class="mb-4 text-muted small">"Dr. Runa Akter Dola is one of the most caring doctors I've
                                ever met. She explains everything clearly and gives you confidence throughout your
                                treatment."</p>
                            <div class="mb-3 stars text-warning">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="m-0 fw-bold">Sadia Rahman</h6>
                                    <small class="text-muted">Green Life Hospital, Dhaka</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-4 bg-white border shadow-sm review-card rounded-4">
                            <div class="mb-3 quote-icon"><i class="opacity-25 fas fa-quote-left text-success fa-2x"></i>
                            </div>
                            <p class="mb-4 text-muted small">"Dr. Runa Akter Dola is one of the most caring doctors I've
                                ever met. She explains everything clearly and gives you confidence throughout your
                                treatment."</p>
                            <div class="mb-3 stars text-warning">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="m-0 fw-bold">Sadia Rahman</h6>
                                    <small class="text-muted">Green Life Hospital, Dhaka</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-4 bg-white border shadow-sm review-card rounded-4">
                            <div class="mb-3 quote-icon"><i class="opacity-25 fas fa-quote-left text-success fa-2x"></i>
                            </div>
                            <p class="mb-4 text-muted small">"Dr. Runa Akter Dola is one of the most caring doctors I've
                                ever met. She explains everything clearly and gives you confidence throughout your
                                treatment."</p>
                            <div class="mb-3 stars text-warning">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="m-0 fw-bold">Sadia Rahman</h6>
                                    <small class="text-muted">Green Life Hospital, Dhaka</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-4 bg-white border shadow-sm review-card rounded-4">
                            <div class="mb-3 quote-icon"><i class="opacity-25 fas fa-quote-left text-success fa-2x"></i>
                            </div>
                            <p class="mb-4 text-muted small">"Dr. Runa Akter Dola is one of the most caring doctors I've
                                ever met. She explains everything clearly and gives you confidence throughout your
                                treatment."</p>
                            <div class="mb-3 stars text-warning">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="m-0 fw-bold">Sadia Rahman</h6>
                                    <small class="text-muted">Green Life Hospital, Dhaka</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-4 bg-white border shadow-sm review-card rounded-4">
                            <div class="mb-3 quote-icon"><i class="opacity-25 fas fa-quote-left text-success fa-2x"></i>
                            </div>
                            <p class="mb-4 text-muted small">"Dr. Runa Akter Dola is one of the most caring doctors I've
                                ever met. She explains everything clearly and gives you confidence throughout your
                                treatment."</p>
                            <div class="mb-3 stars text-warning">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="m-0 fw-bold">Sadia Rahman</h6>
                                    <small class="text-muted">Green Life Hospital, Dhaka</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 swiper-pagination"></div>
            </div>
        </div>
    </section>


    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-5 text-center fw-bold" data-aos="fade-up">My Qualification and Awards</h2>

            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="qualification-list">
                        <div
                            class="p-3 mb-3 bg-white border-4 shadow-sm q-item d-flex align-items-center rounded-3 border-start border-success">
                            <img src="{{asset('frontend/image/about/about-One.jpg')}}" class="rounded shadow-sm me-3"
                                style="width: 70px; height: 70px; object-fit: cover;" alt="College">
                            <div class="flex-grow-1 border-end pe-3">
                                <h6 class="mb-0 fw-bold">Dhaka Medical College</h6>
                                <small class="text-muted">Jan 2014 - Dec 2018</small>
                            </div>
                            <div class="ps-3">
                                <small class="text-muted">MBBS (Bachelor of Medicine, Bachelor of Surgery)</small>
                            </div>
                        </div>
                        <div
                            class="p-3 mb-3 bg-white border-4 shadow-sm q-item d-flex align-items-center rounded-3 border-start border-success">
                            <img src="{{asset('frontend/image/about/about-One.jpg')}}" class="rounded shadow-sm me-3"
                                style="width: 70px; height: 70px; object-fit: cover;" alt="College">
                            <div class="flex-grow-1 border-end pe-3">
                                <h6 class="mb-0 fw-bold">Dhaka Medical College</h6>
                                <small class="text-muted">Jan 2014 - Dec 2018</small>
                            </div>
                            <div class="ps-3">
                                <small class="text-muted">MBBS (Bachelor of Medicine, Bachelor of Surgery)</small>
                            </div>
                        </div>
                        <div
                            class="p-3 mb-3 bg-white border-4 shadow-sm q-item d-flex align-items-center rounded-3 border-start border-success">
                            <img src="{{asset('frontend/image/about/about-One.jpg')}}" class="rounded shadow-sm me-3"
                                style="width: 70px; height: 70px; object-fit: cover;" alt="College">
                            <div class="flex-grow-1 border-end pe-3">
                                <h6 class="mb-0 fw-bold">Dhaka Medical College</h6>
                                <small class="text-muted">Jan 2014 - Dec 2018</small>
                            </div>
                            <div class="ps-3">
                                <small class="text-muted">MBBS (Bachelor of Medicine, Bachelor of Surgery)</small>
                            </div>
                        </div>
                        <div
                            class="p-3 mb-3 bg-white border-4 shadow-sm q-item d-flex align-items-center rounded-3 border-start border-success">
                            <img src="{{asset('frontend/image/about/about-One.jpg')}}" class="rounded shadow-sm me-3"
                                style="width: 70px; height: 70px; object-fit: cover;" alt="College">
                            <div class="flex-grow-1 border-end pe-3">
                                <h6 class="mb-0 fw-bold">Dhaka Medical College</h6>
                                <small class="text-muted">Jan 2014 - Dec 2018</small>
                            </div>
                            <div class="ps-3">
                                <small class="text-muted">MBBS (Bachelor of Medicine, Bachelor of Surgery)</small>
                            </div>
                        </div>
                        <div
                            class="p-3 mb-3 bg-white border-4 shadow-sm q-item d-flex align-items-center rounded-3 border-start border-success">
                            <img src="{{asset('frontend/image/about/about-One.jpg')}}" class="rounded shadow-sm me-3"
                                style="width: 70px; height: 70px; object-fit: cover;" alt="College">
                            <div class="flex-grow-1 border-end pe-3">
                                <h6 class="mb-0 fw-bold">Dhaka Medical College</h6>
                                <small class="text-muted">Jan 2014 - Dec 2018</small>
                            </div>
                            <div class="ps-3">
                                <small class="text-muted">MBBS (Bachelor of Medicine, Bachelor of Surgery)</small>
                            </div>
                        </div>
                        <div
                            class="p-3 mb-3 bg-white border-4 shadow-sm q-item d-flex align-items-center rounded-3 border-start border-success">
                            <img src="{{asset('frontend/image/about/about-One.jpg')}}" class="rounded shadow-sm me-3"
                                style="width: 70px; height: 70px; object-fit: cover;" alt="College">
                            <div class="flex-grow-1 border-end pe-3">
                                <h6 class="mb-0 fw-bold">Dhaka Medical College</h6>
                                <small class="text-muted">Jan 2014 - Dec 2018</small>
                            </div>
                            <div class="ps-3">
                                <small class="text-muted">MBBS (Bachelor of Medicine, Bachelor of Surgery)</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    
                </div>
            </div>
        </div>
    </section>
@endsection
