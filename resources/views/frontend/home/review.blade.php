<section class="py-5 overflow-hidden review-section">
    <div class="container">
        <div class="flex-wrap mb-5 d-flex justify-content-between align-items-end" data-aos="fade-up">
            <div class="d-none d-md-block"></div>

            <div class="text-center reveiwbutton">
                <h2 class="fw-bold display-6">What Patients Are Saying!</h2>
                <div class="mx-auto mt-2 divider bg-success" style="width: 60px; height: 4px;"></div>
            </div>

            <div>
                <button class="client_review_btn" data-bs-toggle="modal" data-bs-target="#reviewModal">
                    Write a Review
                    <span class="btn-ring"></span>
                </button>
            </div>
        </div>

        <div class="modal fade" id="reviewModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="border-0 shadow-lg modal-content">
                    <div class="text-white modal-header bg-success">
                        <h5 class="modal-title">Share Your Experience</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="p-4 modal-body">
                        <form id="reviewForm">
                            @csrf
                            <div id="reviewMessage"></div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="text" name="name" class="form-control custom-input"
                                    placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Workplace</label>
                                <input type="text" name="workplace" class="form-control custom-input"
                                    placeholder="e.g. Dhaka College">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Your Message</label>
                                <textarea class="form-control custom-input" name="message" rows="4" placeholder="How was your experience?"
                                    required></textarea>
                            </div>

                            <button type="submit" id="reviewSubmitBtn"
                                class="py-2 shadow-sm btn btn-success w-100 fw-bold">
                                <span id="btnText">Submit Review</span>
                                <span id="btnSpinner" class="spinner-border spinner-border-sm d-none"
                                    role="status"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-4 swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($review as $data)
                    <div class="swiper-slide">
                        <div class="p-4 bg-white border shadow-sm review-card rounded-4">
                            <div class="mb-3 quote-icon"><i class="opacity-25 fas fa-quote-left text-success fa-2x"></i>
                            </div>
                            <p class="mb-4 text-muted small">{{$data->description}}</p>
                            <div class="mb-3 stars text-warning">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="m-0 fw-bold">{{$data->name}}</h6>
                                    <small class="text-muted">{{$data->workplace}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5 swiper-pagination"></div>
        </div>
    </div>
</section>
