@extends('layouts.app')

@section('content')
    <div class="app-content-header">
        <h3 class="mb-0">YouTube Video Management 📺</h3>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="col-md-8 offset-md-2">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Video List</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVideoModal">
                        <i class="fa fa-plus-circle"></i> Add New Video
                    </button>
                </div>

                <div class="border-0 shadow-sm card rounded-3">
                    <div class="card-body">
                        <table class="table align-middle table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 50px">SL</th>
                                    <th>Video Preview</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($youtubes as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @php
                                                // ইউটিউব লিঙ্ক থেকে ভিডিও আইডি বের করার লজিক
                                                $video_id = '';
                                                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $item->url, $match)) {
                                                    $video_id = $match[1];
                                                }
                                            @endphp

                                            @if($video_id)
                                                <iframe width="180" height="100"
                                                    src="https://www.youtube.com/embed/{{ $video_id }}"
                                                    class="rounded shadow-sm" frameborder="0" allowfullscreen>
                                                </iframe>
                                            @else
                                                <span class="text-danger">Invalid URL</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="text-white btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $item->id }}">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <a href="{{ route('youtube.delete', $item->id) }}"
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Are you sure you want to delete this video?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="text-white modal-header bg-info">
                                                    <h5 class="modal-title">Edit YouTube Video</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('youtube.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Update YouTube URL</label>
                                                            <input type="url" name="url" value="{{ $item->url }}"
                                                                class="form-control" placeholder="https://www.youtube.com/watch?v=..." required>
                                                            <small class="text-muted">লিঙ্কটি পরিবর্তন করলে ভিডিওটিও অটোমেটিক আপডেট হয়ে যাবে।</small>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="text-white btn btn-info">Update Video</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">No videos found. Click "Add New Video" to start.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addVideoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="text-white modal-header bg-success">
                    <h5 class="modal-title">Add New YouTube Video</h5>
                    <button type="button" class="text-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('youtube.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">YouTube Video URL</label>
                            <input type="url" name="url" class="form-control"
                                placeholder="Paste link here (e.g. https://www.youtube.com/watch?v=...)" required>
                            <div class="form-text text-muted">আপনি ইউটিউব থেকে শেয়ার লিঙ্ক বা ব্রাউজার লিঙ্ক—দুটোই ব্যবহার করতে পারেন।</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save Video</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
