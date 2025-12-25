@extends('layouts.app')

@section('content')
    <style>
        /* Experience Page এর মতো কার্ড ডিজাইন */
        .custom-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        /* Experience Page এর সেই সিগনেচার গ্রেডিয়েন্ট হেডার */
        .card-header-gradient {
            background: linear-gradient(45deg, #198754, #20c997);
            color: white;
            padding: 1.5rem;
            border: none;
        }

        /* ক্লিন টেবিল স্টাইল */
        .table thead th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem;
        }

        /* আইকন বক্স স্টাইল (Experience Logo এর মতো) */
        .chamber-icon-box {
            width: 45px;
            height: 45px;
            background: #fff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #198754;
            font-size: 1.2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 2px solid #f1f5f9;
        }

        /* অ্যাকশন বাটন */
        .btn-action {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            transition: all 0.3s ease;
            border: none;
            color: white !important;
        }

        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* ব্যাজ স্টাইল */
        .status-badge {
            font-size: 0.75rem;
            padding: 6px 12px;
            border-radius: 50px;
            font-weight: 600;
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .time-text {
            font-weight: 700;
            color: #198754;
            font-size: 0.9rem;
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
            <div class="col-lg-11">

                <div class="mb-4 d-flex justify-content-between align-items-center header-card">
                    <div>
                        <h3 class="mb-1 text-white fw-bold">Chamber Locations</h3>
                        <p class="mb-0 text-white">Manage your private practice chambers and visiting schedules.</p>
                    </div>
                    <a href="{{ route('chamber.create') }}" class="px-4 shadow-sm btn-add-new btn btn-success fw-bold"
                        style="border-radius: 10px; padding: 10px 20px;">
                        <i class="fas fa-plus-circle me-2"></i> Add New Chamber
                    </a>
                </div>

                <div class="custom-card card">
                    <div class="card-header-gradient d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-hospital-user me-2"></i> Chamber List</h5>
                        <span class="px-3 bg-white badge text-success rounded-pill">
                            {{ count($chambers) }} Total Records
                        </span>
                    </div>

                    <div class="p-0 card-body">
                        @if (session('success'))
                            <div class="m-3 alert alert-success rounded-3">
                                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table mb-0 align-middle table-hover">
                                <thead>
                                    <tr>
                                        <th class="ps-4">SL</th>
                                        <th>Chamber Info</th>
                                        <th>Visiting Time</th>
                                        <th class="text-end pe-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($chambers as $key => $row)
                                        <tr>
                                            <td class="ps-4">
                                                <span
                                                    class="text-muted fw-bold">#{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="chamber-icon-box me-3">
                                                        <i class="fas fa-clinic-medical"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold text-dark" style="font-size: 0.95rem;">
                                                            {{ $row->name }}
                                                        </div>
                                                        <small class="text-muted">
                                                            <i class="fas fa-map-marker-alt me-1 small"></i> Bangladesh
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="time-text">
                                                    <i class="far fa-clock me-1 text-success"></i>
                                                    {{ $row->time }}
                                                </div>
                                            </td>
                                            <td class="text-end pe-4">
                                                <div class="gap-2 d-flex justify-content-end">
                                                    <a href="{{ route('chamber.edit', $row->id) }}"
                                                        class="btn-action bg-info" title="Edit Chamber">
                                                        <i class="fas fa-edit fa-sm"></i>
                                                    </a>
                                                    <a href="{{ route('chamber.delete', $row->id) }}"
                                                        class="btn-action bg-danger confirm-delete" title="Delete Chamber">
                                                        <i class="fas fa-trash-alt fa-sm"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="py-5 text-center">
                                                <i class="mb-3 fas fa-hospital-alt fa-4x text-light"></i>
                                                <h5 class="text-secondary">No Chambers Found</h5>
                                                <a href="{{ route('chamber.create') }}"
                                                    class="mt-2 btn btn-sm btn-success rounded-pill">Add First Record</a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mt-3 text-center">
                    <p class="text-muted small">Showing {{ count($chambers) }} entries in the chamber database.</p>
                </div>

            </div>
        </div>
    </div>
@endsection
