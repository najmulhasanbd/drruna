@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary-green: #198754;
            --light-bg: #f0f2f5;
            --white: #ffffff;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .app-content {
            background-color: var(--light-bg);
            padding: 40px 30px; /* Top/Bottom 40px, Left/Right 30px padding */
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .settings-sidebar {
            border: none;
            border-radius: 16px;
            background: var(--white);
            box-shadow: var(--card-shadow);
            overflow: hidden;
            position: sticky;
            top: 20px;
        }

        .sidebar-header {
            background: linear-gradient(135deg, #157347, #198754);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        .nav-pills .nav-link {
            color: #555;
            padding: 18px 25px;
            font-weight: 500;
            border-radius: 0;
            border-left: 4px solid transparent;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #f8f9fa;
        }

        .nav-pills .nav-link i {
            width: 30px;
            font-size: 1.1rem;
        }

        .nav-pills .nav-link.active {
            background-color: #f0fdf4 !important;
            color: var(--primary-green) !important;
            border-left-color: var(--primary-green);
            font-weight: 600;
        }

        /* Content Card Styling */
        .settings-card {
            border: none;
            border-radius: 16px;
            background: var(--white);
            box-shadow: var(--card-shadow);
            padding: 40px; /* Inner padding for form content */
        }

        .section-title {
            font-weight: 800;
            color: #2d3436;
            margin-bottom: 35px;
            padding-bottom: 15px;
            border-bottom: 3px solid #f1f1f1;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -3px;
            width: 80px;
            height: 3px;
            background: var(--primary-green);
        }

        /* Form Controls */
        .form-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 10px;
        }

        .form-control {
            padding: 12px 16px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
        }

        .form-control:focus {
            background-color: #fff;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 4px rgba(25, 135, 84, 0.1);
        }

        /* Previews */
        .preview-box {
            background: #f8fafc;
            border: 2px dashed #cbd5e0;
            border-radius: 12px;
            padding: 15px;
            margin-top: 10px;
            text-align: center;
        }

        .preview-img {
            max-height: 90px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .submit-btn {
            padding: 14px 40px;
            font-weight: 700;
            border-radius: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }

        .video-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>

    <div class="px-4 py-4 app-content-header">
        <div class="container-fluid">
            <h2 class="fw-bold"><i class="fa fa-sliders-h me-3 text-success"></i>Website Configuration</h2>
            <p class="text-muted">Manage your website's global settings, social links, and academic data.</p>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-5"> <div class="col-lg-3">
                    <div class="settings-sidebar">
                        <div class="sidebar-header">
                            <h5 class="mb-0 fw-bold">Control Panel</h5>
                            <small class="opacity-75">Settings Navigation</small>
                        </div>
                        <div class="nav flex-column nav-pills" id="settings-tab" role="tablist">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#general" type="button"><i class="fa fa-globe"></i> General Info</button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#social" type="button"><i class="fa fa-share-nodes"></i> Social Media</button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#contact" type="button"><i class="fa fa-address-book"></i> Contact Info</button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#profile" type="button"><i class="fa fa-user-md"></i> Professional Info</button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#extra" type="button"><i class="fa-brands fa-youtube"></i> YouTube Video</button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#aboutphoto" type="button"><i class="fa fa-image"></i> Gallery Settings</button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#acadamy" type="button"><i class="fa fa-graduation-cap"></i> Academic Excellence</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="settings-card">
                        <div class="tab-content" id="settings-tabContent">

                            <div class="tab-pane fade show active" id="general">
                                <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data" class="settings-form">
                                    @csrf
                                    <h4 class="section-title">General Settings</h4>
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Website Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ config('settings.name') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Copyright Text</label>
                                            <input type="text" name="copyright" class="form-control" value="{{ config('settings.copyright') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Website Logo</label>
                                            <input type="file" name="logo" class="form-control image-input">
                                            <div class="preview-box">
                                                <img src="{{ asset(config('settings.logo', 'assets/default-logo.png')) }}" class="preview-img">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Favicon</label>
                                            <input type="file" name="favicon" class="form-control image-input">
                                            <div class="preview-box">
                                                <img src="{{ asset(config('settings.favicon', 'assets/default-favicon.png')) }}" style="height:32px">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Short Description (Home)</label>
                                            <textarea name="short_about" class="summernote">{!! config('settings.short_about') !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Full About Biography</label>
                                            <textarea name="long_about" class="summernote">{!! config('settings.long_about') !!}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="mt-4 btn btn-success submit-btn">Save General Changes</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="social">
                                <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data" class="settings-form">
                                    @csrf
                                    <h4 class="section-title">Social Profiles</h4>
                                    <div class="mb-4">
                                        <label class="form-label">Admin Profile Photo</label>
                                        <input type="file" name="profile_photo" class="form-control image-input">
                                        <div class="mt-2 preview-box d-inline-block">
                                            <img src="{{ asset(config('settings.profile_photo')) }}" class="preview-img">
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label class="form-label"><i class="fa-brands fa-facebook text-primary me-2"></i>Facebook URL</label>
                                            <input type="url" name="facebook" class="form-control" value="{{ config('settings.facebook') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label"><i class="fa-brands fa-linkedin text-info me-2"></i>LinkedIn URL</label>
                                            <input type="url" name="linkedin" class="form-control" value="{{ config('settings.linkedin') }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="mt-4 btn btn-success submit-btn">Save Profiles</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="contact">
                                <form action="{{ route('setting.store') }}" method="POST" class="settings-form">
                                    @csrf
                                    <h4 class="section-title">Contact Information</h4>
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Emergency Mobile</label>
                                            <input type="text" name="mobile" class="form-control" value="{{ config('settings.mobile') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Official Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ config('settings.email') }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Office Address</label>
                                            <textarea name="address" class="summernote">{{ config('settings.address') }}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="mt-4 btn btn-success submit-btn">Update Contact</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="profile">
                                <form action="{{ route('setting.store') }}" method="POST" class="settings-form">
                                    @csrf
                                    <h4 class="section-title">Professional Status</h4>
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Current Position</label>
                                            <input type="text" name="position" class="form-control" value="{{ config('settings.position') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Years of Experience</label>
                                            <input type="text" name="experience" class="form-control" value="{{ config('settings.experience') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Primary Degree</label>
                                            <input type="text" name="degree" class="form-control" value="{{ config('settings.degree') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Registration ID (BMDC)</label>
                                            <input type="text" name="register" class="form-control" value="{{ config('settings.register') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Total Patients Served</label>
                                            <input type="text" name="patients" class="form-control" value="{{ config('settings.patients') }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="mt-4 btn btn-success submit-btn">Save Professional Details</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="extra">
                                <form action="{{ route('setting.store') }}" method="POST" class="settings-form">
                                    @csrf
                                    <h4 class="section-title">YouTube Integration</h4>
                                    <label class="form-label">Featured YouTube Link</label>
                                    <input type="text" name="youtube_video" class="mb-4 form-control" value="{{ config('settings.youtube_video') }}" placeholder="Paste YouTube Link here...">

                                    @php
                                        $url = config('settings.youtube_video');
                                        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                                        $video_id = $match[1] ?? null;
                                    @endphp

                                    @if ($video_id)
                                        <div class="shadow-sm video-container">
                                            <div class="ratio ratio-16x9">
                                                <iframe src="https://www.youtube.com/embed/{{ $video_id }}" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    @else
                                        <div class="p-5 text-center border alert alert-light text-muted">
                                            <i class="mb-3 fa-brands fa-youtube fa-3x d-block"></i>
                                            No valid YouTube video URL found.
                                        </div>
                                    @endif
                                    <button type="submit" class="mt-4 btn btn-success submit-btn">Save Video</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="aboutphoto">
                                <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data" class="settings-form">
                                    @csrf
                                    <h4 class="section-title">Gallery & Media</h4>
                                    <div class="row g-4">
                                        @foreach (['firstphoto' => 'Primary Image', 'secondphoto' => 'Secondary Image', 'longphoto' => 'Banner Image', 'aboutpagephoto' => 'About Image'] as $key => $label)
                                            <div class="col-md-6">
                                                <label class="form-label">{{ $label }}</label>
                                                <input type="file" name="{{ $key }}" class="form-control image-input">
                                                <div class="preview-box">
                                                    <img src="{{ asset(config('settings.' . $key)) }}" class="preview-img">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="mt-4 btn btn-success submit-btn">Update Photos</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="acadamy">
                                <form action="{{ route('setting.store') }}" method="POST" class="settings-form">
                                    @csrf
                                    <h4 class="section-title">Academic Achievements</h4>
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <label class="form-label">MBBS Information</label>
                                            <input type="text" name="MBBS" class="form-control" value="{{ config('settings.MBBS') }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">FCPS Qualification</label>
                                            <input type="text" name="FCPS" class="form-control" value="{{ config('settings.FCPS') }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Fellowship Details</label>
                                            <input type="text" name="Fellowship" class="form-control" value="{{ config('settings.Fellowship') }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Previous Schooling</label>
                                            <input type="text" name="Schooling" class="form-control" value="{{ config('settings.Schooling') }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="mt-4 btn btn-success submit-btn">Save Academic Info</button>
                                </form>
                            </div>

                        </div> </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Initialize Summernote
            $('.summernote').summernote({
                placeholder: 'Write details...',
                height: 180,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });

            // Image Preview
            $(".image-input").change(function() {
                let reader = new FileReader();
                let preview = $(this).siblings('.preview-box').find('img');
                reader.onload = (e) => { preview.attr('src', e.target.result); }
                reader.readAsDataURL(this.files[0]);
            });

            // AJAX Submit
            $('.settings-form').on('submit', function(e) {
                e.preventDefault();
                let form = $(this);
                let btn = form.find('.submit-btn');
                let formData = new FormData(this);

                btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span> Saving...');

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        Swal.fire({ icon: 'success', title: 'Success!', text: 'Settings updated successfully.', timer: 2000, showConfirmButton: false });
                    },
                    error: function() {
                        Swal.fire({ icon: 'error', title: 'Error', text: 'Something went wrong.' });
                    },
                    complete: function() {
                        btn.prop('disabled', false).html('Save Changes');
                    }
                });
            });
        });
    </script>
@endsection