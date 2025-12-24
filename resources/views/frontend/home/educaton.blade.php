    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-5 text-center fw-bold" data-aos="fade-up">My Qualification and Awards</h2>

            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="qualification-list">
                        @forelse ($educations as $data)
                            <div
                                class="p-3 mb-3 bg-white border-4 shadow-sm q-item d-flex align-items-center rounded-3 border-start border-success">
                                {{-- Dynamic Logo/Image --}}
                                <img src="{{ $data->logo ? asset($data->logo) : asset('frontend/image/default-college.jpg') }}"
                                    class="rounded shadow-sm me-3" style="width: 70px; height: 70px; object-fit: cover;"
                                    alt="{{ $data->name }}">

                                <div class="flex-grow-1 border-end pe-3">
                                    {{-- Dynamic Institute Name --}}
                                    <h6 class="mb-0 fw-bold">{{ $data->name }}</h6>
                                    {{-- Dynamic Session --}}
                                    <small class="text-muted">{{ $data->session }}</small>
                                </div>

                                <div class="ps-3">
                                    {{-- Dynamic Degree --}}
                                    <small class="text-secondary fw-medium">{{ $data->degree }}</small>
                                </div>
                            </div>
                        @empty
                            <div class="p-4 text-center border rounded bg-light">
                                <p class="mb-0 text-muted">No education records found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up-right">
                    <div class="mb-4 tab-content award-content-box" id="pills-tabContent">
                        <div class="p-5 text-center border rounded tab-pane fade show active" id="pills-lasker"
                            role="tabpanel">
                            <img src="{{ asset('frontend/image/about/about-One.jpg') }}" alt="Icon"
                                class="mb-3 award_photo" style="width: 80px;">
                            <h3>Lasker Award</h3>
                            <p class="text-muted">In 1945 Albert Lasker and Mary Woodard Lasker created the Lasker
                                Awards. Every year since then the award has been given to the living person considered
                                to have made the greatest contribution to medical science...</p>
                        </div>
                        <div class="p-5 text-center border rounded tab-pane fade" id="pills-medawar" role="tabpanel">
                            <img src="{{ asset('frontend/image/about/about-One.jpg') }}" alt="Icon"
                                class="mb-3 award_photo" style="width: 80px;">
                            <h3>Lasker Award</h3>
                            <p class="text-muted">In 1945 Albert Lasker and Mary Woodard Lasker created the Lasker
                                Awards. Every year since then the award has been given to the living person considered
                                to have made the greatest contribution to medical science...</p>
                        </div>
                        <div class="p-5 text-center border rounded tab-pane fade" id="pills-aronson" role="tabpanel">
                            <img src="{{ asset('frontend/image/about/about-One.jpg') }}" alt="Icon"
                                class="mb-3 award_photo" style="width: 80px;">
                            <h3>Lasker Award</h3>
                            <p class="text-muted">In 1945 Albert Lasker and Mary Woodard Lasker created the Lasker
                                Awards. Every year since then the award has been given to the living person considered
                                to have made the greatest contribution to medical science...</p>
                        </div>
                    </div>

                    <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#pills-lasker"
                                type="button" role="tab">
                                <div class="tab-icon">🏆</div>
                                <span>Lasker Award</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-medawar"
                                type="button" role="tab">
                                <div class="tab-icon">🏅</div>
                                <span>Medawar Medal</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-aronson"
                                type="button" role="tab">
                                <div class="tab-icon">⭐</div>
                                <span>Aronson Prize</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-medawar"
                                type="button" role="tab">
                                <div class="tab-icon">🏅</div>
                                <span>Medawar Medal</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-aronson"
                                type="button" role="tab">
                                <div class="tab-icon">⭐</div>
                                <span>Aronson Prize</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
