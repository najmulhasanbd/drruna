@extends('frontend.layouts.master')
@section('title')
    Gallery Page || Dr Runa Akter Dola
@endsection
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center col-lg-8 content-box">
                    <h1 class="breadcrumb-title animate-up">Gallery</h1>

                    <p class="breadcrumb-desc animate-up">
                        I'm Dr. Runa Akhter Dhola a [Specialization, e.g., Internal Medicine Specialist]
                        with a passion for providing holistic, evidence-based medical care.
                    </p>

                    <nav aria-label="breadcrumb" class="animate-up">
                        <ol class="breadcrumb custom-breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 gallery-area bg-light">
        <div class="container">
            <div class="mb-5 text-center">
                <h2 class="fw-bold">Our Medical Gallery</h2>
                <div class="mx-auto divider bg-primary" style="width: 60px; height: 3px;"></div>
            </div>

            <div id="gallery-container" class="row g-4 popup-gallery">
                @forelse ($gallery as $data)
                    <div class="col-lg-4 col-md-6 col-6 gallery-item">
                        <div class="overflow-hidden border-0 shadow-sm gallery-card rounded-3">
                            <a href="{{ asset($data->image) }}" title="Gallery Image">
                                <img src="{{ asset($data->image) }}" class="img-fluid gallery-img w-100" alt="Clinic"
                                    loading="lazy">
                            </a>
                        </div>
                    </div>
                @empty
                    <p>No images found.</p>
                @endforelse
            </div>
            <div class="mt-4 d-flex justify-content-center">
                {{ $gallery->links() }}
            </div>
        </div>
    </section>
@endsection
