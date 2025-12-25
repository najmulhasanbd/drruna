@extends('layouts.app')
@section('content')
<div class="py-4 container-fluid">
    <div class="mb-3 d-flex justify-content-between">
        <h4>Chamber List</h4>
        <a href="{{ route('chamber.create') }}" class="btn btn-primary btn-sm">Add New Chamber</a>
    </div>
    <div class="border-0 shadow-sm card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th>SL</th>
                        <th>Chamber Name</th>
                        <th>Visiting Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chambers as $key => $row)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->time }}</td>
                        <td>
                            <a href="{{ route('chamber.edit', $row->id) }}" class="text-white btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('chamber.delete', $row->id) }}" onclick="return confirm('Delete this?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
