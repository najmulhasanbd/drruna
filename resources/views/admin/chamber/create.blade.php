@extends('layouts.app')
@section('content')
<div class="py-4 container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="border-0 shadow-sm card">
                <div class="bg-white card-header fw-bold">Add Chamber</div>
                <div class="card-body">
                    <form action="{{ route('chamber.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Chamber Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="e.g. Popular Diagnostic Center" required>
                        </div>
                        <div class="mb-3">
                            <label>Visiting Time <span class="text-danger">*</span></label>
                            <input type="text" name="time" class="form-control @error('time') is-invalid @enderror" placeholder="e.g. Sat - Wed (5pm - 8pm)" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Save Chamber</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
