@extends('layouts.app')

@section('content')
    <style>
        /* Premium Form Styling - আপনার দেওয়া Create পেজের হুবহু স্টাইল */
        .custom-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background-color: #fff !important;
            border-bottom: 1px solid #f0f0f0 !important;
            padding: 20px;
            border-radius: 15px 15px 0 0 !important;
        }

        .form-label {
            font-weight: 600;
            color: #444;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #3f67f0;
            box-shadow: 0 0 0 0.2rem rgba(63, 103, 240, 0.1);
        }

        /* Update বাটন স্টাইল */
        .btn-update {
            background-color: #3f67f0;
            border: none;
            color: white;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-update:hover {
            background-color: #2e51bb;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(63, 103, 240, 0.2);
            color: white;
        }

        .btn-back {
            border-radius: 10px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .bg-primary-light {
            background: #eef2ff;
            color: #3f67f0;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
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
            <div class="col-md-10">

                <div class="mb-4 d-flex justify-content-between align-items-center header-card">
                    <div>
                        <h4 class="mb-0 text-white fw-bold">Edit Chamber</h4>
                        <small class="text-white">Modify existing chamber details</small>
                    </div>
                    <a href="{{ route('chamber.index') }}" class="btn btn-outline-secondary btn-add-new btn-sm btn-back">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>

                <div class="custom-card card">
                    <div class="card-header d-flex align-items-center">
                        <div class="bg-primary-light me-3">
                            <i class="fas fa-edit"></i>
                        </div>
                        <span class="fw-bold text-secondary">Update Information</span>
                    </div>

                    <div class="p-4 card-body">
                        <form action="{{ route('chamber.update', $chamber->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="form-label">Chamber Name <span class="text-danger">*</span></label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $chamber->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Visiting Time <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"
                                        style="border-radius: 10px 0 0 10px;">
                                        <i class="far fa-clock text-muted"></i>
                                    </span>
                                    <input type="text" name="time"
                                        class="form-control border-start-0 @error('time') is-invalid @enderror"
                                        value="{{ old('time', $chamber->time) }}" required
                                        style="border-radius: 0 10px 10px 0;">
                                </div>
                                @error('time')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="shadow-sm btn-update w-100">
                                <i class="fas fa-save me-2"></i> Update Chamber Details
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <p class="text-muted small">Update will be reflected immediately on your profile.</p>
                </div>

            </div>
        </div>
    </div>
@endsection
