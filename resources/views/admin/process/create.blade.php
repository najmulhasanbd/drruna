@extends('layouts.app')

@section('content')
    <style>
        /* Premium Background */
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

        /* Form Styling */
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

        /* Icon Box */
        .input-group-text {
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            color: #64748b;
        }

        /* Submit Button Style */
        .btn-submit {
            background: linear-gradient(45deg, #198754, #20c997);
            border: none;
            padding: 12px;
            border-radius: 12px;
            font-weight: 700;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(25, 135, 84, 0.2);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(25, 135, 84, 0.3);
            color: white;
        }

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
    </style>

    <div class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">

                    <div class="custom-card card">
                        <div class="card-header-gradient d-flex justify-content-between align-items-center">
                            <h4 class="card-title-main">
                                <i class="fas fa-plus-circle me-3"></i> Create New Step
                            </h4>
                            <a href="{{ route('process.index') }}" class="btn-back text-decoration-none">
                                <i class="fas fa-arrow-left me-1"></i> Back to List
                            </a>
                        </div>

                        <div class="p-4 card-body p-md-5">
                            <form action="{{ route('process.store') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label">Step Title / Process Name <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="e.g. Initial Consultation" value="{{ old('name') }}" required>
                                    </div>
                                    @error('name')
                                        <div class="mt-1 small text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Process Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="6"
                                        placeholder="Describe how this step works in your workflow..." style="border-radius: 15px;" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="mt-1 small text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="p-3 mb-4 border-0 rounded-4 alert alert-info bg-light-info d-flex align-items-center"
                                    style="background: #f0f9ff; border: 1px solid #e0f2fe !important;">
                                    <i class="fas fa-info-circle text-info me-3 fa-lg"></i>
                                    <small class="text-muted">This step will be added to the end of your working process.
                                        You can reorder it later from the list view.</small>
                                </div>

                                <button type="submit" class="btn-submit w-100">
                                    <i class="fas fa-check-circle me-2"></i> Save Process Step
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <p class="text-muted small">Professional Working Process Management System</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
