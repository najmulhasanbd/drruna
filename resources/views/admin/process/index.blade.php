@extends('layouts.app')

@section('content')
    <div class="py-4 container-fluid">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Working Process (Drag to Reorder)</h4>
            <a href="{{ route('process.create') }}" class="btn btn-primary btn-sm">Add New Process</a>
        </div>

        <div class="border-0 shadow-sm card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th style="width: 50px">#</th>
                            <th>Process Name</th>
                            <th>Description</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="sortable-list">
                        @foreach ($processes as $row)
                            <tr class="sortable-item" data-id="{{ $row->id }}">
                                <td class="text-center" style="cursor: move;">
                                    <i class="fas fa-grip-vertical text-muted"></i>
                                </td>
                                <td><strong>{{ $row->name }}</strong></td>
                                <td>{{ Str::limit($row->description, 50) }}</td>
                                <td>
                                    <a href="{{ route('process.edit', $row->id) }}"
                                        class="text-white btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('process.delete', $row->id) }}" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const dragArea = document.getElementById('sortable-list');
        new Sortable(dragArea, {
            animation: 150,
            handle: '.sortable-item', // Full row drag hobe
            onEnd: function() {
                let order = [];
                $('.sortable-item').each(function(index, element) {
                    order.push({
                        id: $(element).data('id'),
                        position: index + 1
                    });
                });

                // Ajax request to save order
                $.ajax({
                    type: "POST",
                    url: "{{ route('process.process.updateOrder') }}",
                    data: {
                        order: order,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response.message);
                        // Oproyojone ekane Alert ba Toastr add korte paren
                    }
                });
            }
        });
    </script>

    <style>
        .sortable-item.ghost {
            opacity: 0.4;
            background-color: #f1f1f1;
        }
    </style>
@endpush
