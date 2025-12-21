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
