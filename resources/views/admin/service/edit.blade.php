@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <style>
        /* মডার্ন কার্ড ও হেডার */
        .custom-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .card-header-gradient {
            background: linear-gradient(45deg, #198754, #20c997);
            color: white;
            padding: 1.2rem;
            border: none;
        }

        /* ফর্ম স্টাইল */
        .form-label {
            font-weight: 600;
            color: #475569;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #20c997;
            box-shadow: 0 0 0 3px rgba(32, 201, 151, 0.1);
        }

        /* আইকন প্রিভিউ বক্স */
        .icon-preview-box {
            width: 60px;
            height: 60px;
            background: #f0fdf4;
            border: 1px solid #dcfce7;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .icon-preview-box svg {
            width: 100%;
            height: 100%;
            color: #198754;
        }

        /* আপডেট বাটন */
        .btn-update {
            background: linear-gradient(45deg, #198754, #20c997);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: bold;
            transition: 0.3s;
            color: white;
        }

        .btn-update:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 135, 84, 0.3);
            color: white;
        }
    </style>

    <div class="py-5 container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1 fw-bold text-dark">Edit Service</h3>
                        <p class="mb-0 text-muted">Modify the details of your service below</p>
                    </div>
                    <a href="{{ route('service.index') }}" class="px-4 shadow-sm btn btn-outline-success rounded-pill">
                        <i class="fas fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>

                <div class="custom-card card">
                    <div class="card-header-gradient">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i> Update Service Details</h5>
                    </div>
                    <div class="p-4 card-body">
                        <form action="{{ route('service.update', $service->id) }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="mb-4 col-md-12">
                                    <label for="title" class="form-label">Service Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ $service->title }}" placeholder="Enter service title" required>
                                </div>

                                <div class="mb-4 col-md-12">
                                    <label class="form-label">Icon (SVG Code) <span class="text-danger">*</span></label>
                                    <div class="gap-3 d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <textarea name="icon" id="icon-input" class="form-control text-monospace" rows="4" required>{{ $service->icon }}</textarea>
                                        </div>
                                        <div class="text-center">
                                            <label class="mb-2 d-block small fw-bold text-muted">Preview</label>
                                            <div class="shadow-sm icon-preview-box" id="icon-preview">
                                                {!! $service->icon !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 col-md-12">
                                    <label class="form-label">Service Description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="summernote" class="form-control">{{ $service->description }}</textarea>
                                </div>
                            </div>

                            <hr class="my-4 opacity-25 text-muted">

                            <div class="gap-3 d-flex">
                                <button type="submit" class="shadow btn btn-success flex-grow-1 btn-update">
                                    <i class="fas fa-sync-alt me-2"></i> Update Service Information
                                </button>
                                <a href="{{ route('service.index') }}"
                                    class="px-4 btn btn-light rounded-pill d-flex align-items-center">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            // Summernote Initialization
            $('#summernote').summernote({
                tabsize: 2,
                height: 250,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });

            // Live SVG Preview logic
            $('#icon-input').on('input', function() {
                var svgCode = $(this).val();
                $('#icon-preview').html(svgCode);
            });
        });
    </script>
@endsection
