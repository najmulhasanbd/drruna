@extends('layouts.app')

@section('content')
    <style>
        /* Premium Page Background */
        .main-content {
            background: #f8fafc;
            min-height: 100vh;
            padding: 50px 0;
        }

        /* Professional Edit Gradient Header */
        .custom-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-header-gradient {
            background: linear-gradient(45deg, #0d6efd, #0dcaf0);
            color: white;
            padding: 1.5rem 2rem;
            border: none;
        }

        .card-title-main {
            font-size: 1.25rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
        }

        /* Form Label and Controls */
        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-control {
            border: 1px solid #e2e8f0;
            padding: 12px 15px;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: #fdfdfd;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.1);
            background: #fff;
        }

        /* Icon Box inside Input */
        .input-group-text {
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            color: #64748b;
        }

        /* Premium Update Button */
        .btn-submit {
            background: linear-gradient(45deg, #0d6efd, #0dcaf0);
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 700;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
            letter-spacing: 0.5px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
            color: white;
        }

        /* Elegant Back Button */
        .btn-back {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 6px 15px;
            border-radius: 10px;
            font-size: 0.85rem;
            backdrop-filter: blur(5px);
            transition: 0.3s;
        }

        .btn-back:hover {
            background: white;
            color: #0d6efd;
        }
    </style>

    <div class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <div class="custom-card card">
                        <div class="card-header-gradient d-flex justify-content-between align-items-center">
                            <h4 class="card-title-main">
                                <i class="fas fa-user-edit me-3"></i> Edit Specialist
                            </h4>
                            <a href="{{ route('specialist.index') }}" class="btn-back text-decoration-none">
                                <i class="fas fa-arrow-left me-1"></i> Back
                            </a>
                        </div>

                        <div class="p-4 card-body p-md-5">
                            <form action="{{ route('specialist.update', $specialist->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-5">
                                    <label class="form-label">Specialist / Department Name <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-pen-fancy"></i></span>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="e.g. Neurologist, Cardiology"
                                            value="{{ old('name', $specialist->name) }}" required>
                                    </div>
                                    @error('name')
                                        <div class="mt-1 small text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="p-3 mt-3 border-0 rounded-3 bg-light alert alert-info d-flex align-items-center"
                                        style="background-color: #f0f7ff !important;">
                                        <i class="fas fa-info-circle text-primary me-2"></i>
                                        <span class="text-muted small">ID: #{{ $specialist->id }} | Changing this will
                                            update the specialist category across the system.</span>
                                    </div>
                                </div>

                                <button type="submit" class="btn-submit w-100">
                                    <i class="fas fa-save me-2"></i> Update Specialist Info
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <p class="text-muted small">Specialty Data Management Control</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
