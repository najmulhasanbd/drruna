@extends('frontend.layouts.master')

@section('title')
    Faq Page | Best Gynecologist & Obstetrician | {{ config('settings.name') }}
@endsection

@section('meta')
    {{-- Primary Meta Tags --}}
    <meta name="description"
        content="Get expert answers to your pregnancy and gynecology questions by Dr. Runa Akter Dola. গর্ভবতী মায়ের যত্ন এবং গাইনি সমস্যার সঠিক সমাধান পেতে ডা. রুনা আক্তার দোলার পরামর্শ নিন।">
    <meta name="keywords"
        content="Gynecology FAQ, Pregnancy questions, Dr. Runa Akter Dola, Best Gynecologist in Bangladesh, বন্ধ্যাত্ব চিকিৎসা, গাইনি ডাক্তারের পরামর্শ, গর্ভাবস্থায় যত্ন, Normal delivery specialist in Dhaka">
    <meta name="author" content="Dr. Runa Akter Dola">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph / Facebook (Social Media SEO) --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Health FAQ & Advice | Dr. Runa Akter Dola | গাইনি ও প্রসূতি বিশেষজ্ঞ">
    <meta property="og:description"
        content="Expert answers to your health concerns. Frequently asked questions about maternity and gynecological care. আপনার স্বাস্থ্য জিজ্ঞাসা ও বিশেষজ্ঞ সমাধান।">
    <meta property="og:image" content="{{ asset(config('settings.logo')) }}">

    {{-- Twitter SEO --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="FAQ - Women's Health & Pregnancy | Dr. Runa Akter Dola">
    <meta name="twitter:description"
        content="Find reliable answers to common health questions for women and expecting mothers.">
    <meta name="twitter:image" content="{{ asset(config('settings.logo')) }}">

    {{-- Local SEO --}}
    <meta name="geo.region" content="BD">
    <meta name="geo.placename" content="Dhaka">
    <meta name="geo.position" content="23.8103;90.4125">
    <meta name="ICBM" content="23.8103, 90.4125">
@endsection

@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center col-lg-8 content-box">
                    <h1 class="breadcrumb-title animate-up">Faqs</h1>

                    <p class="breadcrumb-desc animate-up">
                        {{ config('settings.name') }} is a <strong>High-Risk Pregnancy & Fetal Medicine Specialist</strong>
                        with {{ config('settings.experience') }} of clinical expertise, providing evidence-based answers to your gynecological and
                        maternity health concerns.
                    </p>

                    <nav aria-label="breadcrumb" class="animate-up">
                        <ol class="breadcrumb custom-breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 faq-section">
        <div class="container">
            @if ($faqs->count() > 0)
                <div class="mb-5 text-center" data-aos="fade-up">
                    <h2 class="fw-bold">Have Any Questions?</h2>
                    <p class="text-muted">
                        Explore answers to common questions about pregnancy and gynecological health.
                        If you have specific concerns regarding high-risk maternity care, please feel free to
                        <a href="mailto:{{ config('settings.email') }}" class="text-primary fw-bold">contact me</a>
                        directly.
                    </p>
                </div>
            @endif

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
                            <div class="py-5 text-center col-12">
                                <div class="empty-state">
                                    <i class="mb-3 far fa-images text-muted" style="font-size: 80px; opacity: 0.3;"></i>
                                    <h4 class="text-secondary fw-bold">No Moments Captured Yet</h4>
                                    <p class="text-muted">Our FAQ is currently being updated. Please check back later.</p>
                                    <a href="{{ url('/') }}" class="px-4 mt-2 btn btn-primary rounded-pill">Back to
                                        Home</a>
                                </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
