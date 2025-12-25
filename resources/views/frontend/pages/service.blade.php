@extends('frontend.layouts.master')
@section('title')
    Service Page || {{ config('settings.name') }}
@endsection
@section('meta')
    <meta name="description"
        content="Comprehensive gynecological and obstetric services by {{ config('settings.name') }}. বিশেষজ্ঞ গাইনি ও প্রসূতি সেবা, নরমাল ডেলিভারি এবং বন্ধ্যাত্ব চিকিৎসার নির্ভরযোগ্য কেন্দ্র।">
    <meta name="keywords"
        content="Gynecology Services, Maternity Care, Dr. {{ config('settings.name') }}, Infertility Treatment, C-Section, Normal Delivery, Laparoscopic Surgery, গাইনি চিকিৎসা, সিজারিয়ান অপারেশন, জরায়ু সমস্যা">
    <meta name="author" content="{{ config('settings.name') }}">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Specialized Medical Services - {{ config('settings.name') }}">
    <meta property="og:description"
        content="Providing advanced healthcare for women. From pregnancy care to complex surgeries, get expert medical support.">
    <meta property="og:image" content="{{ asset(config('settings.logo')) }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Our Services | {{ config('settings.name') }}">
    <meta name="twitter:description" content="Explore our wide range of women's health and maternity services.">

    <meta name="geo.region" content="BD">
    <meta name="geo.placename" content="Dhaka">
@endsection
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center col-lg-8 content-box">
                    <h1 class="breadcrumb-title animate-up">Services</h1>

                    <p class="breadcrumb-desc animate-up">
                        {{ config('settings.name') }} a [Specialization, e.g., Internal Medicine Specialist]
                        with a passion for providing holistic, evidence-based medical care.
                    </p>

                    <nav aria-label="breadcrumb" class="animate-up">
                        <ol class="breadcrumb custom-breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white service-section" id="services">
        <div class="container">
            @if ($services->count() > 0)
                <div class="mb-5 text-center row justify-content-center">
                    <div class="col-lg-7" data-aos="fade-up">
                        <span class="text-success fw-bold text-uppercase ls-2">What I Provide</span>
                        <h2 class="mt-2 display-5 fw-bold text-dark">Expert Medical <span
                                class="text-success">Services</span>
                        </h2>
                        <div class="mx-auto mb-4 header-line"></div>
                        <p class="text-muted">Specialized medical care focusing on high-risk pregnancy, fetal medicine, and
                            gynecological excellence with over {{ config('settings.experience') ?? '' }} of experience.</p>
                    </div>
                </div>
            @endif

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
                    <div class="py-5 text-center col-12">
                        <div class="empty-state">
                            <i class="mb-3 far fa-images text-muted" style="font-size: 80px; opacity: 0.3;"></i>
                            <h4 class="text-secondary fw-bold">No Moments Captured Yet</h4>
                            <p class="text-muted">Our Service is currently being updated. Please check back later.</p>
                            <a href="{{ url('/') }}" class="px-4 mt-2 btn btn-primary rounded-pill">Back to Home</a>
                        </div>
                    </div>
                @endforelse


                <div class="mt-5 col-lg-12" data-aos="zoom-in">
                    <div
                        class="p-5 overflow-hidden text-white cta-banner-dark rounded-5 d-flex align-items-center justify-content-between position-relative">
                        <div class="cta-content position-relative z-2">
                            <h2 class="mb-3 display-6 fw-bold">I Provide Best <br> Medical Treatment.</h2>
                            <p class="mb-4 opacity-75 lead">{{ config('settings.name') ?? 'Dr Runa Akter Dola' }}:
                                Dedicated, Highly Experienced & Compassionate.
                            </p>
                            <a href="mailto:{{ config('settings.email') ?? '' }}"
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
@endsection
