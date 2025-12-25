@extends('frontend.layouts.master')
@section('title')
    About Page || {{ config('settings.name') }}
@endsection
@section('meta')
    <meta name="description"
        content="Comprehensive gynecological and obstetric services by {{ config('settings.name') }}. বিশেষজ্ঞ গাইনি ও প্রসূতি সেবা, নরমাল ডেলিভারি এবং বন্ধ্যাত্ব চিকিৎসার নির্ভরযোগ্য কেন্দ্র।">
    <meta name="keywords"
        content="Gynecology Services, Maternity Care, Dr. {{ config('settings.name') }}, Infertility Treatment, Normal Delivery, Laparoscopic Surgery, গাইনি চিকিৎসা, সিজারিয়ান অপারেশন, জরায়ু সমস্যা, বন্ধ্যাত্ব বিশেষজ্ঞ">
    <meta name="author" content="{{ config('settings.name') }}">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Specialized Healthcare Services - {{ config('settings.name') }}">
    <meta property="og:description"
        content="Expert medical services for women. Specialized in maternity care, infertility, and surgical procedures. নির্ভরযোগ্য গাইনি ও প্রসূতি সেবা।">
    <meta property="og:image" content="{{ asset(config('settings.logo')) }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Our Services | {{ config('settings.name') }}">
    <meta name="twitter:description" content="Explore advanced gynecological and obstetric treatments at our clinic.">

    <meta name="geo.region" content="BD">
    <meta name="geo.placename" content="Dhaka">
@endsection
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center col-lg-8 content-box">
                    <h1 class="breadcrumb-title animate-up">{{ config('settings.name') }}</h1>

                    <p class="breadcrumb-desc animate-up">
                        I'm <strong>{{ config('settings.name') }}</strong>, a specialist in <strong>High-Risk Pregnancy &
                            Feto-Maternal Medicine</strong>
                        with {{ config('settings.experience') }} years of experience, committed to providing holistic and
                        evidence-based clinical care.
                    </p>

                    <nav aria-label="breadcrumb" class="animate-up">
                        <ol class="breadcrumb custom-breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
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
                        <img src="{{ config('settings.aboutpagephoto') }}"
                            alt="{{ config('settings.name') ?? 'Dr. Runa Akhter Dola' }} - High Risk Pregnancy & Foetal Medicine Specialist"
                            class="img-fluid rounded-3 w-100" loading="lazy">

                        <div class="p-3 text-center text-white shadow doc-badge bg-success rounded-3" data-aos="zoom-in"
                            data-aos-delay="400">
                            <p class="mb-0 text-white fw-bold h4">{{ config('settings.experience') }}</p>
                            <p class="mb-0 small text-white-50">of Dedicated Service</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 ps-lg-5" data-aos="fade-down">
                    <h6 class="mb-2 tracking-wide text-primary fw-bold text-uppercase">Expert Physician</h6>
                    <h1 class="mb-3 display-5 fw-bold">{{ config('settings.name') }}</h1>
                    <p class="mb-4 h4 text-success fw-semibold">High Risk Pregnancy & Foetal Medicine Specialist</p>

                    <p class="mb-4 text-muted lead">
                        {!! config('settings.short_about') !!}
                    </p>

                    @if (config('settings.position'))
                        <div class="p-3 shadow-sm current-role bg-light rounded-4 border-start border-success border-5">
                            <p class="mb-0"><strong>Former Position:</strong>{{ config('settings.position') }}</p>
                        </div>
                    @endif
                </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="100">
                {!! config('settings.long_about') !!}
            </div>

            <div class="mb-5 row g-4">
                <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-4 border-0 shadow-sm card h-100 rounded-4 academic-card">
                        <div class="mb-3 card-icon bg-primary-soft">
                            <i class="bi bi-mortarboard fs-3 text-primary"></i>
                        </div>
                        <h3 class="mb-4 fw-bold">Academic Excellence</h3>
                        <ul class="list-unstyled timeline-list">
                            <li><strong>MBBS : </strong> {{ config('settings.MBBS') ??
                                'Sir Salimullah Medical College (9th Merit position in 1st Professional Exam).' }}
                            </li>
                            <li><strong>FCPS : </strong>
                                {{ config('settings.FCPS') ?? 'Obstetrics and Gynaecology, Feto-Maternal Medicine. ' }}
                            </li>
                            <li><strong>Fellowship : </strong>
                                {{ config('settings.Fellowship') ?? 'Community Fellowship (Philippines).' }} </li>
                            <li><strong>Schooling : </strong>
                                {{ config('settings.Schooling') ?? 'SSC & HSC from Mymensingh Girls Cadet College.' }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                <div class="video-card-pure">
                    <div class="video-inner">
                        @php
                            $url = config('settings.youtube_video');
                            preg_match(
                                '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                                $url,
                                $match,
                            );
                            $video_id = $match[1] ?? null;
                        @endphp

                        @if ($video_id)
                            <iframe src="https://www.youtube.com/embed/{{ $video_id }}?autoplay=1&mute=1"
                                title="Introduction Video"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        @else
                            <div class="text-white bg-dark d-flex align-items-center justify-content-center">
                                Invalid Video URL
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-5 row" data-aos="fade-up">
                <div class="col-12">
                    <div class="p-5 text-center text-white shadow-lg cta-box rounded-5 bg-success">
                        <h2 class="mb-3 text-white">Commitment to Women's Health</h2>
                        <p class="mb-4 text-white-50">Expert care for complicated pregnancies and specialized fetal
                            medicine.</p>
                        <div class="flex-wrap gap-3 d-flex justify-content-center">
                            <a href="tel:+{{ config('settings.mobile') }}"
                                class="px-5 btn btn-light btn-lg rounded-pill fw-bold">Call for
                                Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
