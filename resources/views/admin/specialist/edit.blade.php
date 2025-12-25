@extends('layouts.app')
@section('content')
<div class="py-4 container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border-0 shadow-sm card">
                <div class="bg-white card-header fw-bold d-flex justify-content-between">
                    <span>Edit Specialist</span>
                    <a href="{{ route('specialist.index') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('specialist.update', $specialist->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Specialist Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $specialist->name }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update Specialist</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
