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

        .hospital-logo {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #fff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .btn-action {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            font-size: 0.75rem;
            padding: 6px 12px;
            border-radius: 50px;
            font-weight: 600;
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .description-text {
            font-size: 0.875rem;
            color: #64748b;
            line-height: 1.5;
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
                        <h3 class="mb-1 text-white fw-bold">Professional Experience</h3>
                        <p class="mb-0 text-white">A list of all your clinical and academic positions.</p>
                    </div>
                    <a href="{{ route('experience.create') }}" class="px-4 shadow-sm btn-add-new btn btn-success fw-bold"
                        style="border-radius: 10px; padding: 10px 20px;">
                        <i class="fas fa-plus-circle me-2"></i> Add Experience
                    </a>
                </div>

                <div class="custom-card card">
                    <div class="card-header-gradient d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-list-ul me-2"></i> Experience List</h5>
                        <span class="px-3 bg-white badge text-success rounded-pill">{{ $experiences->count() }} Total
                            Records</span>
                    </div>
                    <div class="p-0 card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle table-hover">
                                <thead>
                                    <tr>
                                        <th class="ps-4">SL</th>
                                        <th>Organization Info</th>
                                        <th>Specialization</th>
                                        <th>Timeline</th>
                                        <th style="max-width: 200px;">Overview</th>
                                        <th class="text-end pe-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($experiences as $key => $item)
                                        <tr>
                                            <td class="ps-4">
                                                <span
                                                    class="text-muted fw-bold">#{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ $item->logo ? asset($item->logo) : asset('frontend/image/placeholder.png') }}"
                                                        class="hospital-logo me-3">
                                                    <div>
                                                        <div class="fw-bold text-dark" style="font-size: 0.95rem;">
                                                            {{ $item->name }}</div>
                                                        <small class="text-muted"><i
                                                                class="fas fa-map-marker-alt me-1 small"></i>
                                                            Bangladesh</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="status-badge">
                                                    {{ $item->department }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="text-dark small fw-bold">
                                                    <i class="far fa-calendar-alt me-1 text-success"></i>
                                                    {{ $item->session }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="description-text text-truncate" style="max-width: 200px;">
                                                    {!! strip_tags($item->description) !!}
                                                </div>
                                            </td>
                                            <td class="text-end pe-4">
                                                <div class="gap-2 d-flex justify-content-end">
                                                    <a href="{{ route('experience.edit', $item->id) }}"
                                                        class="text-white btn-action bg-info" title="Edit Record">
                                                        <i class="fas fa-edit fa-sm"></i>
                                                    </a>
                                                    <a href="{{ route('experience.delete', $item->id) }}"
                                                        class="text-white btn-action bg-danger confirm-delete"
                                                        title="Delete Record">
                                                        <i class="fas fa-trash-alt fa-sm"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="py-5 text-center">
                                                <div class="py-4">
                                                    <i class="mb-3 fas fa-briefcase fa-4x text-light"></i>
                                                    <h5 class="text-secondary">No Experiences Found</h5>
                                                    <p class="text-muted small">You haven't added any experience records
                                                        yet.</p>
                                                    <a href="{{ route('experience.create') }}"
                                                        class="px-4 mt-2 btn btn-sm btn-success rounded-pill">Add First
                                                        Record</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mt-3 text-center">
                    <p class="text-muted small">Showing {{ $experiences->count() }} entries in the professional database.
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
