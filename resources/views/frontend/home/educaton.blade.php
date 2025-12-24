<section class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-5 text-center fw-bold" data-aos="fade-up">My Qualification and Awards</h2>

        <div class="row g-4">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="qualification-list">
                    @forelse ($educations as $data)
                        <div
                            class="p-3 mb-3 bg-white border-4 shadow-sm q-item d-flex align-items-center rounded-3 border-start border-success">

                            <img src="{{ $data->logo ? asset($data->logo) : asset('frontend/image/default-college.jpg') }}"
                                class="rounded shadow-sm me-3" style="width: 70px; height: 70px; object-fit: cover;"
                                alt="{{ $data->name }}">

                            <div class="flex-grow-1 border-end pe-3">

                                <h6 class="mb-0 fw-bold">{{ $data->name }}</h6>

                                <small class="text-muted">{{ $data->session }}</small>
                            </div>

                            <div class="ps-3">
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
                    @foreach ($award as $item)
                        <div class="p-5 text-center border rounded tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="pill-award-{{ $item->id }}" role="tabpanel">

                            <img src="{{ asset($item->logo) }}" alt="{{ $item->name }}" class="mb-3 award_photo"
                                style="width: 80px;">

                            <h3>{{ $item->name }}</h3>

                            <p class="text-muted">
                                {{ $item->description }}
                            </p>
                        </div>
                    @endforeach
                </div>

                <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                    @foreach ($award as $item)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill"
                                data-bs-target="#pill-award-{{ $item->id }}" type="button" role="tab">
                                <div class="tab-icon">
                                    <img src="{{ asset($item->logo) }}" alt="{{ $item->name }}"
                                        class="mb-3 award_photo" style="width: 80px;">
                                </div>
                                <span>{{ $item->name }}</span>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
