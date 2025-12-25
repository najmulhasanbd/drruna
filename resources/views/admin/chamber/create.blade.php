@extends('layouts.app')

@section('content')
    <style>
        /* Premium Form Styling */
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

        .btn-save {
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-back {
            border-radius: 10px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }
    </style>

    <div class="py-5 container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold text-dark">Create Chamber</h4>
                    <a href="{{ route('chamber.index') }}" class="btn btn-outline-secondary btn-sm btn-back">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>

                <div class="custom-card card">
                    <div class="card-header">
                        <span class="text-primary"><i class="fas fa-plus-circle me-2"></i></span>
                        <span class="fw-bold text-secondary">Fill in the details below</span>
                    </div>
                    <div class="p-4 card-body">
                        <form action="{{ route('chamber.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label">Chamber Name <span class="text-danger">*</span></label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="e.g. Popular Diagnostic Center" value="{{ old('name') }}" required>
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
                                        placeholder="e.g. Sat - Wed (5pm - 8pm)" value="{{ old('time') }}" required
                                        style="border-radius: 0 10px 10px 0;">
                                </div>
                                @error('time')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="mt-2 text-muted d-block">Example: Mon - Fri (10 AM - 2 PM)</small>
                            </div>

                            <button type="submit" class="shadow-sm btn btn-success w-100 btn-save">
                                <i class="fas fa-check-circle me-2"></i> Save Chamber Information
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <p class="text-muted small">Need help? Contact support or check the manual.</p>
                </div>

            </div>
        </div>
    </div>
@endsection
