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

        /* অ্যাকশন বাটন - আগের থিমের মতো */
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
        }

        .bg-info-custom {
            background-color: #0dcaf0 !important;
        }

        .bg-danger-custom {
            background-color: #dc3545 !important;
        }

        .text-wrap-custom {
            white-space: normal !important;
            line-height: 1.6;
        }

        .rounded-4 {
            border-radius: 1rem !important;
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
                        <h3 class="mb-1 text-white fw-bold">FAQ Management</h3>
                        <p class="mb-0 text-white">Manage your frequently asked questions and answers</p>
                    </div>
                    <button class="px-4 shadow-sm btn btn-success btn-add-new rounded-pill fw-bold" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="fas fa-plus-circle me-2"></i> Add New FAQ
                    </button>
                </div>

                <div class="custom-card card">
                    <div class="card-header-gradient d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-question-circle me-2"></i> Question & Answer List</h5>
                        <span class="px-3 bg-white shadow-sm badge text-success rounded-pill">Total:
                            {{ $faqs->count() }}</span>
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
                                        <th class="ps-4" style="width: 80px">SL</th>
                                        <th style="width: 30%;">Question</th>
                                        <th>Answer</th>
                                        <th class="text-end pe-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($faqs as $key => $item)
                                        <tr>
                                            <td class="ps-4 fw-bold text-muted">#{{ $key + 1 }}</td>
                                            <td>
                                                <div class="fw-bold text-dark text-wrap-custom">{{ $item->question }}</div>
                                            </td>
                                            <td>
                                                <div class="text-muted text-wrap-custom small">
                                                    {{ Str::limit($item->answer, 120) }}
                                                </div>
                                            </td>
                                            <td class="text-end pe-4">
                                                <div class="gap-2 d-flex justify-content-end">
                                                    <button class="shadow-sm btn-action bg-info-custom"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $item->id }}" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <a href="{{ route('faq.delete', $item->id) }}"
                                                        class="shadow-sm btn-action bg-danger-custom confirm-delete"
                                                        title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="border-0 shadow modal-content rounded-4">
                                                    <div class="py-3 modal-header border-bottom">
                                                        <h5 class="modal-title fw-bold">Update FAQ</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('faq.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        <div class="p-4 modal-body text-start">
                                                            <div class="mb-3">
                                                                <label class="form-label fw-bold">Question</label>
                                                                <input type="text" name="question"
                                                                    class="shadow-none form-control rounded-3"
                                                                    value="{{ $item->question }}" required>
                                                            </div>
                                                            <div class="mb-0">
                                                                <label class="form-label fw-bold">Answer</label>
                                                                <textarea name="answer" class="shadow-none form-control rounded-3" rows="5" required>{{ $item->answer }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="px-4 pb-4 border-0 modal-footer">
                                                            <button type="button" class="px-4 btn btn-light rounded-pill"
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
                                            <td colspan="4" class="py-5 text-center text-muted">No FAQs found.</td>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="border-0 shadow modal-content rounded-4">
                <div class="py-3 modal-header border-bottom">
                    <h5 class="modal-title fw-bold text-success">Add New FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="p-4 modal-body">
                    <form action="{{ route('faq.store') }}" method="post">
                        @csrf
                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Question</label>
                            <input type="text" name="question" class="shadow-none form-control rounded-3"
                                placeholder="Enter question" required>
                        </div>
                        <div class="mb-4 text-start">
                            <label class="form-label fw-bold">Answer</label>
                            <textarea name="answer" class="shadow-none form-control rounded-3" rows="5" placeholder="Enter answer"
                                required></textarea>
                        </div>
                        <button type="submit" class="py-2 btn btn-success w-100 fw-bold rounded-pill">
                            <i class="fas fa-plus-circle me-1"></i> Save FAQ
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
