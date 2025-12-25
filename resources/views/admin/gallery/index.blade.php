@extends('layouts.app')

@section('content')
    <div class="py-3 mb-4 bg-white app-content-header border-bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0 fw-bold text-dark">Gallery Management</h3>
                </div>
                <div class="col-sm-6 text-end">
                    <button class="px-4 shadow-sm btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus-circle me-1"></i> Add New Images
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="border-0 shadow-sm card rounded-3">
                <div class="py-3 bg-transparent card-header border-bottom">
                    <h5 class="mb-0 card-title fw-semibold text-secondary">Uploaded Gallery Images</h5>
                </div>
                <div class="p-0 card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 align-middle table-hover">
                            <thead class="bg-light text-muted text-uppercase small">
                                <tr>
                                    <th class="ps-4" style="width: 80px">SL</th>
                                    <th>Image Preview</th>
                                    <th class="text-end pe-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($gallery as $key => $item)
                                    <tr>
                                        <td class="ps-4 fw-medium text-muted">{{ $gallery->firstItem() + $key }}</td>
                                        <td>
                                            <div class="gallery-thumbnail">
                                                @if ($item->image)
                                                    <img src="{{ asset($item->image) }}"
                                                         class="border rounded shadow-sm"
                                                         style="width: 80px; height: 60px; object-fit: cover;">
                                                @else
                                                    <div class="py-2 text-center rounded bg-light" style="width: 80px">
                                                        <i class="fas fa-image text-muted"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="rounded shadow-sm btn-group">
                                                <button class="btn btn-sm btn-white border-end" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}" title="Edit">
                                                    <i class="fa fa-edit text-info"></i>
                                                </button>
                                                <a href="{{ route('gallery.delete', $item->id) }}" class="btn btn-sm btn-white confirm-delete" title="Delete">
    <i class="fa fa-trash text-danger"></i>
</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="border-0 shadow modal-content">
                                                <div class="py-3 modal-header border-bottom">
                                                    <h5 class="modal-title fw-bold">Update Gallery Image</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="p-4 modal-body">
                                                        <div class="mb-4 text-center">
                                                            <p class="mb-2 text-muted small">Current Image Preview</p>
                                                            <img src="{{ asset($item->image) }}" class="border rounded shadow-sm" style="max-height: 150px; width: auto;">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold">Choose New Image</label>
                                                            <input type="file" name="image" class="shadow-none form-control">
                                                            <small class="mt-1 italic text-muted d-block">Leave empty to keep the current image.</small>
                                                        </div>
                                                    </div>
                                                    <div class="px-4 pb-4 modal-footer border-top-0">
                                                        <button type="button" class="px-4 btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="px-4 shadow-sm btn btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-5 text-center text-muted">
                                            <i class="mb-2 fas fa-folder-open d-block fs-2"></i>
                                            No images found in the gallery.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="px-4 py-3 bg-transparent card-footer border-top">
                    {{ $gallery->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="border-0 shadow modal-content">
                <div class="py-3 modal-header border-bottom">
                    <h5 class="modal-title fw-bold">Upload New Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="p-4 modal-body">
                    <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Select Multiple Images</label>
                            <div class="p-4 text-center border border-2 border-dashed upload-box rounded-3 bg-light">
                                <i class="mb-2 fas fa-cloud-upload-alt fs-1 text-primary"></i>
                                <input class="bg-transparent border-0 shadow-none form-control" type="file" name="image[]" required multiple>
                                <p class="mt-2 mb-0 text-muted small">You can select more than one image at once.</p>
                            </div>
                        </div>
                        <button type="submit" class="py-2 shadow-sm btn btn-success w-100 fw-bold">
                            <i class="fas fa-paper-plane me-1"></i> Start Uploading
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table thead th { font-weight: 600; font-size: 0.75rem; letter-spacing: 0.5px; }
        .btn-white { background: #fff; border: 1px solid #dee2e6; transition: all 0.2s; }
        .btn-white:hover { background: #f8f9fa; transform: translateY(-1px); }
        .border-dashed { border-style: dashed !important; }
        .bg-success-subtle { background-color: #e1f6e5 !important; }
        .gallery-thumbnail img { transition: transform 0.2s; cursor: pointer; }
        .gallery-thumbnail img:hover { transform: scale(1.05); }
    </style>
@endsection
