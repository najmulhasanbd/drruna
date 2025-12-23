@extends('layouts.app')

@section('content')
    <div class="app-content-header">
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="col-md-6 offset-md-3">
                <div class="d-flex justify-content-between">
                    <span class="mb-2 btn btn-success">Featured List</span>
                    <button class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Featured Add
                    </button>
                </div>

                <div class="mb-4 card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">SL</th>
                                    <th>Title</th>
                                    <th>Photo</th>
                                    <th>Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($features as $key => $item)
                                    <tr class="align-middle">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td style="width: 50px">{!! $item->icon !!}</td>
                                        <td>{{ $item->number }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $item->id }}">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <a href="{{ route('featured.delete', $item->id) }}"
                                                class="btn btn-sm btn-danger" onclick="return confirm('Delete this?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Feature</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('featured.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label>Title</label>
                                                            <input type="text" name="title" class="form-control"
                                                                value="{{ $item->title }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Count (Number)</label>
                                                            <input type="text" name="number" class="form-control"
                                                                value="{{ $item->number }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Icon (SVG Code)</label>
                                                            <textarea name="icon" class="form-control" rows="5" required placeholder="Paste SVG code here">{{ $item->icon }}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label>Current Icon Preview:</label>
                                                            <div style="width: 40px; height: 40px;">
                                                                {!! $item->icon !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update
                                                            Feature</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Add New Slider</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('featured.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="enter title">
                            </div>
                            <div class="mb-3">
                                <label>Count</label>
                                <input type="text" name="number" class="form-control" placeholder="enter number">
                            </div>
                            <div class="mb-3">
                                <label>Icon (SVG Code)</label>
                                <textarea name="icon" class="form-control" rows="3" placeholder="Paste SVG code here"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Submit Featured</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
