@extends('frontend.layouts.master')
@section('title')
    Service Page || Dr Runa Akter Dola
@endsection
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center col-lg-8 content-box">
                    <h1 class="breadcrumb-title animate-up">Services</h1>

                    <p class="breadcrumb-desc animate-up">
                        I'm Dr. Runa Akhter Dhola a [Specialization, e.g., Internal Medicine Specialist]
                        with a passion for providing holistic, evidence-based medical care.
                    </p>

                    <nav aria-label="breadcrumb" class="animate-up">
                        <ol class="breadcrumb custom-breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
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
                            <a href="mailto:test@gmail.com" class="px-5 shadow btn btn-primary btn-lg rounded-pill bookappoinment">
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
                            <a href="mailto:test@gmail.com" class="px-4 btn btn-success rounded-pill">BOOK AN
                                APPOINMENT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
