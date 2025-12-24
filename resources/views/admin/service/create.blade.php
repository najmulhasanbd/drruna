@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <div class="app-content-header"></div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <span class="mb-2 btn btn-success">Service List</span>
                </div>

                <div class="mb-4 card">
                    <div class="card-body">

                        <form action="{{ route('service.store') }}" method="post">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter service title" required>
                            </div>

                            <div class="mb-3 form-group">
                                <label>Icon (SVG Code) <span class="text-danger">*</span></label>
                                <textarea name="icon" class="form-control" rows="3" placeholder="Paste SVG code here" required></textarea>
                            </div>

                            <div class="mb-3 form-group">
                                <label>Service Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="summernote" class="form-control" rows="5"></textarea>
                            </div>

                            <hr>
                            <h5>SEO Settings (Optional)</h5>

                            <div class="mb-3 form-group">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" placeholder="Enter meta title">
                                <small class="text-muted">60 character thaka bhalo.</small>
                            </div>

                            <div class="mb-3 form-group">
                                <label>Meta Keywords</label>
                                <textarea name="meta_keywords" class="form-control" rows="2" placeholder="Keyword1, Keyword2, Keyword3"></textarea>
                            </div>

                            <div class="mb-3 form-group">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter meta description"></textarea>
                                <small class="text-muted">160 character thaka bhalo.</small>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Save Service</button>
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
                placeholder: 'Write service details here...',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
