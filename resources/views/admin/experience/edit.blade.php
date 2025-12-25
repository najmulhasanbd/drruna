@extends('layouts.app')

@section('content')
    <div class="py-3 app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0">Update Experience</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="border-0 shadow-sm card">
                        <div class="py-3 bg-white card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 text-primary">Experience Information</h5>
                            <a href="{{ route('experience.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
                        </div>
                        <div class="p-4 card-body">
                            <form action="{{ route('experience.update', $experience->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="mb-4 text-center col-md-12">
                                        <div class="p-3 border rounded image-upload-wrapper bg-light">
                                            <img id="preview"
                                                 src="{{ $experience->logo ? asset($experience->logo) : 'https://via.placeholder.com/100' }}"
                                                 class="mb-2 border rounded shadow-sm"
                                                 style="width: 100px; height: 100px; object-fit: cover;">

                                            <input type="file" name="logo"
                                                class="form-control @error('logo') is-invalid @enderror"
                                                onchange="previewImage(event)">
                                            <small class="text-muted">Leave blank if you don't want to change logo</small>
                                            @error('logo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Institute Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $experience->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Department <span class="text-danger">*</span></label>
                                        <input type="text" name="department"
                                            class="form-control @error('department') is-invalid @enderror"
                                            value="{{ old('department', $experience->department) }}">
                                        @error('department')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Session <span class="text-danger">*</span></label>
                                        <input type="text" name="session"
                                            class="form-control @error('session') is-invalid @enderror"
                                            value="{{ old('session', $experience->session) }}">
                                        @error('session')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Description</label>
                                        <textarea name="description" class="form-control" rows="5">{{ old('description', $experience->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="mt-3 shadow-sm btn btn-primary w-100 btn-lg">
                                    <i class="fas fa-save me-1"></i> Update Education Information
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                document.getElementById('preview').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
