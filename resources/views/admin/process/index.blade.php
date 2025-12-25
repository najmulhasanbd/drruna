@extends('layouts.app')

@section('content')
    <style>
        .btn-add-new:hover {
            background: #f8fafc;
            transform: translateY(-2px);
            color: #2e51bb;
        }

        /* Experience Page Style Table & Cards */
        .custom-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            background: #fff;
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

        /* Sortable Item Hover */
        .sortable-item {
            transition: all 0.3s ease;
        }

        .sortable-item:hover {
            background-color: #f1f5f9 !important;
        }

        .drag-handle {
            cursor: grab;
            color: #cbd5e1;
            padding: 10px;
            transition: 0.2s;
        }

        .drag-handle:hover {
            color: #198754;
        }

        /* Process Icon Box */
        .process-icon-circle {
            width: 40px;
            height: 40px;
            background: #f0fdf4;
            color: #198754;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #bbf7d0;
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
            color: white;
        }

        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            color: white;
        }

        /* Toast Feedback */
        #status-msg {
            position: fixed;
            top: 30px;
            right: 30px;
            z-index: 9999;
            display: none;
            background: #198754;
            color: white;
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(25, 135, 84, 0.3);
        }

        .sortable-ghost {
            opacity: 0.4;
            background: #f0fdf4 !important;
            border: 2px dashed #198754 !important;
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

    <div id="status-msg">
        <i class="fas fa-check-circle me-2"></i> Order Synchronized!
    </div>

    <div class="py-5 container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="header-card d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1 text-white fw-bold">
                            <i class="fas fa-project-diagram me-2"></i> Working Process
                            </h2>
                            <p class="mb-0 opacity-75">Manage and reorder your workflow steps easily.</p>
                    </div>
                    <a href="{{ route('process.create') }}" class="btn btn-add-new text-decoration-none">
                        <i class="fas fa-plus-circle me-1"></i> Add New Step
                    </a>
                </div>

                <div class="custom-card card">
                    <div class="card-header-gradient d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-list-ul me-2"></i> Process Sequence</h5>
                        <span class="px-3 bg-white badge text-success rounded-pill">
                            {{ $processes->count() }} Steps Defined
                        </span>
                    </div>

                    <div class="p-0 card-body">
                        @if (session('success'))
                            <div class="m-3 border-0 shadow-sm alert alert-success">
                                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table mb-0 align-middle table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 80px">Move</th>
                                        <th>Step Name</th>
                                        <th>Brief Description</th>
                                        <th class="text-end pe-4" style="width: 150px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="sortable-list">
                                    @forelse ($processes as $row)
                                        <tr class="sortable-item" data-id="{{ $row->id }}">
                                            <td class="text-center">
                                                <div class="drag-handle">
                                                    <i class="fas fa-grip-lines fa-lg"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="process-icon-circle me-3">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold text-dark" style="font-size: 0.95rem;">
                                                            {{ $row->name }}</div>
                                                        <small class="text-muted">Workflow Step</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-muted small" style="max-width: 400px; line-height: 1.5;">
                                                    {{ Str::limit($row->description, 100) }}
                                                </div>
                                            </td>
                                            <td class="text-end pe-4">
                                                <div class="gap-2 d-flex justify-content-end">
                                                    <a href="{{ route('process.edit', $row->id) }}"
                                                        class="btn-action bg-info" title="Edit Step">
                                                        <i class="fas fa-edit fa-sm"></i>
                                                    </a>
                                                    <a href="{{ route('process.delete', $row->id) }}"
                                                        class="btn-action bg-danger confirm-delete" title="Delete Step">
                                                        <i class="fas fa-trash-alt fa-sm"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="py-5 text-center">
                                                <div class="py-4 opacity-50">
                                                    <i class="mb-3 fas fa-layer-group fa-4x text-light"></i>
                                                    <h5 class="text-secondary">No processes defined yet</h5>
                                                    <a href="{{ route('process.create') }}"
                                                        class="mt-2 btn btn-sm btn-success rounded-pill">Create First
                                                        Step</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-center text-muted small">
                    <i class="fas fa-info-circle me-2"></i>
                    <span>Drag the handle icon to rearrange the order of your working process.</span>
                </div>
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <script>
        $(document).ready(function() {
            const dragArea = document.getElementById('sortable-list');
            if (dragArea) {
                new Sortable(dragArea, {
                    animation: 350,
                    handle: '.drag-handle',
                    ghostClass: 'sortable-ghost',
                    onEnd: function() {
                        let order = [];
                        $('.sortable-item').each(function(index, element) {
                            order.push({
                                id: $(element).data('id'),
                                position: index + 1
                            });
                        });

                        $.ajax({
                            type: "POST",
                            url: "{{ route('process.process.updateOrder') }}",
                            data: {
                                order: order,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                $('#status-msg').css('display', 'flex').hide().fadeIn()
                                    .delay(1500).fadeOut();
                            }
                        });
                    }
                });
            }
        });
    </script>
@endpush
