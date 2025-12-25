<section class="py-5 overflow-hidden experience-area bg-light" id="experience" aria-labelledby="exp-title">
    <div class="container">
        <header class="mb-5 text-center" data-aos="fade-up">
            <h2 id="exp-title" class="fw-bold display-6 text-dark">
                Professional <span class="text-success">Experience</span>
            </h2>
            <div class="mx-auto mt-2 header-underline bg-success"
                 style="width: 70px; height: 4px; border-radius: 10px;"
                 role="presentation">
            </div>
        </header>

        <div class="row g-4 justify-content-center">
            @forelse($experience as $index => $data)
                <article class="col-lg-4 col-md-6"
                         data-aos="fade-up"
                         data-aos-delay="{{ ($index + 1) * 100 }}"
                         itemscope itemtype="https://schema.org/Organization">

                    <div class="p-4 text-center bg-white border-0 shadow-sm experience-card h-100 rounded-4 transition-hover">

                        <figure class="mx-auto mb-4 overflow-hidden shadow-sm hospital-logo-box rounded-3"
                                style="width: 100px; height: 100px;">
                            <img src="{{ $data->logo ? asset($data->logo) : asset('frontend/image/placeholder-hospital.jpg') }}"
                                 alt="{{ $data->name }} - {{ $data->department }}"
                                 class="img-fluid w-100 h-100 object-fit-cover"
                                 itemprop="logo"
                                 loading="lazy">
                        </figure>

                        <h3 class="mb-1 h5 fw-bold text-dark" itemprop="name">
                            {{ $data->name }}
                        </h3>

                        <p class="mb-2 text-success small fw-bold">
                            {{ $data->department }}
                        </p>

                        <div class="mb-3 text-muted d-block small">
                            <i class="far fa-calendar-alt me-1"></i>
                            <time>{{ $data->session }}</time>
                        </div>

                        <p class="mb-0 text-secondary small" itemprop="description">
                            {{ Str::limit($data->description, 150) }}
                        </p>
                    </div>
                </article>
            @empty
                <div class="text-center col-12">
                    <p class="italic text-muted">Experience records are being updated...</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<style>
    .experience-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .experience-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .hospital-logo-box {
        border: 2px solid #f8f9fa;
        background: #fff;
    }
</style>
