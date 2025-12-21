@extends('frontend.layouts.master')
@section('title')
    About Page || Dr Runa Akter Dola
@endsection
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center col-lg-8 content-box">
                    <h1 class="breadcrumb-title animate-up">About Dr. Runa Akhter Dola</h1>

                    <p class="breadcrumb-desc animate-up">
                        I'm Dr. Runa Akhter Dhola a [Specialization, e.g., Internal Medicine Specialist]
                        with a passion for providing holistic, evidence-based medical care.
                    </p>

                    <nav aria-label="breadcrumb" class="animate-up">
                        <ol class="breadcrumb custom-breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Me</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 dr-about-section" id="about-doctor">
        <div class="container py-lg-5">

            <div class="mb-5 row align-items-center pb-lg-4">
                <div class="mb-4 col-lg-5 mb-lg-0" data-aos="fade-right">
                    <div class="p-2 overflow-hidden bg-white shadow-lg doctor-image-container rounded-4">
                        <img src="{{ asset('frontend/image/about/about-One.jpg') }}"
                            alt="Dr. Runa Akhter Dola - High Risk Pregnancy & Foetal Medicine Specialist"
                            class="img-fluid rounded-3 w-100" loading="lazy">

                        <div class="p-3 text-center text-white shadow doc-badge bg-success rounded-3" data-aos="zoom-in"
                            data-aos-delay="400">
                            <p class="mb-0 text-white fw-bold h4">18+ Years</p>
                            <p class="mb-0 small text-white-50">of Dedicated Service</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 ps-lg-5" data-aos="fade-left">
                    <h6 class="mb-2 tracking-wide text-primary fw-bold text-uppercase">Expert Physician</h6>
                    <h1 class="mb-3 display-5 fw-bold">Dr. Runa Akhter Dola</h1>
                    <p class="mb-4 h4 text-success fw-semibold">High Risk Pregnancy & Foetal Medicine Specialist</p>

                    <p class="mb-4 text-muted lead">
                        Dr. Runa Akhter Dola is a distinguished 25th BCS Health Cadre officer serving the Government of
                        Bangladesh for over 18 years. She has dedicated the last 11 years as a specialist doctor and 12
                        years as an OBGYN consultant, focusing on maternal and fetal health excellence.
                    </p>

                    <div class="p-3 shadow-sm current-role bg-light rounded-4 border-start border-success border-5">
                        <p class="mb-0"><strong>Former Position:</strong> Assistant Professor of OBGYN at Sir Salimullah
                            Medical College and Mitford Hospital.</p>
                    </div>
                </div>
            </div>

            <div class="mb-5 row g-4">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-4 border-0 shadow-sm card h-100 rounded-4 academic-card">
                        <div class="mb-3 card-icon bg-primary-soft">
                            <i class="bi bi-mortarboard fs-3 text-primary"></i>
                        </div>
                        <h3 class="mb-4 fw-bold">Academic Excellence</h3>
                        <ul class="list-unstyled timeline-list">
                            <li><strong>MBBS:</strong> Sir Salimullah Medical College (9th Merit position in 1st
                                Professional Exam).</li>
                            <li><strong>FCPS:</strong> Obstetrics and Gynaecology.</li>
                            <li><strong>FCPS:</strong> Feto-Maternal Medicine.</li>
                            <li><strong>Fellowship:</strong> Community Fellowship (Philippines).</li>
                            <li><strong>Schooling:</strong> SSC & HSC from Mymensingh Girls Cadet College.</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-4 text-white border-0 shadow-sm card h-100 rounded-4 achievement-card bg-dark">
                        <div class="mb-3 card-icon bg-white-soft">
                            <i class="bi bi-award fs-3 text-warning"></i>
                        </div>
                        <h3 class="mb-4 text-white fw-bold">Achievements & Mastery</h3>
                        <ul class="list-unstyled custom-check-list">
                            <li class="mb-3 text-white-50"><i class="bi bi-check-circle-fill text-success me-2"></i>
                                National Master Trainer on MCCoD (Medical Certification of Cause of Death).</li>
                            <li class="mb-3 text-white-50"><i class="bi bi-check-circle-fill text-success me-2"></i>
                                National Master Trainer on SMoL (Start up Mortality List).</li>
                            <li class="mb-3 text-white-50"><i
                                    class="bi bi-check-circle-fill text-success me-2 text-warning"></i> <strong>SS Ratnam
                                    Young Gynaecology Award 2019:</strong> Prestigious recognition from AOFOG for social
                                research contribution.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <iframe width="100%" height="600" src="https://www.youtube.com/embed/flr3QfrM6XI?si=hB9SEGWnf597jhjL"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

            <div class="row" data-aos="fade-up">
                <div class="col-12">
                    <div class="p-5 text-center text-white shadow-lg cta-box rounded-5 bg-success">
                        <h2 class="mb-3 text-white">Commitment to Women's Health</h2>
                        <p class="mb-4 text-white-50">Expert care for complicated pregnancies and specialized fetal
                            medicine.</p>
                        <div class="flex-wrap gap-3 d-flex justify-content-center">
                            <a href="tel:+880" class="px-5 btn btn-light btn-lg rounded-pill fw-bold">Call for
                                Appointment</a>
                            <a href="#contact" class="px-5 btn btn-outline-light btn-lg rounded-pill">Contact Online</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
