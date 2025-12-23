<section class="feature-section">
    <div class="container">
        <div class="row g-4">
            @foreach ($featured as $index => $feature)
                <article class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="shadow-sm feature-card h-100">
                        <div class="icon-circle">
                            {!! $feature->icon !!}
                        </div>
                        <span class="feature-number">{{ $feature->number }}</span>
                        <p class="feature-label">{{ $feature->title }}</p>
                        <div class="card-indicator"></div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
