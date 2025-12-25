@extends('layouts.app')

@section('content')
    <style>
        .custom-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .card-header-gradient {
            background: linear-gradient(45deg, #198754, #20c997);
            color: white;
            padding: 25px;
            border: none;
        }

        .form-label {
            font-weight: 700;
            color: #374151;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 1px solid #e5e7eb;
            background-color: #f9fafb;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(25, 135, 84, 0.1);
            border-color: #198754;
            outline: none;
        }

        /* Logo Upload Styling */
        .image-preview-wrapper {
            position: relative;
            width: 130px;
            height: 130px;
            margin: 0 auto 15px;
            border: 2px dashed #cbd5e1;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8fafc;
            transition: 0.3s;
            overflow: hidden;
        }

        .image-preview-wrapper:hover {
            border-color: #198754;
            background-color: #f0fdf4;
        }

        #preview {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
        }

        .btn-submit {
            background: linear-gradient(45deg, #198754, #20c997);
            border: none;
            border-radius: 12px;
            padding: 16px;
            font-weight: 700;
            letter-spacing: 0.5px;
            transition: 0.4s;
            color: white;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(25, 135, 84, 0.3);
            color: white;
        }

        textarea.form-control {
            resize: none;
            min-height: 120px;
        }
    </style>

    <div class="py-5 container-fluid">
        <div class="row">
            <div class="mx-auto col-lg-8">

                <div class="mb-4 d-flex justify-content-between align-items-end">
                    <div>
                        <h3 class="mb-0 fw-bold text-dark">Add New Experience 💼</h3>
                        <p class="mb-0 text-muted small">Create a new professional milestone</p>
                    </div>
                    <a href="{{ route('experience.index') }}" class="px-4 border shadow-sm btn btn-light btn-sm rounded-pill fw-bold">
                        <i class="fas fa-chevron-left me-2"></i> Back to List
                    </a>
                </div>

                <div class="custom-card card">
                    <div class="card-header-gradient">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-graduation-cap me-2"></i> Professional Details</h5>
                    </div>

                    <div class="p-4 card-body p-md-5">
                        <form action="{{ route('experience.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="mb-5 text-center col-12">
                                    <label class="form-label d-block text-muted">Institute Logo</label>
                                    <div class="shadow-sm image-preview-wrapper">
                                        <img id="preview" src="https://via.placeholder.com/150?text=Upload+Logo" alt="preview">
                                    </div>
                                    <div class="mx-auto col-md-6">
                                        <input type="file" name="logo" id="logoInput"
                                            class="form-control @error('logo') is-invalid @enderror"
                                            onchange="previewImage(event)">
                                        <div class="mt-2 italic text-muted small"><i class="fas fa-info-circle me-1"></i> Recommended: Square PNG/JPG</div>
                                        @error('logo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 col-md-12">
                                    <label class="form-label"><i class="fas fa-university me-1 text-success"></i> Institute Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        placeholder="e.g. Dhaka Medical College Hospital" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label class="form-label"><i class="fas fa-stethoscope me-1 text-success"></i> Department / Role <span class="text-danger">*</span></label>
                                    <input type="text" name="department"
                                        class="form-control @error('department') is-invalid @enderror"
                                        value="{{ old('department') }}" placeholder="e.g. Senior Consultant" required>
                                    @error('department')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label class="form-label"><i class="fas fa-calendar-alt me-1 text-success"></i> Duration <span class="text-danger">*</span></label>
                                    <input type="text" name="session"
                                        class="form-control @error('session') is-invalid @enderror"
                                        value="{{ old('session') }}" placeholder="e.g. Jan 2020 - Present" required>
                                    @error('session')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-12">
                                    <label class="form-label"><i class="fas fa-align-left me-1 text-success"></i> Key Responsibilities <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Describe your role and major achievements..." required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="pt-2 mt-4 border-top">
                                <button type="submit" class="shadow btn btn-submit btn-lg w-100">
                                    <i class="fas fa-save me-2"></i> Save Experience Record
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>
@endpush
