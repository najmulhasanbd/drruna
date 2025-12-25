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

        /* সামার নোট কাস্টমাইজেশন */
        .note-editor.note-frame {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
        }

        .note-toolbar {
            background: #f8fafc !important;
        }

        /* সাবমিট বাটন */
        .btn-submit {
            background: linear-gradient(45deg, #198754, #20c997);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 135, 84, 0.3);
            opacity: 0.9;
        }
    </style>

    <div class="py-5 container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1 fw-bold text-dark">Add New Service</h3>
                        <p class="mb-0 text-muted">Fill in the details to showcase your expertise</p>
                    </div>
                    <a href="{{ route('service.index') }}" class="px-4 shadow-sm btn btn-outline-success rounded-pill">
                        <i class="fas fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>

                <div class="custom-card card">
                    <div class="card-header-gradient">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-plus-circle me-2"></i> Service Information</h5>
                    </div>
                    <div class="p-4 card-body">
                        <form action="{{ route('service.store') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="mb-4 col-md-12">
                                    <label for="title" class="form-label">Service Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="e.g. Web Development" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-12">
                                    <label class="form-label">Icon (SVG Code) <span class="text-danger">*</span></label>
                                    <textarea name="icon" class="form-control text-monospace @error('icon') is-invalid @enderror" rows="4"
                                        placeholder="Paste your SVG code here" required></textarea>
                                    <div class="p-2 mt-2 rounded bg-light border-start border-success border-3">
                                        <small class="text-muted"><i class="fas fa-info-circle me-1"></i> Use 24x24 or 32x32
                                            SVG for best results.</small>
                                    </div>
                                </div>

                                <div class="mb-4 col-md-12">
                                    <label class="form-label">Service Description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="summernote" class="form-control"></textarea>
                                </div>
                            </div>

                            <hr class="my-4 opacity-25 text-muted">

                            <button type="submit" class="shadow btn btn-success w-100 btn-submit">
                                <i class="fas fa-save me-2"></i> Save Service Information
                            </button>
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
            $('#summernote').summernote({
                placeholder: 'Briefly describe your service...',
                tabsize: 2,
                height: 250,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>
@endsection
