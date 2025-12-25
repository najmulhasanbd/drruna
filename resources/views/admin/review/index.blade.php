@extends('layouts.app')

@section('content')
<style>
    .custom-card { border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    .card-header-gradient { background: linear-gradient(45deg, #198754, #20c997); color: white; padding: 1.5rem; border: none; }

    .table thead th {
        background-color: #f8fafc;
        color: #475569;
        font-weight: 700;
        font-size: 0.85rem;
        text-transform: uppercase;
        border-bottom: 1px solid #e2e8f0;
        padding: 1rem;
    }

    .user-avatar {
        width: 40px; height: 40px;
        background: #e0f2f1;
        color: #00897b;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-weight: bold;
        margin-right: 12px;
    }

    .status-badge {
        font-size: 0.75rem; padding: 6px 12px; border-radius: 50px; font-weight: 600;
    }
    .status-pending { background: #fff7ed; color: #9a3412; border: 1px solid #ffedd5; }
    .status-active { background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; }

    .btn-action {
        width: 36px; height: 36px; display: inline-flex; align-items: center;
        justify-content: center; border-radius: 10px; transition: 0.3s; border: none;
    }
    .btn-more { background: #e2e8f0; color: #475569; font-size: 0.75rem; border-radius: 6px; padding: 2px 8px; cursor: pointer; }
    .btn-more:hover { background: #cbd5e1; }
</style>

<div class="py-5 container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="mb-1 fw-bold text-dark">Client Reviews</h3>
                    <p class="mb-0 text-muted">Manage testimonials and feedback from your clients.</p>
                </div>
            </div>

            <div class="custom-card card">
                <div class="card-header-gradient d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-star me-2"></i> Review Management</h5>
                    <span class="px-3 bg-white badge text-success rounded-pill">{{ $review->count() }} Reviews</span>
                </div>
                <div class="p-0 card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 align-middle table-hover">
                            <thead>
                                <tr>
                                    <th class="ps-4">SL</th>
                                    <th>Client Info</th>
                                    <th>Workplace</th>
                                    <th>Message Preview</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($review as $key => $item)
                                    <tr>
                                        <td class="ps-4 text-muted">#{{ $key + 1 }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="shadow-sm user-avatar">
                                                    {{ substr($item->name, 0, 1) }}
                                                </div>
                                                <div class="fw-bold text-dark">{{ $item->name }}</div>
                                            </div>
                                        </td>
                                        <td><span class="text-secondary small fw-medium">{{ $item->workplace }}</span></td>
                                        <td>
                                            <div class="text-muted small">
                                                {{ Str::limit($item->message, 40) }}
                                                <span class="btn-more" data-bs-toggle="modal" data-bs-target="#reviewModal{{ $item->id }}">
                                                    View Full
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status-badge {{ $item->status == 'pending' ? 'status-pending' : 'status-active' }}">
                                                <i class="fas {{ $item->status == 'pending' ? 'fa-clock' : 'fa-check-circle' }} me-1"></i>
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="gap-2 d-flex justify-content-end">
                                                <a href="{{ route('review.status', $item->id) }}"
                                                   class="btn-action {{ $item->status == 'pending' ? 'bg-success' : 'bg-warning' }} text-white shadow-sm"
                                                   title="{{ $item->status == 'pending' ? 'Approve' : 'Make Pending' }}">
                                                    <i class="fas {{ $item->status == 'pending' ? 'fa-check' : 'fa-undo' }} fa-sm"></i>
                                                </a>

                                                <form action="{{ route('review.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-white shadow-sm btn-action bg-danger"
                                                            onclick="return confirm('Delete this review permanent?')">
                                                        <i class="fas fa-trash-alt fa-sm"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="reviewModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="border-0 shadow modal-content" style="border-radius: 15px;">
                                                <div class="card-header-gradient">
                                                    <h5 class="mb-0 modal-title fw-bold">Review Details</h5>
                                                </div>
                                                <div class="p-4 modal-body">
                                                    <div class="mb-3 d-flex align-items-center">
                                                        <div class="user-avatar" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                                            {{ substr($item->name, 0, 1) }}
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 fw-bold">{{ $item->name }}</h6>
                                                            <small class="text-success fw-medium">{{ $item->workplace }}</small>
                                                        </div>
                                                    </div>
                                                    <div class="p-3 rounded-3 bg-light text-dark" style="line-height: 1.6; font-style: italic;">
                                                        "{{ $item->message }}"
                                                    </div>
                                                </div>
                                                <div class="p-3 border-0 modal-footer">
                                                    <button type="button" class="px-4 btn btn-secondary rounded-pill btn-sm" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <tr>
                                        <td colspan="6" class="py-5 text-center text-muted">
                                            <i class="mb-3 opacity-25 fas fa-comment-slash fa-3x"></i>
                                            <p>No reviews available yet.</p>
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
