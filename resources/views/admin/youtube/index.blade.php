@extends('layouts.app')

@section('content')
<style>
    /* মডার্ন কার্ড ও গ্রেডিয়েন্ট হেডার */
    .custom-card { border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: 0.3s; }
    .card-header-gradient { background: linear-gradient(45deg, #198754, #20c997); color: white; padding: 1.2rem; border: none; }

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

    /* থাম্বনেইল কন্টেইনার */
    .thumb-container {
        position: relative;
        width: 120px;
        height: 68px;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        display: block;
    }
    .thumb-container img { width: 100%; height: 100%; object-fit: cover; transition: 0.4s; }
    .play-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.4); display: flex; align-items: center;
        justify-content: center; color: white; font-size: 1.5rem; opacity: 0; transition: 0.3s;
    }
    .thumb-container:hover .play-overlay { opacity: 1; }
    .thumb-container:hover img { transform: scale(1.1); }

    /* অ্যাকশন বাটন */
    .btn-action {
        width: 38px; height: 38px; display: inline-flex; align-items: center;
        justify-content: center; border-radius: 8px; transition: 0.3s; border: none;
        color: white !important; text-decoration: none; font-size: 1.1rem;
    }
    .btn-action:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }

    .bg-info-custom { background-color: #0dcaf0 !important; }
    .bg-danger-custom { background-color: #dc3545 !important; }
    .rounded-4 { border-radius: 1rem !important; }

    /* এলার্ট স্টাইল */
    .alert-custom { border-radius: 10px; border: none; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
</style>

<div class="py-5 container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="mb-1 fw-bold text-dark">YouTube Management 📺</h3>
                    <p class="mb-0 text-muted">আপনার ওয়েবসাইটের ভিডিও গ্যালারি নিয়ন্ত্রণ করুন।</p>
                </div>
                <button class="px-4 shadow-sm btn btn-success rounded-pill fw-bold" data-bs-toggle="modal" data-bs-target="#addVideoModal">
                    <i class="fas fa-plus-circle me-2"></i> Add New Video
                </button>
            </div>

            @if(session('success'))
                <div class="mb-4 alert alert-success alert-dismissible fade show alert-custom" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="custom-card card">
                <div class="card-header-gradient d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold"><i class="fab fa-youtube me-2"></i> Video Gallery List</h5>
                    <span class="px-3 bg-white shadow-sm badge text-success rounded-pill">Total: {{ $youtubes->count() }}</span>
                </div>

                <div class="p-0 card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 align-middle table-hover">
                            <thead>
                                <tr>
                                    <th class="ps-4" style="width: 80px">SL</th>
                                    <th style="width: 180px;">Preview</th>
                                    <th>Video URL</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($youtubes as $key => $item)
                                    @php
                                        $video_id = '';
                                        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $item->url, $match);
                                        $video_id = $match[1] ?? null;
                                    @endphp
                                    <tr>
                                        <td class="ps-4 fw-bold text-muted">#{{ $key + 1 }}</td>
                                        <td>
                                            @if ($video_id)
                                                <a href="{{ $item->url }}" target="_blank" class="thumb-container">
                                                    <img src="https://img.youtube.com/vi/{{ $video_id }}/mqdefault.jpg" alt="Thumbnail">
                                                    <div class="play-overlay"><i class="text-white fab fa-youtube"></i></div>
                                                </a>
                                            @else
                                                <span class="border badge bg-light text-danger rounded-pill">Invalid URL</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="text-primary small fw-medium">
                                                <i class="fas fa-link me-1 text-muted"></i> {{ Str::limit($item->url, 50) }}
                                            </div>
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="gap-2 d-flex justify-content-end">
                                                <button class="shadow-sm btn-action bg-info-custom" data-bs-toggle="modal"
                                                   data-bs-target="#editModal{{ $item->id }}" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <a href="{{ route('youtube.delete', $item->id) }}"
                                                   class="shadow-sm btn-action bg-danger-custom confirm-delete"
                                                   title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="border-0 shadow modal-content rounded-4">
                                                <div class="py-3 modal-header border-bottom bg-light">
                                                    <h5 class="modal-title fw-bold">Update Video Link</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('youtube.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    <div class="p-4 modal-body text-start">
                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold">YouTube URL</label>
                                                            <input type="url" name="url" class="border-2 shadow-none form-control rounded-3" value="{{ $item->url }}" required>
                                                        </div>
                                                        <div class="p-3 mb-0 border-0 alert alert-light small text-muted rounded-3">
                                                            <i class="fas fa-info-circle me-1 text-info"></i> থাম্বনেইল এবং ভিডিও অটোমেটিক আপডেট হবে।
                                                        </div>
                                                    </div>
                                                    <div class="px-4 pb-4 border-0 modal-footer">
                                                        <button type="button" class="px-4 btn btn-light rounded-pill" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="px-4 btn btn-success rounded-pill fw-bold">Update Now</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-5 text-center text-muted">
                                            <i class="mb-3 opacity-25 fab fa-youtube fa-4x"></i>
                                            <p class="fs-5">No videos found in your gallery.</p>
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

<div class="modal fade" id="addVideoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="border-0 shadow modal-content rounded-4">
            <div class="py-3 modal-header border-bottom bg-light text-success">
                <h5 class="modal-title fw-bold">Add New Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="p-4 modal-body text-start">
                <form action="{{ route('youtube.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-bold">YouTube Video URL</label>
                        <input type="url" name="url" class="py-2 border-2 shadow-none form-control rounded-3" placeholder="https://www.youtube.com/watch?v=..." required>
                        <div class="mt-2 form-text small text-muted">ইউটিউব থেকে শেয়ার লিঙ্ক বা ব্রাউজার লিঙ্ক এখানে পেস্ট করুন।</div>
                    </div>
                    <button type="submit" class="py-2 btn btn-success w-100 fw-bold rounded-pill">
                        <i class="fas fa-save me-1"></i> Save Video
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // ডিলিট কনফার্মেশন
    document.querySelectorAll('.delete-confirm').forEach(button => {
        button.onclick = function(e) {
            e.preventDefault();
            const url = this.getAttribute('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                border: 'none',
                borderRadius: '15px'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        };
    });

    // সাকসেস এলার্ট ৫ সেকেন্ড পর হাইড করা
    setTimeout(function() {
        let alert = document.querySelector('.alert');
        if(alert) {
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 5000);
</script>
@endsection
