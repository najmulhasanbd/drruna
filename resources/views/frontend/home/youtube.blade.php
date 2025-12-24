<section class="py-5 overflow-hidden experience-area bg-light" id="experience">
    <div class="container">
        <header class="mb-5 text-center" data-aos="fade-up">
            <h2 class="fw-bold display-6 text-dark">Video <span class="text-success">Gallery</span></h2>
            <div class="mx-auto mt-2 header-underline bg-success" style="width: 70px; height: 4px; border-radius: 10px;">
            </div>
            <div class="moreVideo"><a href="{{ route('video') }}" class="btn btn-success">More Video</a></div>
        </header>

        <div class="row g-3">
            @foreach ($youtube as $video)
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

                <div class="{{ $loop->first ? 'col-12' : 'col-md-6' }}" data-aos="fade-up"
                    data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="video-card-pure">
                        <div class="video-inner">
                            @if ($videoId)
                                <iframe src="https://www.youtube.com/embed/{{ $videoId }}" loading="lazy"
                                    title="Video {{ $loop->iteration }}" allowfullscreen>
                                </iframe>
                            @else
                                <p class="p-3 text-danger">Invalid Video URL</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
