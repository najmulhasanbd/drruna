@extends('layouts.app')

@section('content')
    <div class="py-3 mb-4 bg-white shadow-sm app-content-header border-bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0 fw-bold text-dark"><i class="fas fa-question-circle me-2 text-primary"></i>FAQ Management
                    </h3>
                </div>
                <div class="col-sm-6 text-end">
                    <button class="px-4 shadow-sm btn btn-primary rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="fas fa-plus-circle me-1"></i> Add New FAQ
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="border-0 shadow-sm card rounded-4">
                <div class="py-3 bg-white card-header border-bottom">
                    <h5 class="mb-0 card-title fw-bold text-secondary">Question & Answer List</h5>
                </div>
                <div class="p-0 card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table mb-0 align-middle table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4" style="width: 80px text-muted uppercase small fw-bold">SL</th>
                                    <th class="uppercase text-muted small fw-bold">Question</th>
                                    <th class="uppercase text-muted small fw-bold">Answer</th>
                                    <th class="uppercase text-end pe-4 text-muted small fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($faqs as $key => $item)
                                    <tr>
                                        <td class="ps-4 fw-medium text-muted">#{{ $key + 1 }}</td>
                                        <td><span class="fw-bold text-dark text-wrap">{{ $item->question }}</span></td>
                                        <td class="text-muted text-wrap" style="max-width: 400px;">
                                            {{ Str::limit($item->answer, 100) }}
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="shadow-sm btn-group rounded-3">
                                                <button class="btn btn-sm btn-white border-end" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $item->id }}" title="Edit">
                                                    <i class="fa fa-edit text-info"></i>
                                                </button>
                                                <a href="{{ route('faq.delete', $item->id) }}"
                                                    class="btn btn-sm btn-white confirm-delete" id=""
                                                    title="Delete">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="border-0 shadow modal-content rounded-4">
                                                <div class="modal-header border-bottom-0">
                                                    <h5 class="fw-bold">Update FAQ</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('faq.update', $item->id) }}" method="post">
                                                    @csrf
                                                    <div class="p-4 modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold">Question</label>
                                                            <input type="text" class="shadow-none form-control rounded-3"
                                                                name="question" value="{{ $item->question }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold">Answer</label>
                                                            <textarea name="answer" class="shadow-none form-control rounded-3" rows="5" required>{{ $item->answer }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="p-4 modal-footer border-top-0">
                                                        <button type="button" class="px-4 btn btn-light rounded-pill"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit"
                                                            class="px-4 btn btn-success rounded-pill">Update Now</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-5 text-center text-muted">
                                            <i class="mb-2 fas fa-folder-open d-block fs-2"></i>
                                            No FAQs available yet.
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="border-0 shadow modal-content rounded-4">
                <div class="modal-header border-bottom-0">
                    <h5 class="fw-bold">Add New FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('faq.store') }}" method="post">
                    @csrf
                    <div class="p-4 modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Question</label>
                            <input type="text" class="shadow-none form-control rounded-3" name="question"
                                placeholder="Enter question" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Answer</label>
                            <textarea name="answer" class="shadow-none form-control rounded-3" rows="5" placeholder="Enter answer"
                                required></textarea>
                        </div>
                    </div>
                    <div class="p-4 modal-footer border-top-0">
                        <button type="button" class="px-4 btn btn-light rounded-pill"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="px-4 btn btn-primary rounded-pill">Save FAQ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .btn-white {
            background: #fff;
            border: 1px solid #e3e6f0;
        }

        .btn-white:hover {
            background: #f8f9fc;
        }

        .table thead th {
            letter-spacing: 0.05em;
        }

        .rounded-4 {
            border-radius: 1rem !important;
        }

        .text-wrap {
            white-space: normal !important;
        }
    </style>
@endsection
