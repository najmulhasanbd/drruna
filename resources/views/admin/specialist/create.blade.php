@extends('layouts.app')

@section('content')
    <style>
        /* Premium Page Background */
        .main-content {
            background: #f8fafc;
            min-height: 100vh;
            padding: 50px 0;
        }

        /* Experience Style Gradient Header */
        .custom-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-header-gradient {
            background: linear-gradient(45deg, #198754, #20c997);
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
            border-color: #20c997;
            box-shadow: 0 0 0 4px rgba(32, 201, 151, 0.1);
            background: #fff;
        }

        /* Icon Box inside Input */
        .input-group-text {
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            color: #64748b;
        }

        /* Premium Submit Button */
        .btn-submit {
            background: linear-gradient(45deg, #198754, #20c997);
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 700;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(25, 135, 84, 0.2);
            letter-spacing: 0.5px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(25, 135, 84, 0.3);
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
            color: #198754;
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
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .btn-add-new:hover {
        background: #f8fafc;
        transform: translateY(-2px);
        color: #1e40af;
    }

        /* .card-header-gradient {
            background: linear-gradient(45deg, #198754, #20c997);
            color: white;
            padding: 1.5rem;
            border: none;
        } */
    </style>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="custom-card card ">
                        <div class="card-header-gradient d-flex justify-content-between align-items-center header-card">
                             <div>
                    <h2 class="mb-1 fw-bold">
                        <i class="fas fa-user-md me-2"></i> Add Specialists
                    </h2>
                    <p class="mb-0 opacity-75">Organize and manage the specialty departments shown on your site.</p>
                </div>
                            <a href="{{ route('specialist.index') }}" class="btn-back btn-add-new text-decoration-none">
                                <i class="fas fa-arrow-left me-1"></i> Back
                            </a>
                        </div>

                        <div class="p-4 card-body p-md-5">
                            <form action="{{ route('specialist.store') }}" method="POST">
                                @csrf

                                <div class="mb-5">
                                    <label class="form-label">Specialist / Department Name <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-stethoscope"></i></span>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="e.g. Neurologist, Cardiology" value="{{ old('name') }}" required>
                                    </div>
                                    @error('name')
                                        <div class="mt-1 small text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="mt-2 text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-info-circle me-1"></i> This name will be displayed as a specialty
                                        category.
                                    </div>
                                </div>

                                <button type="submit" class="btn-submit w-100">
                                    <i class="fas fa-check-circle me-2"></i> Save Specialist Info
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <p class="text-muted small">Medical Services Management System</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
