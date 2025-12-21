@extends('frontend.layouts.master')
@section('title')
    FAQs Page || Dr Runa Akter Dola
@endsection
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center col-lg-8 content-box">
                    <h1 class="breadcrumb-title animate-up">Faqs</h1>

                    <p class="breadcrumb-desc animate-up">
                        I'm Dr. Runa Akhter Dhola a [Specialization, e.g., Internal Medicine Specialist]
                        with a passion for providing holistic, evidence-based medical care.
                    </p>

                    <nav aria-label="breadcrumb" class="animate-up">
                        <ol class="breadcrumb custom-breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 faq-section">
        <div class="container">
            <div class="mb-5 text-center" data-aos="fade-up">
                <h2 class="fw-bold">Have Any Questions?</h2>
                <p class="text-muted">Find below our frequently asked questions. If you have other questions please contact
                    me.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion custom-accordion" id="faqAccordion">

                        <div class="mb-3 accordion-item" data-aos="fade-up" data-aos-delay="100">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1">
                                    What do we treat?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Common health issue Ask anything you would normally ask your GP. You can have an instant
                                    video with one of our GPs via a digital consultation from anywhere, at any time of
                                    day...
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2">
                                    How does it work?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Our process is simple. You book an appointment, connect via video call, and receive your
                                    prescription or advice digitally.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq3">
                                    How does it work?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Our process is simple. You book an appointment, connect via video call, and receive your
                                    prescription or advice digitally.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq4">
                                    How does it work?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Our process is simple. You book an appointment, connect via video call, and receive your
                                    prescription or advice digitally.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq5">
                                    How does it work?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Our process is simple. You book an appointment, connect via video call, and receive your
                                    prescription or advice digitally.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq6">
                                    How does it work?
                                </button>
                            </h2>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Our process is simple. You book an appointment, connect via video call, and receive your
                                    prescription or advice digitally.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq7">
                                    How does it work?
                                </button>
                            </h2>
                            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Our process is simple. You book an appointment, connect via video call, and receive your
                                    prescription or advice digitally.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq8">
                                    How does it work?
                                </button>
                            </h2>
                            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Our process is simple. You book an appointment, connect via video call, and receive your
                                    prescription or advice digitally.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
