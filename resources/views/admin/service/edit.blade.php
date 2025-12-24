@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <div class="app-content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="py-3 d-flex justify-content-between">
                    <span class="btn btn-success">Edit Service</span>
                    <a href="{{ route('service.index') }}" class="btn btn-primary">Back to List</a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('service.update', $service->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" value="{{ $service->title }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label>Icon (SVG Code) <span class="text-danger">*</span></label>
                                <textarea name="icon" class="form-control" rows="3" required>{{ $service->icon }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Service Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="summernote" class="form-control">{{ $service->description }}</textarea>
                            </div>

                            <hr>
                            <h5>SEO Settings</h5>

                            <div class="mb-3">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control"
                                    value="{{ $service->meta_title }}">
                            </div>

                            <div class="mb-3">
                                <label>Meta Keywords</label>
                                <textarea name="meta_keywords" class="form-control" rows="2">{{ $service->meta_keywords }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3">{{ $service->meta_description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Update Service</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 250
            });
        });
    </script>
@endsection
