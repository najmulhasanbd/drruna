@extends('layouts.app')

@section('content')
    <div class="py-4 container-fluid">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Specialists (Drag to Reorder)</h4>
            <a href="{{ route('specialist.create') }}" class="btn btn-primary btn-sm">Add New Specialists</a>
        </div>

        <div class="border-0 shadow-sm card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th style="width: 50px">#</th>
                            <th>Process Name</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="sortable-list">
                        @foreach ($specialists as $row)
                            <tr class="sortable-item" data-id="{{ $row->id }}">
                                <td class="text-center" style="cursor: move;">
                                    <i class="fas fa-grip-vertical text-muted"></i>
                                </td>
                                <td><strong>{{ $row->name }}</strong></td>
                                <td>
                                    <a href="{{ route('specialist.edit', $row->id) }}"
                                        class="text-white btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('specialist.delete', $row->id) }}" class="btn btn-sm btn-danger"
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <script>
        $(document).ready(function() {
            const dragArea = document.getElementById('sortable-list');

            if (dragArea) {
                new Sortable(dragArea, {
                    animation: 150,
                    handle: '.fa-grip-vertical',
                    onEnd: function() {
                        let order = [];

                        // row গুলো লুপ করে ডাটা নিচ্ছি
                        $('.sortable-item').each(function(index, element) {
                            order.push({
                                id: $(element).attr('data-id'), // data-id থেকে আইডি নিচ্ছে
                                position: index + 1
                            });
                        });

                        console.log("Sending Data:", order); // ব্রাউজার কনসোলে ডাটা চেক করার জন্য

                        $.ajax({
                            type: "POST",
                            url: "{{ route('specialist.updateOrder') }}",
                            data: {
                                order: order,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                console.log("Success:", response.message);
                                // একটি ছোট নোটিফিকেশন দেখাতে পারেন
                            },
                            error: function(xhr) {
                                console.error("Error:", xhr.responseText);
                            }
                        });
                    }
                });
            }
        });
    </script>
@endpush
