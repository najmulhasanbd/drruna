@extends('layouts.app')

@section('content')
    <style>
        /* মডার্ন কার্ড ও গ্রেডিয়েন্ট হেডার */
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

        /* টেবিল ডিজাইন */
        .table thead th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem;
        }

        /* লোগো কলাম স্টাইল */
        .logo-td {
            text-align: center !important;
            width: 100px;
        }

        .award-img {
            width: 55px;
            height: 55px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            border: 2px solid #fff;
            display: inline-block;
        }

        /* অ্যাকশন বাটন - আগের মতো ক্ল্যাসিক ডিজাইন */
        .btn-action {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: 0.3s;
            border: none;
            color: white !important;
            text-decoration: none;
            font-size: 1.1rem;
        }

        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            opacity: 1;
        }

        .bg-info-custom {
            background-color: #0dcaf0 !important;
        }

        .bg-danger-custom {
            background-color: #dc3545 !important;
        }

        .desc-truncate {
            max-width: 350px;
            font-size: 0.92rem;
            color: #64748b;
            line-height: 1.5;
        }
    </style>

    <div class="py-5 container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-11">

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1 fw-bold text-dark">Honors & Awards</h3>
                        <p class="mb-0 text-muted">A showcase of your professional achievements</p>
                    </div>
                    <a href="{{ route('award.create') }}" class="px-4 shadow-sm btn btn-success rounded-pill fw-bold">
                        <i class="fas fa-plus-circle me-2"></i> Add New Award
                    </a>
                </div>

                <div class="custom-card card">
                    <div class="card-header-gradient d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-trophy me-2"></i> Award List</h5>
                        <span class="px-3 bg-white shadow-sm badge text-success rounded-pill">Total:
                            {{ $awards->count() }}</span>
                    </div>

                    <div class="p-0 card-body">
                        @if (session('success'))
                            <div class="m-3 border-0 shadow-sm alert alert-success alert-dismissible fade show"
                                role="alert">
                                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table mb-0 align-middle table-hover">
                                <thead>
                                    <tr>
                                        <th class="ps-4" style="width: 70px">SL</th>
                                        <th class="text-center">Logo</th>
                                        <th>Award Name</th>
                                        <th>Description</th>
                                        <th class="text-end pe-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($awards as $key => $item)
                                        <tr>
                                            <td class="ps-4 fw-bold text-muted">{{ $key + 1 }}</td>
                                            <td class="logo-td">
                                                @if ($item->logo)
                                                    <img src="{{ asset($item->logo) }}" alt="Award" class="award-img">
                                                @else
                                                    <div
                                                        class="border-dashed award-img d-flex align-items-center justify-content-center bg-light">
                                                        <i class="fas fa-image text-muted fa-lg"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="fw-bold text-dark" style="font-size: 1.05rem;">
                                                    {{ $item->name }}</div>
                                            </td>
                                            <td>
                                                <div class="desc-truncate text-muted">
                                                    {!! Str::limit(strip_tags($item->description), 95) !!}
                                                </div>
                                            </td>
                                            <td class="text-end pe-4">
                                                <div class="gap-2 d-flex justify-content-end">
                                                    <a href="{{ route('award.edit', $item->id) }}"
                                                        class="shadow-sm btn-action bg-info-custom" title="Edit Award">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="{{ route('award.delete', $item->id) }}"
                                                        class="shadow-sm btn-action bg-danger-custom confirm-delete"
                                                        title="Delete Award">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="py-5 text-center text-muted">
                                                <div class="mt-2 mb-2 opacity-50">
                                                    <i class="fas fa-folder-open fa-3x"></i>
                                                </div>
                                                No awards records found.
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
@endsection
