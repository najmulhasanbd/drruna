@extends('layouts.app')

@section('content')
    <style>
        /* মডার্ন কার্ড ও গ্রেডিয়েন্ট */
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

        /* SVG আইকন বক্স */
        .svg-icon-box {
            width: 45px;
            height: 45px;
            background: #f0fdf4;
            padding: 8px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #dcfce7;
        }

        .svg-icon-box svg {
            width: 100%;
            height: 100%;
            color: #198754;
        }

        /* ডেসক্রিপশন "More" বাটন */
        .btn-more {
            font-size: 11px;
            padding: 2px 8px;
            border-radius: 50px;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
        }

        /* বাটন স্টাইল */
        .btn-action {
            width: 35px;
            height: 35px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: 0.3s;
            border: none;
        }

        .modal-content {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }

        .modal-header {
            background: #f8fafc;
            border-bottom: 1px solid #eee;
        }
    </style>

    <div class="py-5 container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-11">

                @if (session('success'))
                    <div class="border-0 shadow-sm alert alert-success alert-dismissible fade show rounded-3" role="alert">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1 fw-bold text-dark">Service Management</h3>
                        <p class="mb-0 text-muted">View and manage the services you offer</p>
                    </div>
                    <a href="{{ route('service.create') }}" class="px-4 shadow-sm btn btn-success rounded-pill">
                        <i class="fas fa-plus-circle me-2"></i> Add New Service
                    </a>
                </div>

                <div class="custom-card card">
                    <div class="card-header-gradient d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-concierge-bell me-2"></i> Service List</h5>
                        <span class="px-3 bg-white shadow-sm badge text-success rounded-pill">Total:
                            {{ $services->count() }}</span>
                    </div>
                    <div class="p-0 card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle table-hover">
                                <thead>
                                    <tr>
                                        <th class="ps-4" style="width: 80px">SL</th>
                                        <th>Service Title</th>
                                        <th>Icon</th>
                                        <th>Description Snippet</th>
                                        <th class="text-end pe-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $key => $item)
                                        <tr>
                                            <td class="ps-4 fw-bold text-muted">{{ $key + 1 }}</td>
                                            <td><span class="fw-bold text-dark">{{ $item->title }}</span></td>
                                            <td>
                                                <div class="shadow-sm svg-icon-box">
                                                    {!! $item->icon !!}
                                                </div>
                                            </td>
                                            <td style="max-width: 300px;">
                                                <div class="text-muted small">
                                                    {{ Str::limit(strip_tags($item->description), 60, '...') }}
                                                    <span class="shadow-sm btn-more btn-success ms-1" data-bs-toggle="modal"
                                                        data-bs-target="#descModal{{ $item->id }}">
                                                        Read More
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-end pe-4">
                                                <div class="gap-2 d-flex justify-content-end">
                                                    <a href="{{ route('service.edit', $item->id) }}"
                                                        class="text-white shadow-sm btn-action bg-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('service.delete', $item->id) }}"
                                                        class="text-white shadow-sm btn-action bg-danger confirm-delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="descModal{{ $item->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="shadow-lg modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="mb-0 modal-title fw-bold text-success">
                                                            <i class="fas fa-info-circle me-2"></i> {{ $item->title }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="p-4 modal-body" style="line-height: 1.6; color: #4b5563;">
                                                        <div class="mb-3 d-flex justify-content-center">
                                                            <div class="svg-icon-box" style="width: 60px; height: 60px;">
                                                                {!! $item->icon !!}
                                                            </div>
                                                        </div>
                                                        {!! $item->description !!}
                                                    </div>
                                                    <div class="p-3 border-0 bg-light modal-footer">
                                                        <button type="button" class="px-4 btn btn-secondary rounded-pill"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
