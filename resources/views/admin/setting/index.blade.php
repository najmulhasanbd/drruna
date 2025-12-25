@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0">Website Settings</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="shadow-sm card">
                        <div class="text-white card-header bg-success">
                            <h5 class="mb-0 text-center">Settings Menu</h5>
                        </div>
                        <div class="nav flex-column nav-pills" id="settings-tab" role="tablist" aria-orientation="vertical">
                            <button class="py-3 nav-link active text-start border-bottom" id="general-tab"
                                data-bs-toggle="pill" data-bs-target="#general" type="button" role="tab">
                                <i class="fa fa-cog me-2"></i> General Info
                            </button>
                            <button class="py-3 nav-link text-start border-bottom" id="social-tab" data-bs-toggle="pill"
                                data-bs-target="#social" type="button" role="tab">
                                <i class="fa fa-share-alt me-2"></i> Social Media
                            </button>
                            <button class="py-3 nav-link text-start border-bottom" id="contact-tab" data-bs-toggle="pill"
                                data-bs-target="#contact" type="button" role="tab">
                                <i class="fa fa-envelope me-2"></i> Contact & Address
                            </button>
                            <button class="py-3 nav-link text-start border-bottom" id="profile-tab" data-bs-toggle="pill"
                                data-bs-target="#profile" type="button" role="tab">
                                <i class="fa fa-user me-2"></i> Experience & Degree
                            </button>
                            <button class="py-3 nav-link text-start" id="extra-tab" data-bs-toggle="pill"
                                data-bs-target="#extra" type="button" role="tab">
                                <i class="fa fa-play-circle me-2"></i> About Youtube Video
                            </button>
                            <button class="py-3 nav-link text-start" id="aboutphoto-tab" data-bs-toggle="pill"
                                data-bs-target="#aboutphoto" type="button" role="tab">
                                <i class="fa fa-users me-2"></i> About Photo
                            </button>
                            <button class="py-3 nav-link text-start" id="acadamy-tab" data-bs-toggle="pill"
                                data-bs-target="#acadamy" type="button" role="tab">
                                <i class="fa fa-users me-2"></i> Academic Excellence
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="p-4 shadow-sm tab-content card" id="settings-tabContent">
                        <div class="tab-pane fade show active" id="general" role="tabpanel">
                            <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data"
                                class="settings-form">
                                @csrf
                                <h4 class="pb-2 mb-4 text-success border-bottom">General Settings</h4>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Website Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ config('settings.name') }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Copyright Text</label>
                                        <input type="text" name="copyright" class="form-control"
                                            value="{{ config('settings.copyright') }}">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Logo</label>
                                        <input type="file" name="logo" class="mb-2 form-control">
                                        @if (config('settings.logo'))
                                            <div class="p-2 border rounded bg-light d-inline-block">
                                                <img src="{{ asset(config('settings.logo')) }}" alt="Logo"
                                                    style="height: 50px;">
                                                <small class="d-block text-muted">Current Logo</small>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Favicon</label>
                                        <input type="file" name="favicon" class="mb-2 form-control">
                                        @if (config('settings.favicon'))
                                            <div class="p-2 border rounded bg-light d-inline-block">
                                                <img src="{{ asset(config('settings.favicon')) }}" alt="Favicon"
                                                    style="height: 32px;">
                                                <small class="d-block text-muted">Current Favicon</small>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Short About</label>
                                        <textarea name="short_about" class="form-control summernote">{!! config('settings.short_about') !!}</textarea>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Long About</label>
                                        <textarea name="long_about" class="form-control summernote">
                                            {!! config('settings.long_about') !!}
                                        </textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success submit-btn">
                                    <span class="btn-text">Update General Settings</span>
                                    <div class="spinner-border spinner-border-sm d-none" role="status"></div>
                                </button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="social" role="tabpanel">
                            <form action="{{ route('setting.store') }}" method="POST" class="settings-form">
                                @csrf
                                <h4 class="pb-2 mb-4 text-success border-bottom">Social Media Links</h4>
                                <div class="mb-3">
                                    <label class="form-label">Profile Photo</label>
                                    <input type="file" name="profile_photo" class="mb-2 form-control">
                                    @if (config('settings.profile_photo'))
                                        <div class="p-2 border rounded bg-light d-inline-block">
                                            <img src="{{ asset(config('settings.profile_photo')) }}" alt="profile_photo"
                                                style="height: 50px;">
                                            <small class="d-block text-muted">Current Profile Photo</small>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Facebook URL</label>
                                    <input type="url" name="facebook" class="form-control"
                                        value="{{ config('settings.facebook') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">LinkedIn URL</label>
                                    <input type="url" name="linkedin" class="form-control"
                                        value="{{ config('settings.linkedin') }}">
                                </div>
                                <button type="submit" class="btn btn-success submit-btn">
                                    <span class="btn-text">Update General Settings</span>
                                    <div class="spinner-border spinner-border-sm d-none" role="status"></div>
                                </button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="contact" role="tabpanel">
                            <form action="{{ route('setting.store') }}" method="POST" class="settings-form">
                                @csrf
                                <h4 class="pb-2 mb-4 text-success border-bottom">Contact Info</h4>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" name="mobile" class="form-control"
                                            value="{{ config('settings.mobile') }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ config('settings.email') }}">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control summernote">{{ config('settings.address') }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success submit-btn">
                                    <span class="btn-text">Save Contact</span>
                                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                                </button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel">
                            <form action="{{ route('setting.store') }}" method="POST" class="settings-form">
                                @csrf
                                <h4 class="pb-2 mb-4 text-success border-bottom">Professional Details</h4>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Position</label>
                                        <input type="text" name="position" class="form-control"
                                            value="{{ config('settings.position') }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Experience</label>
                                        <input type="text" name="experience" class="form-control"
                                            value="{{ config('settings.experience') }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Degree</label>
                                        <input type="text" name="degree" class="form-control"
                                            value="{{ config('settings.degree') }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Registration ID</label>
                                        <input type="text" name="register" class="form-control"
                                            value="{{ config('settings.register') }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">patients</label>
                                        <input type="text" name="patients" class="form-control"
                                            value="{{ config('settings.patients') }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success submit-btn">
                                    <span class="btn-text">Update Profile</span>
                                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                                </button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="extra" role="tabpanel">
                            <form action="{{ route('setting.store') }}" method="POST" class="settings-form">
                                @csrf
                                <h4 class="pb-2 mb-4 text-success border-bottom">Video Settings</h4>
                                <div class="mb-3">
                                    <label class="form-label">YouTube Video Link</label>
                                    <input type="text" name="youtube_video" class="mb-3 form-control"
                                        placeholder="e.g. https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                                        value="{{ config('settings.youtube_video') }}">

                                    @if (config('settings.youtube_video'))
                                        @php
                                            $url = config('settings.youtube_video');
                                            preg_match(
                                                '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                                                $url,
                                                $match,
                                            );
                                            $video_id = $match[1] ?? null;
                                        @endphp

                                        @if ($video_id)
                                            <div class="p-2 mt-2 border rounded video-container bg-light">
                                                <h6 class="mb-2 text-muted small">Video Preview:</h6>
                                                <div class="ratio ratio-16x9">
                                                    <iframe src="https://www.youtube.com/embed/{{ $video_id }}"
                                                        title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen>
                                                    </iframe>
                                                </div>
                                            </div>
                                        @else
                                            <div class="py-1 mt-2 alert alert-warning small">
                                                Invalid YouTube URL format!
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-success submit-btn">
                                    <span class="btn-text">Save Video</span>
                                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                                </button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="aboutphoto" role="tabpanel">
                            <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data"
                                class="settings-form">
                                @csrf
                                <h4 class="pb-2 mb-4 text-success border-bottom">About Photo</h4>
                                <div class="row">

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">First Photo</label>
                                        <input type="file" name="firstphoto" class="mb-2 form-control">
                                        @if (config('settings.firstphoto'))
                                            <div class="p-2 border rounded bg-light d-inline-block">
                                                <img src="{{ asset(config('settings.firstphoto')) }}" alt="First Photo"
                                                    style="height: 50px;">
                                                <small class="d-block text-muted">Current First Photo</small>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Second Photo</label>
                                        <input type="file" name="secondphoto" class="mb-2 form-control">
                                        @if (config('settings.secondphoto'))
                                            <div class="p-2 border rounded bg-light d-inline-block">
                                                <img src="{{ asset(config('settings.secondphoto')) }}" alt="Second Photo"
                                                    style="height: 32px;">
                                                <small class="d-block text-muted">Current Second Photo</small>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Long Photo</label>
                                        <input type="file" name="longphoto" class="mb-2 form-control">
                                        @if (config('settings.longphoto'))
                                            <div class="p-2 border rounded bg-light d-inline-block">
                                                <img src="{{ asset(config('settings.longphoto')) }}" alt="Long Photo"
                                                    style="height: 32px;">
                                                <small class="d-block text-muted">Current Long Photo</small>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">About Page Photo</label>
                                        <input type="file" name="aboutpagephoto" class="mb-2 form-control">
                                        @if (config('settings.aboutpagephoto'))
                                            <div class="p-2 border rounded bg-light d-inline-block">
                                                <img src="{{ asset(config('settings.aboutpagephoto')) }}"
                                                    alt="Long Photo" style="height: 32px;">
                                                <small class="d-block text-muted">Current About Page Photo</small>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success submit-btn">
                                    <span class="btn-text">Update General Settings</span>
                                    <div class="spinner-border spinner-border-sm d-none" role="status"></div>
                                </button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="acadamy" role="tabpanel">
                            <form action="{{ route('setting.store') }}" method="POST" class="settings-form">
                                @csrf
                                <h4 class="pb-2 mb-4 text-success border-bottom">Academic Excellence</h4>

                                <div class="mb-3">
                                    <label class="form-label">MBBS</label>
                                    <input type="text" name="MBBS" class="form-control"
                                        value="{{ config('settings.MBBS') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">FCPS</label>
                                    <input type="text" name="FCPS" class="form-control"
                                        value="{{ config('settings.FCPS') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Fellowship</label>
                                    <input type="text" name="Fellowship" class="form-control"
                                        value="{{ config('settings.Fellowship') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Schooling</label>
                                    <input type="text" name="Schooling" class="form-control"
                                        value="{{ config('settings.Schooling') }}">
                                </div>

                                <button type="submit" class="btn btn-success submit-btn">
                                    <span class="btn-text">Update Academic Excellence Settings</span>
                                    <div class="spinner-border spinner-border-sm d-none" role="status"></div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.settings-form').forEach(form => {
            form.addEventListener('submit', function() {
                const btn = this.querySelector('.submit-btn');
                const text = btn.querySelector('.btn-text');
                const spinner = btn.querySelector('.spinner-border');

                btn.disabled = true;
                text.classList.add('d-none');
                spinner.classList.remove('d-none');
            });
        });
    </script>

    <style>
        .nav-pills .nav-link {
            color: #333;
            border-radius: 0;
        }

        .nav-pills .nav-link.active {
            background-color: #198754 !important;
        }

        .nav-link:hover {
            background-color: #f8f9fa;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.settings-form').on('submit', function(e) {
                e.preventDefault();

                let form = $(this);
                let btn = form.find('.submit-btn');
                let btnText = form.find('.btn-text');
                let spinner = form.find('.spinner-border');
                let formData = new FormData(this);

                // Loading start
                btn.prop('disabled', true);
                btnText.addClass('d-none');
                spinner.removeClass('d-none');

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert('Settings updated successfully!');
                    },
                    error: function(xhr) {
                        alert('Something went wrong. Please check validation.');
                        console.log(xhr.responseText);
                    },
                    complete: function() {
                        // Loading end
                        btn.prop('disabled', false);
                        btnText.removeClass('d-none');
                        spinner.addClass('d-none');
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'Write your long about here...',
            tabsize: 2,
            height: 300, // এডিটর এর উচ্চতা
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endsection
