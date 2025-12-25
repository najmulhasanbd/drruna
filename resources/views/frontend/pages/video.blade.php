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
                @forelse ($youtube as $video)
                    <div class="col-md-6" data-aos="fade-up">
                        <div class="video-card-pure">
                            <div class="video-inner">
                                @php
                                    $videoId = '';
                                    if (
                                        preg_match(
                                            '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                                            $video->url,
                                            $match,
                                        )
                                    ) {
                                        $videoId = $match[1];
                                    }
                                @endphp

                                @if ($videoId)
                                    <iframe src="https://www.youtube.com/embed/{{ $videoId }}" loading="lazy"
                                        title="Video {{ $loop->iteration }}" allowfullscreen>
                                    </iframe>
                                @else
                                    <p class="text-danger">Invalid Video URL</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                  <div class="py-5 text-center col-12">
                        <div class="empty-state">
                            <i class="mb-3 far fa-images text-muted" style="font-size: 80px; opacity: 0.3;"></i>
                            <h4 class="text-secondary fw-bold">No Moments Captured Yet</h4>
                            <p class="text-muted">Our Video Gallery is currently being updated. Please check back later.</p>
                            <a href="{{ url('/') }}" class="px-4 mt-2 btn btn-primary rounded-pill">Back to Home</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
