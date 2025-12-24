@extends('layouts.app')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0">Edit Award</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="border-0 shadow-sm card">
                        <div class="py-3 bg-white card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 text-warning">Update Award Information</h5>
                            <a href="{{ route('award.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
                        </div>
                        <div class="p-4 card-body">
                            {{-- Action e Award ID pass kora hoyeche --}}
                            <form action="{{ route('award.update', $award->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- Current Logo / Image Preview --}}
                                    <div class="mb-4 text-center col-md-12">
                                        <div class="p-3 border rounded image-upload-wrapper bg-light">
                                            <img id="preview" src="{{ asset($award->logo) }}"
                                                class="mb-2 border rounded shadow-sm"
                                                style="width: 100px; height: 100px; object-fit: cover;"
                                                alt="Current Award Logo">
                                            <p class="small text-muted">Change image only if needed</p>
                                            <input type="file" name="logo"
                                                class="form-control @error('logo') is-invalid @enderror"
                                                onchange="previewImage(event)">
                                            @error('logo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Award Name --}}
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold"> Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $award->name) }}" placeholder="Enter award name" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Description --}}
                                    <div class="mb-3 col-md-12">
                                        <label for="description" class="form-label fw-bold">Description <span
                                                class="text-danger">*</span></label>

                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4"
                                            placeholder="Award description" required>{{ old('description', $award->description) }}</textarea>

                                        @error('description')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="mt-3 shadow-sm btn btn-success w-100 btn-lg">
                                    <i class="fas fa-sync-alt me-1"></i> Update Award
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
