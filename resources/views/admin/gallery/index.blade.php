@extends('layouts.app')

@section('content')
    <style>
        /* মডার্ন কার্ড ও গ্রেডিয়েন্ট হেডার */
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

        /* টেবিল ডিজাইন */
        .table thead th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem;
        }

        /* গ্যালারি ইমেজ প্রিভিউ */
        .gallery-img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            border: 2px solid #fff;
            transition: 0.3s;
        }

        .gallery-img:hover {
            transform: scale(1.1);
        }

        /* অ্যাকশন বাটন - এওয়ার্ড লিস্টের মতো */
        .btn-action {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: 0.3s;
            border: none;
            color: white !important;
            text-decoration: none;
            font-size: 1.1rem;
        }

        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        .bg-info-custom {
            background-color: #0dcaf0 !important;
        }

        .bg-danger-custom {
            background-color: #dc3545 !important;
        }

        /* আপলোড বক্স ডিজাইন */
        .upload-box {
            border: 2px dashed #cbd5e1 !important;
            background-color: #f8fafc;
            transition: 0.3s;
        }

        .upload-box:hover {
            border-color: #198754 !important;
            background-color: #f0fdf4;
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

    <div class="py-5 container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="mb-4 d-flex justify-content-between align-items-center header-card">
                    <div>
                        <h3 class="mb-1 text-white fw-bold">Gallery Management</h3>
                        <p class="mb-0 text-white">Organize and manage your gallery images</p>
                    </div>
                    <button class="px-4 shadow-sm btn btn-success btn-add-new rounded-pill fw-bold" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="fas fa-plus-circle me-2"></i> Add New Images
                    </button>
                </div>

                <div class="custom-card card">
                    <div class="card-header-gradient d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-images me-2"></i> Uploaded Images</h5>
                        <span class="px-3 bg-white shadow-sm badge text-success rounded-pill">Total:
                            {{ $gallery->total() }}</span>
                    </div>

                    <div class="p-0 card-body">
                        @if (session('success'))
                            <div class="m-3 border-0 shadow-sm alert alert-success alert-dismissible fade show"
                                role="alert">
                                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table mb-0 align-middle table-hover">
                                <thead>
                                    <tr>
                                        <th class="ps-4" style="width: 80px">SL</th>
                                        <th>Image Preview</th>
                                        <th class="text-end pe-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($gallery as $key => $item)
                                        <tr>
                                            <td class="ps-4 fw-bold text-muted">{{ $gallery->firstItem() + $key }}</td>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset($item->image) }}" alt="Gallery" class="gallery-img">
                                                @else
                                                    <div
                                                        class="border gallery-img d-flex align-items-center justify-content-center bg-light">
                                                        <i class="fas fa-image text-muted"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="text-end pe-4">
                                                <div class="gap-2 d-flex justify-content-end">
                                                    <button class="shadow-sm btn-action bg-info-custom"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $item->id }}" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <a href="{{ route('gallery.delete', $item->id) }}"
                                                        class="shadow-sm btn-action bg-danger-custom confirm-delete"
                                                        title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="border-0 shadow modal-content">
                                                    <div class="py-3 modal-header border-bottom">
                                                        <h5 class="modal-title fw-bold">Update Gallery Image</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('gallery.update', $item->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="p-4 text-center modal-body">
                                                            <p class="mb-2 text-muted small">Current Image</p>
                                                            <img src="{{ asset($item->image) }}"
                                                                class="mb-3 border rounded shadow-sm"
                                                                style="max-height: 150px;">
                                                            <div class="text-start">
                                                                <label class="form-label fw-semibold">Choose New
                                                                    Image</label>
                                                                <input type="file" name="image" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="px-4 pb-4 border-0 modal-footer">
                                                            <button type="button" class="px-4 btn btn-light rounded-pill"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit"
                                                                class="px-4 btn btn-success rounded-pill">Update
                                                                Image</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    @empty
                                        <tr>
                                            <td colspan="4" class="py-5 text-center text-muted">No images found.</td>
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
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="border-0 shadow modal-content">
                <div class="py-3 modal-header border-bottom">
                    <h5 class="modal-title fw-bold text-success">Upload New Gallery Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="p-4 modal-body">
                    <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-bold">Select Multiple Images</label>
                            <div class="p-4 text-center upload-box rounded-3">
                                <i class="mb-2 fas fa-cloud-upload-alt fs-1 text-success"></i>
                                <input class="form-control" type="file" name="image[]" required multiple>
                                <p class="mt-2 mb-0 italic text-muted small">Maximum upload size: 2MB per image.</p>
                            </div>
                        </div>
                        <button type="submit" class="py-2 btn btn-success w-100 fw-bold rounded-pill">
                            <i class="fas fa-paper-plane me-1"></i> Start Uploading
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
