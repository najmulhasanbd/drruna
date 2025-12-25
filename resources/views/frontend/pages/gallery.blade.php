@extends('frontend.layouts.master')

@section('title')
    Medical Gallery | Best Gynecologist & Obstetrician | {{ config('settings.name') }}
@endsection

@section('meta')
    <meta name="description"
        content="Explore the medical gallery of {{ config('settings.name') }}, a leading Gynecologist & Obstetrician. View our advanced maternity care, surgical excellence, and women's health initiatives.">
    <meta name="keywords"
        content="Gynecologist Gallery, Maternity Care Photos, Dr. {{ config('settings.name') }}, Women's Health Clinic, Pregnancy Care, Laparoscopic Surgery Gallery, Best Gynae Doctor in Bangladesh">
    <meta name="author" content="{{ config('settings.name') }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Medical Excellence Gallery - {{ config('settings.name') }}">
    <meta property="og:description"
        content="Witness the visual journey of specialized women's healthcare, maternity services, and surgery success stories.">
    <meta property="og:image" content="{{ asset(config('settings.logo')) }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Medical Gallery | {{ config('settings.name') }}">
    <meta name="twitter:description" content="Specialized Gynecological and Obstetric care gallery.">

    <meta name="geo.region" content="BD">
    <meta name="geo.placename" content="Dhaka">
@endsection

@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center col-lg-8 content-box">
                    <h1 class="breadcrumb-title animate-up">Gallery</h1>

                    <p class="breadcrumb-desc animate-up">
                        {{ config('settings.name') }} a [Specialization, e.g., Internal Medicine Specialist]
                        with a passion for providing holistic, evidence-based medical care.
                    </p>

                    <nav aria-label="breadcrumb" class="animate-up">
                        <ol class="breadcrumb custom-breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 gallery-area bg-light">
        <div class="container">
            @if ($gallery->count() > 0)
                <div class="mb-5 text-center animate-up">
                    <h6 class="text-primary fw-bold text-uppercase spacing-wide" style="letter-spacing: 2px;">Visual Moments
                    </h6>
                    <h2 class="fw-bold display-6">Our Medical Gallery</h2>
                    <div class="mx-auto mt-2 divider bg-primary rounded-pill" style="width: 70px; height: 4px;"></div>
                </div>
            @endif

            <div id="gallery-container" class="row g-4 popup-gallery">
                @forelse ($gallery as $data)
                    <div class="col-lg-4 col-md-6 col-6 gallery-item">
                        <div class="overflow-hidden border-0 shadow-sm gallery-card rounded-4 position-relative">
                            <a href="{{ asset($data->image) }}" title="{{ config('settings.name') }}" class="img-popup">
                                <img src="{{ asset($data->image) }}" class="img-fluid gallery-img w-100"
                                    alt="{{ config('settings.name') }}" loading="lazy">
                                <div class="gallery-overlay">
                                    <i class="text-white fas fa-search-plus fs-3"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="py-5 text-center col-12">
                        <div class="empty-state">
                            <i class="mb-3 far fa-images text-muted" style="font-size: 80px; opacity: 0.3;"></i>
                            <h4 class="text-secondary fw-bold">No Moments Captured Yet</h4>
                            <p class="text-muted">Our gallery is currently being updated. Please check back later.</p>
                            <a href="{{ url('/') }}" class="px-4 mt-2 btn btn-primary rounded-pill">Back to Home</a>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="mt-5 d-flex justify-content-center custom-pagination">
                {{ $gallery->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection
