<section class="feature-section" aria-labelledby="feature-heading">
    <div class="container">
        <div class="row g-4">
            @foreach ($featured as $index => $feature)
                <article class="col-lg-4 col-md-6"
                         data-aos="fade-up"
                         data-aos-delay="{{ $index * 100 }}">

                    <div class="p-4 border-0 shadow-sm feature-card h-100">
                        <div class="mb-3 icon-circle" aria-hidden="true">
                            {!! $feature->icon !!}
                        </div>

                        <div class="feature-content">
                            <h3 class="mb-1 feature-number h2 fw-bold">
                                {{ $feature->number ?? '0' }}
                            </h3>

                            <p class="feature-label text-muted fw-semibold">
                                {{ $feature->title ?? 'Feature Title' }}
                            </p>
                        </div>

                        <div class="mt-3 card-indicator"></div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
