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

        /* লোগো প্রিভিউ */
        .edu-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
            background: #fff;
            padding: 5px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 1px solid #eee;
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

        .badge-session {
            background: #e0f2f1;
            color: #00796b;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.85rem;
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
                        <h3 class="mb-1 text-white fw-bold">Education Background</h3>
                        <p class="mb-0 text-white">Manage your academic qualifications and certifications</p>
                    </div>
                    <a href="{{ route('education.create') }}" class="px-4 shadow-sm btn-add-new btn btn-success rounded-pill">
                        <i class="fas fa-plus-circle me-2"></i> Add Education
                    </a>
                </div>

                <div class="custom-card card">
                    <div class="card-header-gradient d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-graduation-cap me-2"></i> Education List</h5>
                        <span class="px-3 bg-white shadow-sm badge text-success rounded-pill">Total:
                            {{ $educations->count() }}</span>
                    </div>
                    <div class="p-0 card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle table-hover">
                                <thead>
                                    <tr>
                                        <th class="ps-4" style="width: 80px">SL</th>
                                        <th>Logo</th>
                                        <th>Institution Name</th>
                                        <th>Degree / Title</th>
                                        <th>Session</th>
                                        <th class="text-end pe-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($educations as $key => $item)
                                        <tr>
                                            <td class="ps-4 fw-bold text-muted">{{ $key + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($item->logo) }}" alt="Logo" class="edu-logo">
                                            </td>
                                            <td>
                                                <div class="fw-bold text-dark">{{ $item->name }}</div>
                                            </td>
                                            <td>
                                                <span class="text-muted small fw-bold">{{ $item->degree }}</span>
                                            </td>
                                            <td>
                                                <span class="badge-session">{{ $item->session }}</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <div class="gap-2 d-flex justify-content-end">
                                                    <a href="{{ route('education.edit', $item->id) }}"
                                                        class="text-white shadow-sm btn-action bg-info" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('education.delete', $item->id) }}"
                                                        class="text-white shadow-sm btn-action bg-danger confirm-delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="py-5 text-center text-muted">No education records
                                                found.</td>
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
