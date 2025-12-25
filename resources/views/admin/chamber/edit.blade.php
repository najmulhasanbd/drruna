@extends('layouts.app')
@section('content')
<div class="py-4 container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="border-0 shadow-sm card">
                <div class="bg-white card-header fw-bold">Edit Chamber</div>
                <div class="card-body">
                    <form action="{{ route('chamber.update', $chamber->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Chamber Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $chamber->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label>Visiting Time</label>
                            <input type="text" name="time" class="form-control" value="{{ $chamber->time }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update Chamber</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
