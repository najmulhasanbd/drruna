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
            background: linear-gradient(45deg, #0d6efd, #0dcaf0);
            /* Edit পেজে একটু আলাদা ব্লু টোন ব্যবহার করা হয়েছে */
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
            border-color: #0d6efd;
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.1);
            background: #fff;
        }

        /* Icon Box */
        .input-group-text {
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            color: #64748b;
        }

        /* Update Button Style */
        .btn-submit {
            background: linear-gradient(45deg, #0d6efd, #0dcaf0);
            border: none;
            padding: 12px;
            border-radius: 12px;
            font-weight: 700;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
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
            color: #0d6efd;
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

    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="custom-card card">
                        <div class="header-card d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="mb-1 text-white fw-bold">
                                    <i class="fas fa-edit me-3"></i> Edit Process Step
                                </h3>
                                <p class="mb-0 opacity-75">Manage and reorder your workflow steps easily.</p>
                            </div>
                            <a href="{{ route('process.index') }}" class="btn-back btn-add-new text-decoration-none">
                                <i class="fas fa-arrow-left me-1"></i> Back to List
                            </a>
                        </div>

                        <div class="p-4 mt-4 card-body p-md-5">
                            <form action="{{ route('process.update', $process->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label class="form-label">Step Title / Process Name <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="e.g. Initial Consultation"
                                            value="{{ old('name', $process->name) }}" required>
                                    </div>
                                    @error('name')
                                        <div class="mt-1 small text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Process Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="6"
                                        placeholder="Describe how this step works..." style="border-radius: 15px;" required>{{ old('description', $process->description) }}</textarea>
                                    @error('description')
                                        <div class="mt-1 small text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="p-3 mb-4 border-0 rounded-4 alert alert-warning bg-light-warning d-flex align-items-center"
                                    style="background: #fffbeb; border: 1px solid #fef3c7 !important;">
                                    <i class="fas fa-lightbulb text-warning me-3 fa-lg"></i>
                                    <small class="text-muted">Updating this step will immediately reflect on your public
                                        consultation workflow page.</small>
                                </div>

                                <button type="submit" class="btn-submit w-100">
                                    <i class="fas fa-save me-2"></i> Update Process Details
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <p class="text-muted small">Step ID: #{{ $process->id }} | Sequence Management</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
