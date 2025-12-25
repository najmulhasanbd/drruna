@extends('layouts.app')

@section('content')
    <style>
        .custom-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .card-header-gradient {
            background: linear-gradient(45deg, #198754, #20c997);
            color: white;
            padding: 1.5rem;
            border: none;
        }

        .table thead th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem;
        }

        .slider-img-preview {
            width: 120px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .slider-img-preview:hover {
            transform: scale(1.1);
        }

        .btn-action {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            transition: 0.3s;
            border: none;
        }

        .modal-content {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
            border: 1px solid #e2e8f0;
        }
    </style>

    <div class="py-5 container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1 fw-bold text-dark">Slider Management</h3>
                        <p class="mb-0 text-muted">Manage your homepage hero sliders</p>
                    </div>
                    <button class="px-4 shadow-sm btn btn-success rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#addSliderModal">
                        <i class="fas fa-plus-circle me-2"></i> Add Slider
                    </button>
                </div>

                @if (session('success'))
                    <div class="border-0 shadow-sm alert alert-success alert-dismissible fade show rounded-3"
                        role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle me-2"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="custom-card card">
                    <div class="card-header-gradient d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-images me-2"></i> Active Sliders</h5>
                        <span class="px-3 bg-white badge text-success rounded-pill">{{ $sliders->count() }} Total</span>
                    </div>
                    <div class="p-0 card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle table-hover">
                                <thead>
                                    <tr>
                                        <th class="ps-4">SL</th>
                                        <th>Preview</th>
                                        <th>Status</th>
                                        <th class="text-end pe-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sliders as $key => $item)
                                        <tr>
                                            <td class="ps-4 fw-bold text-muted">{{ $key + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($item->image) }}" class="slider-img-preview">
                                            </td>
                                            <td><span
                                                    class="px-3 border badge bg-soft-success text-success border-success rounded-pill">Active</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <div class="gap-2 d-flex justify-content-end">
                                                    <button class="text-white shadow-sm btn-action bg-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <a href="{{ route('slider.delete', $item->id) }}"
                                                        class="text-white shadow-sm btn-action bg-danger confirm-delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="shadow-lg modal-content">
                                                    <div class="card-header-gradient">
                                                        <h5 class="mb-0 modal-title"><i class="fas fa-edit me-2"></i> Update
                                                            Slider</h5>
                                                    </div>
                                                    <form action="{{ route('slider.update', $item->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="p-4 modal-body">
                                                            <div class="mb-4 text-center">
                                                                <label
                                                                    class="mb-2 uppercase d-block text-muted small fw-bold">Current
                                                                    Image</label>
                                                                <img src="{{ asset($item->image) }}"
                                                                    class="border rounded shadow-sm img-fluid"
                                                                    style="max-height: 180px; width: 100%; object-fit: cover;">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Upload New Image</label>
                                                                <input type="file" name="image" class="form-control">
                                                                <div class="mt-2 form-text text-muted">
                                                                    <i class="fas fa-info-circle me-1"></i> Recommended:
                                                                    690x490 pixels.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-3 bg-light modal-footer">
                                                            <button type="button"
                                                                class="btn btn-outline-secondary rounded-pill"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit"
                                                                class="px-4 btn btn-success rounded-pill">Save
                                                                Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="py-5 text-center text-muted">
                                                <i class="mb-3 opacity-25 fas fa-photo-video fa-3x"></i>
                                                <p>No sliders available. Please add one.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="addSliderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="shadow-lg modal-content">
                <div class="card-header-gradient">
                    <h5 class="mb-0 modal-title"><i class="fas fa-plus-circle me-2"></i> Add New Slider</h5>
                </div>
                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-4 modal-body">
                        <div class="mb-3">
                            <label class="form-label">Slider Image</label>
                            <input class="form-control" type="file" name="image" required>
                            <div class="p-3 mt-3 border-4 rounded-3 bg-light border-start border-success">
                                <small class="text-dark d-block fw-bold"><i class="fas fa-lightbulb text-warning me-1"></i>
                                    Quick Tips:</small>
                                <small class="text-muted">Best resolution is 690x490px. Keep images under 2MB for fast
                                    loading.</small>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-light modal-footer">
                        <button type="button" class="btn btn-outline-secondary rounded-pill"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="px-4 btn btn-success rounded-pill">Publish Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
