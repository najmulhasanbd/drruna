@extends('layouts.app')

@section('content')
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

        /* ইমেজ আপলোড এরিয়া */
        .image-upload-wrapper {
            border: 2px dashed #e2e8f0;
            border-radius: 15px;
            padding: 20px;
            background: #f8fafc;
            transition: 0.3s;
            cursor: pointer;
        }

        .image-upload-wrapper:hover {
            border-color: #20c997;
            background: #f0fdf4;
        }

        .preview-img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            background: white;
            border-radius: 12px;
            padding: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* বাটন স্টাইল */
        .btn-submit {
            background: linear-gradient(45deg, #198754, #20c997);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: bold;
            transition: 0.3s;
            color: white;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 135, 84, 0.3);
            color: white;
        }

        .header-card {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            color: white;
            box-shadow: 0 10px 30px rgba(30, 58, 138, 0.15);
        }

        .btn-add-new {
            background: white;
            color: #1e3a8a;
            border: none;
            padding: 10px 22px;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-add-new:hover {
            background: #f8fafc;
            transform: translateY(-2px);
            color: #1e40af;
        }

        .card-header-gradient {
            background: linear-gradient(45deg, #198754, #20c997);
            color: white;
            padding: 1.5rem;
            border: none;
        }
    </style>

    <div class="py-5 container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="mb-4 d-flex justify-content-between align-items-center header-card">
                    <div>
                        <h3 class="mb-1 text-white fw-bold">Add New Education</h3>
                        <p class="mb-0 text-white">Add your academic certificates or degrees</p>
                    </div>
                    <a href="{{ route('education.index') }}"
                        class="px-4 shadow-sm btn btn-add-new btn-outline-success rounded-pill">
                        <i class="fas fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>

                <div class="custom-card card">
                    <div class="card-header-gradient">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-graduation-cap me-2"></i> Education Information</h5>
                    </div>
                    <div class="p-4 card-body">
                        <form action="{{ route('education.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row justify-content-center">
                                <div class="mb-4 text-center col-md-12">
                                    <label class="mb-3 d-block form-label">Institute Logo</label>
                                    <div class="image-upload-wrapper"
                                        onclick="document.getElementById('logoInput').click();">
                                        <img id="preview" src="https://via.placeholder.com/100?text=Logo"
                                            class="mb-3 preview-img">
                                        <input type="file" id="logoInput" name="logo"
                                            class="d-none @error('logo') is-invalid @enderror"
                                            onchange="previewImage(event)">
                                        <p class="mb-0 small text-muted">Click here to upload institute logo</p>
                                        @error('logo')
                                            <div class="mt-2 d-block invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 col-md-12">
                                    <label class="form-label">Institute Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        placeholder="e.g. Dhaka University" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label class="form-label">Degree <span class="text-danger">*</span></label>
                                    <input type="text" name="degree"
                                        class="form-control @error('degree') is-invalid @enderror"
                                        value="{{ old('degree') }}" placeholder="e.g. B.Sc in CSE" required>
                                    @error('degree')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label class="form-label">Session <span class="text-danger">*</span></label>
                                    <input type="text" name="session"
                                        class="form-control @error('session') is-invalid @enderror"
                                        value="{{ old('session') }}" placeholder="e.g. 2018 - 2022" required>
                                    @error('session')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4 opacity-25 text-muted">

                            <button type="submit" class="shadow btn btn-success w-100 btn-submit">
                                <i class="fas fa-save me-2"></i> Save Education Record
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
