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

                    @forelse ($chamber as $data)
                        <div class="mb-4 location-item">
                            <h5 class="text-success fw-bold"><i
                                    class="fas fa-map-marker-alt me-2"></i>{{ $data->name }}</h5>
                            <p class="text-muted ms-4">{{ $data->time }}</p>
                        </div>
                    @empty
                    @endforelse

                    <div class="pt-3 mt-4 border-top">
                        <a href="tel:{{ config('settings.mobile') }}" class="py-2 shadow-sm btn btn-success w-100 rounded-pill">
                            <i class="fas fa-phone-alt me-2"></i>Call for Appointment
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8" data-aos="fade">
                <div class="process-timeline ps-4">
                    <div class="mb-5 process-item position-relative" data-aos="fade-up">
                        <div class="shadow step-number">1</div>
                        <div class="ms-5 ps-3">
                            <h4 class="fw-bold">Book an Appointment</h4>
                            <p class="text-secondary">Schedule your consultation easily through phone or online
                                booking. Emergency and follow-up appointments are prioritized for expectant mothers.
                            </p>
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
