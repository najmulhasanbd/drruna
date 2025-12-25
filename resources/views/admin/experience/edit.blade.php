@extends('layouts.app')

@section('content')
<style>
    /* Add/Create পেজের মতো সবুজ থিম এবং মডার্ন কার্ড */
    .custom-card { border: none; border-radius: 20px; overflow: hidden; box-shadow: 0 15px 35px rgba(0,0,0,0.08); }

    /* হেডার এখন সবুজ গ্রেডিয়েন্ট */
    .card-header-gradient {
        background: linear-gradient(45deg, #198754, #20c997);
        color: white;
        padding: 25px;
        border: none;
    }

    .form-label { font-weight: 700; color: #374151; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; }

    .form-control {
        border-radius: 12px;
        padding: 12px 18px;
        border: 1px solid #e5e7eb;
        background-color: #f9fafb;
        transition: all 0.3s;
    }

    /* ফোকাস কালার এখন সবুজ */
    .form-control:focus {
        background-color: #fff;
        box-shadow: 0 0 0 4px rgba(25, 135, 84, 0.1);
        border-color: #198754;
        outline: none;
    }

    /* ইমেজ আপলোড ও প্রিভিউ ডিজাইন */
    .image-preview-container { position: relative; width: 140px; height: 140px; margin: 0 auto 20px; }
    .image-preview-wrapper {
        width: 100%; height: 100%; border: 3px solid #fff; border-radius: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; background-color: #fff;
        display: flex; align-items: center; justify-content: center;
    }
    #preview { width: 100%; height: 100%; object-fit: contain; padding: 10px; transition: 0.3s; }

    /* ক্যামেরার আইকন ব্যাকগ্রাউন্ড এখন সবুজ */
    .upload-hint {
        position: absolute; bottom: -5px; right: -5px; background: #198754;
        color: white; width: 35px; height: 35px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        border: 3px solid #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    /* আপডেট বাটন এখন সবুজ গ্রেডিয়েন্ট */
    .btn-update {
        background: linear-gradient(45deg, #198754, #20c997);
        border: none;
        border-radius: 12px;
        padding: 15px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.4s;
        color: white;
    }
    .btn-update:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(25, 135, 84, 0.3);
        color: white;
    }

    .info-tag { font-size: 0.75rem; color: #9ca3af; margin-top: 8px; font-style: italic; }
    textarea.form-control { min-height: 120px; resize: none; }
</style>

<div class="py-5 container-fluid">
    <div class="row">
        <div class="mx-auto col-lg-8">

            <div class="mb-4 d-flex justify-content-between align-items-end">
                <div>
                    <h3 class="mb-0 fw-bold text-dark">Update Experience 💼</h3>
                    <p class="mb-0 text-muted small">Modify your professional history records</p>
                </div>
                <a href="{{ route('experience.index') }}" class="px-4 border shadow-sm btn btn-light btn-sm rounded-pill fw-bold">
                    <i class="fas fa-chevron-left me-2"></i> Back to List
                </a>
            </div>

            <div class="custom-card card">
                <div class="card-header-gradient">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i> Edit Information</h5>
                </div>

                <div class="p-4 card-body p-md-5">
                    <form action="{{ route('experience.update', $experience->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="mb-5 text-center col-12">
                                <label class="mb-3 form-label d-block text-muted">Institute Logo</label>
                                <div class="image-preview-container">
                                    <div class="image-preview-wrapper">
                                        <img id="preview"
                                             src="{{ $experience->logo ? asset($experience->logo) : 'https://via.placeholder.com/150?text=No+Logo' }}"
                                             alt="preview">
                                    </div>
                                    <div class="upload-hint"><i class="fas fa-camera"></i></div>
                                </div>
                                <div class="mx-auto col-md-7">
                                    <input type="file" name="logo" id="logoInput"
                                           class="form-control @error('logo') is-invalid @enderror"
                                           onchange="previewImage(event)">
                                    <span class="info-tag"><i class="fas fa-info-circle me-1"></i> লোগো পরিবর্তন না করতে চাইলে ঘরটি খালি রাখুন।</span>
                                    @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 col-md-12">
                                <label class="form-label"><i class="fas fa-hospital me-1 text-success"></i> Institute Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name', $experience->name) }}" placeholder="Enter institute name" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4 col-md-6">
                                <label class="form-label"><i class="fas fa-stethoscope me-1 text-success"></i> Department / Role <span class="text-danger">*</span></label>
                                <input type="text" name="department" class="form-control @error('department') is-invalid @enderror"
                                       value="{{ old('department', $experience->department) }}" placeholder="Enter department" required>
                                @error('department') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4 col-md-6">
                                <label class="form-label"><i class="fas fa-calendar-alt me-1 text-success"></i> Session <span class="text-danger">*</span></label>
                                <input type="text" name="session" class="form-control @error('session') is-invalid @enderror"
                                       value="{{ old('session', $experience->session) }}" placeholder="e.g. 2018 - 2023" required>
                                @error('session') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4 col-md-12">
                                <label class="form-label"><i class="fas fa-align-left me-1 text-success"></i> Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                          placeholder="Write something about your experience...">{{ old('description', $experience->description) }}</textarea>
                                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="shadow-sm btn btn-update btn-lg w-100">
                                <i class="fas fa-sync-alt me-2"></i> Update Changes
                            </button>
                        </div>
                    </form>
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
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>
@endpush
