@extends('frontend.layouts.master')
@section('title', 'Expert Health Guidance Videos | Dr. Runa Akter Dola')

@section('content')

    <section class="overflow-hidden breadcrumb-area position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center col-lg-8 content-box">
                    <span class="video-badge" data-aos="fade-down">Media Library</span>
                    <h1 class="breadcrumb-title animate-up">Educational Videos</h1>
                    <p class="breadcrumb-desc animate-up">
                        Expert insights on Feto-Maternal medicine, high-risk pregnancy care, and women's wellness by
                        <strong>Dr. Runa Akter Dola</strong>.
                    </p>
                    <nav aria-label="breadcrumb" class="animate-up">
                        <ol class="breadcrumb custom-breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Youtube Videos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light video-gallery-section" id="video-grid">
        <div class="container">
            <div class="mb-5 text-center row justify-content-center">
                <div class="col-lg-7" data-aos="fade-up">
                    <span class="text-success fw-bold text-uppercase ls-2">Health Awareness</span>
                    <h2 class="mt-2 display-5 fw-bold text-dark">Visual <span class="text-success">Resources</span></h2>
                    <div class="mx-auto mb-4 header-line"></div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="video-card-pure">
                        <div class="video-inner">
                            <iframe src="https://www.youtube.com/embed/flr3QfrM6XI" loading="lazy"
                                title="Dr. Runa Akter Dola - Video 1" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="video-card-pure">
                        <div class="video-inner">
                            <iframe src="https://www.youtube.com/embed/flr3QfrM6XI" loading="lazy"
                                title="Dr. Runa Akter Dola - Video 2" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
