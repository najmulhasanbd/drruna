@extends('layouts.app')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0">Edit Education Information</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="border-0 shadow-sm card">
                        <div class="py-3 bg-white card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 text-warning">Update Education</h5>
                            <a href="{{ route('education.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                        </div>
                        <div class="p-4 card-body">
                            <form action="{{ route('education.update', $education->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- Controller-e post route holeo edit-e method update kora thakle put/patch deya bhalo, kintu apni post diyechhen tai dorkar nei --}}

                                <div class="row">
                                    <div class="mb-4 text-center col-md-12">
                                        <div class="p-3 border rounded image-upload-wrapper bg-light">
                                            <img id="preview" src="{{ asset($education->logo) }}"
                                                class="mb-2 border rounded shadow-sm"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                            <p class="small text-muted">Leave empty if you don't want to change the photo
                                            </p>
                                            <input type="file" name="logo"
                                                class="form-control @error('logo') is-invalid @enderror"
                                                onchange="previewImage(event)">
                                            @error('logo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Institute Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $education->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Degree <span class="text-danger">*</span></label>
                                        <input type="text" name="degree"
                                            class="form-control @error('degree') is-invalid @enderror"
                                            value="{{ old('degree', $education->degree) }}" required>
                                        @error('degree')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Session <span class="text-danger">*</span></label>
                                        <input type="text" name="session"
                                            class="form-control @error('session') is-invalid @enderror"
                                            value="{{ old('session', $education->session) }}" required>
                                        @error('session')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="mt-3 shadow-sm btn btn-success w-100 btn-lg">
                                    <i class="fas fa-sync-alt me-1"></i> Update Education Information
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
