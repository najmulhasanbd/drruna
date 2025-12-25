@extends('layouts.app')
@section('content')
<div class="py-4 container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border-0 shadow-sm card">
                <div class="bg-white card-header fw-bold d-flex justify-content-between">
                    <span>Add Working Process</span>
                    <a href="{{ route('process.index') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('process.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Process Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   placeholder="e.g. Online Consultation" value="{{ old('name') }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                      rows="5" placeholder="How it works..." required>{{ old('description') }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-success w-100">Save Process</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
