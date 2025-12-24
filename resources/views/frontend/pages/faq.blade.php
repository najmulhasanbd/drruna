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

                        @forelse ($faqs as $key => $data)
                            <div class="mb-3 accordion-item" data-aos="fade-up" data-aos-delay="200">
                                <h2 class="accordion-header">
                                    <button class="accordion-button {{ $key == 0 ? '' : 'collapsed' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-{{ $key }}">
                                        {{ $data->question }}
                                    </button>
                                </h2>

                                <div id="faq-{{ $key }}"
                                    class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body text-muted">
                                        {{ $data->answer }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No FAQ available.</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
