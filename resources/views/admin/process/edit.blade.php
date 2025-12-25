@extends('layouts.app')
@section('content')
<div class="py-4 container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border-0 shadow-sm card">
                <div class="bg-white card-header fw-bold d-flex justify-content-between">
                    <span>Edit Process</span>
                    <a href="{{ route('process.index') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('process.update', $process->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Process Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $process->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="5" required>{{ $process->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update Process</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
