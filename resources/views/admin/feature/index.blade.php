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
            padding: 1.2rem;
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

        .btn-action:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .modal-content {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
            border: 1px solid #e2e8f0;
        }

        .form-control:focus {
            border-color: #20c997;
            box-shadow: 0 0 0 3px rgba(32, 201, 151, 0.1);
        }
    </style>

    <div class="py-5 container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">

                @if (session('success'))
                    <div class="border-0 shadow-sm alert alert-success alert-dismissible fade show rounded-3" role="alert">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                    <div class="mb-3 mb-md-0">
                        <h3 class="mb-1 fw-bold text-dark">Featured Statistics</h3>
                        <p class="mb-0 text-muted">Manage your skill counters and website features</p>
                    </div>
                    <button class="px-4 shadow-sm btn btn-success rounded-pill btn-lg" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="fas fa-plus-circle me-2"></i> Add New Feature
                    </button>
                </div>

                <div class="custom-card card">
                    <div class="card-header-gradient d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-list-ul me-2"></i> Featured List</h5>
                        <span class="px-3 bg-white shadow-sm badge text-success rounded-pill">
                            Total: {{ $features->count() }}
                        </span>
                    </div>
                    <div class="p-0 card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle table-hover">
                                <thead>
                                    <tr>
                                        <th class="ps-4">SL</th>
                                        <th>Title</th>
                                        <th>Icon Preview</th>
                                        <th>Value/Count</th>
                                        <th class="text-end pe-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($features as $key => $item)
                                        <tr>
                                            <td class="ps-4 fw-bold text-muted">{{ $key + 1 }}</td>
                                            <td><span class="fw-bold text-dark">{{ $item->title }}</span></td>
                                            <td>
                                                <div class="shadow-sm svg-icon-box">
                                                    {!! $item->icon !!}
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    class="px-3 border badge bg-light text-success fw-bold fs-6 rounded-pill">
                                                    {{ $item->number }}+
                                                </span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <div class="gap-2 d-flex justify-content-end">
                                                    <button class="text-white shadow-sm btn-action bg-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $item->id }}" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <a href="{{ route('featured.delete', $item->id) }}"
                                                        class="text-white shadow-sm btn-action bg-danger confirm-delete"
                                                        title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="border-0 shadow-lg modal-content">
                                                    <div class="p-3 card-header-gradient">
                                                        <h5 class="mb-0 modal-title"><i class="fas fa-edit me-2"></i> Update
                                                            Feature</h5>
                                                    </div>
                                                    <form action="{{ route('featured.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        <div class="p-4 modal-body">
                                                            <div class="mb-3">
                                                                <label class="form-label fw-bold small">Title</label>
                                                                <input type="text" name="title" class="form-control"
                                                                    value="{{ $item->title }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-bold small">Value
                                                                    (Number)</label>
                                                                <input type="text" name="number" class="form-control"
                                                                    value="{{ $item->number }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-bold small">Icon (SVG
                                                                    Code)</label>
                                                                <textarea name="icon" class="form-control text-monospace small" rows="5" required>{{ $item->icon }}</textarea>
                                                            </div>
                                                            <div class="p-3 border-0 rounded bg-light">
                                                                <label class="mb-2 d-block small text-muted fw-bold">Live
                                                                    Preview:</label>
                                                                <div style="width: 50px; height: 50px;">
                                                                    {!! $item->icon !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-3 border-0 bg-light modal-footer">
                                                            <button type="button"
                                                                class="btn btn-link text-muted fw-bold text-decoration-none"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit"
                                                                class="px-4 shadow-sm btn btn-success rounded-pill">Save
                                                                Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="py-5 text-center text-muted">No featured items found.
                                                Add one to get started!</td>
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
            <div class="border-0 shadow-lg modal-content">
                <div class="p-3 card-header-gradient">
                    <h5 class="mb-0 text-white modal-title"><i class="fas fa-plus-circle me-2"></i> Create New Feature</h5>
                </div>
                <form action="{{ route('featured.store') }}" method="post">
                    @csrf
                    <div class="p-4 modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Feature Title</label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Clients Served"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Count/Value</label>
                            <input type="text" name="number" class="form-control" placeholder="e.g. 500" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Icon (Paste SVG Code)</label>
                            <textarea name="icon" class="form-control text-monospace small" rows="5" placeholder="<svg>...</svg>"
                                required></textarea>
                        </div>
                        <div class="p-3 mt-2 border-0 bg-light rounded-3">
                            <small class="text-muted">
                                <i class="fas fa-lightbulb text-warning me-1"></i>
                                Icons make your stats look great! Use simple SVG codes for best performance.
                            </small>
                        </div>
                    </div>
                    <div class="p-3 border-0 bg-light modal-footer">
                        <button type="button" class="btn btn-link text-muted fw-bold text-decoration-none"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="px-4 shadow-sm btn btn-success rounded-pill">Create Feature</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm(
                    'Are you sure you want to delete this feature? This action cannot be undone.')) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection
