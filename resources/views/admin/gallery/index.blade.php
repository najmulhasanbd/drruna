@extends('layouts.app')

@section('content')
    <div class="app-content-header">
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <span class="mb-2 btn btn-success">Gallery List</span>
                    <button class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Gallery Add
                    </button>
                </div>

                <div class="mb-4 card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">SL</th>
                                    <th>Images</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gallery as $key => $item)
                                    <tr class="align-middle">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @if ($item->image)
                                                <img src="{{ asset($item->image) }}"
                                                    style="width: 80px; height: 50px; object-fit: cover; border: 1px solid #ddd;">
                                            @else
                                                <span>No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $item->id }}">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <a href="{{ route('gallery.delete', $item->id) }}" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Gallery</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('gallery.update', $item->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label>Current Image</label><br>
                                                            {{-- সরাসরি ইমেজ পাথ ব্যবহার করা হয়েছে, লুপ ছাড়াই --}}
                                                            @if ($item->image)
                                                                <img src="{{ asset($item->image) }}"
                                                                    style="width: 100px; height: 100px; object-fit: cover;"
                                                                    class="mb-2 border">
                                                            @endif
                                                        </div>

                                                        <div class="mb-3">
                                                            <label>Upload New Image (Optional)</label>
                                                            {{-- name থেকে [] এবং multiple সরিয়ে ফেলা হয়েছে --}}
                                                            <input type="file" name="image" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update Image</button>
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
                    <h1 class="modal-title fs-5">Add New Gallery</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 form-group">
                            <label class="mb-1">Gallery Images (Multiple Select)</label>
                            <input class="form-control" type="file" name="image[]" required multiple>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Submit Gallery</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
