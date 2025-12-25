<section class="py-5 overflow-hidden bg-white about-area" id="about"
    style="background: url({{ asset('frontend/image/about_bg.svg') }})">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="about-image-wrapper position-relative" data-aos="fade-right">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="mb-3 img-box bounce-animation">
                                <img src="{{ asset('frontend/image/about/about-One.jpg') }}"
                                    alt="Dr. Runa Akter Consulting Patient" class="shadow-sm img-fluid rounded-4">
                            </div>
                            <div class="img-box bounce-animation-delay">
                                <img src="{{ asset('frontend/image/about/service_image.jpg') }}"
                                    alt="Medical Treatment at Clinic" class="shadow-sm img-fluid rounded-4">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="img-box main-img bounce-animation">
                                <img src="{{ asset('frontend/image/about/about_two.png') }}"
                                    alt="Dr. Runa Akter Dhola - OBGYN Specialist"
                                    class="shadow-lg img-fluid rounded-4 h-100 object-fit-cover">
                            </div>
                        </div>
                    </div>

                    <div class="video-promotion-wrap">
                        <div class="circle-rotating-text">
                            <svg viewBox="0 0 100 100" width="150" height="150">
                                <defs>
                                    <path id="circlePath"
                                        d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0 " />
                                </defs>
                                <text fill="#198754" font-weight="bold" font-size="9">
                                    <textPath xlink:href="#circlePath">
                                        SINCE 2025 • 24 HOURS SOLUTION • SINCE 2025 •
                                    </textPath>
                                </text>
                            </svg>
                            <button type="button" class="shadow-lg play-btn-inner" data-bs-toggle="modal"
                                data-bs-target="#videoModal" aria-label="Watch Introduction Video">
                                <i class="fas fa-play"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-down">
                <div class="about-content">
                    <span class="text-success fw-bold text-uppercase ls-2">About Me</span>
                    <h2 class="mt-2 mb-4 display-5 fw-bold text-dark">{{ config('settings.name') }} <span
                            style="font-size: 12px;
  display: block;
  font-weight: normal;
  background: #198754;
  color: #fff;
  padding: 5px;
  border-radius: 3px;
  width: fit-content;">{{ config('settings.degree') }}</span>
                    </h2>
                    <p class="mb-4 text-secondary lead-sm">
                        I'm Dr. Runa Akter Dhola, a specialized OBGYN with a passion for providing holistic,
                        evidence-based medical care. Committed to serving women with excellence for over 18 years.
                    </p>

                    <div class="mb-4 row g-3">
                        <div class="col-sm-6">
                            <ul class="list-unstyled checklist">
                                <li><i class="fas fa-check-circle text-primary"></i> Monthly Checkups</li>
                                <li><i class="fas fa-check-circle text-primary"></i> Caring & Support Always</li>
                                <li><i class="fas fa-check-circle text-primary"></i> Proactive and Fast Results</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled checklist">
                                <li><i class="fas fa-check-circle text-primary"></i> Specialized Consultation</li>
                                <li><i class="fas fa-check-circle text-primary"></i> Advanced Diagnostics</li>
                                <li><i class="fas fa-check-circle text-primary"></i> Complete Care Solutions</li>
                            </ul>
                        </div>
                    </div>

                    <a href="{{ route('about') }}" class="read-more-link fw-bold text-primary text-decoration-none">
                        Read More <span class="arrow-wrap"><i class="fas fa-arrow-up-right-from-square"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="bg-transparent border-0 modal-content">
            <div class="p-0 border-0 modal-header">
                <button type="button" class="mb-2 btn-close btn-close-white ms-auto" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="p-0 modal-body">
               <div class="overflow-hidden border border-white shadow-lg ratio ratio-16x9 rounded-4 border-5">
    @php
        // YouTube URL theke ID ber korar logic
        $url = config('settings.youtube_video');
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        $video_id = $match[1] ?? null;
    @endphp

    @if($video_id)
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
    </div>
</div>
