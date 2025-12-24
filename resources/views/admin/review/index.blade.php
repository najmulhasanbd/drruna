@extends('layouts.app')

@section('content')
    <div class="app-content-header">
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <span class="mb-2 btn btn-success">Review List</span>
                </div>

                <div class="mb-4 card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">SL</th>
                                    <th>Name</th>
                                    <th>Workplace</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($review as $key => $item)
                                    <tr class="align-middle">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->workplace }}</td>
                                        <td>{{ Str::limit($item->message, 50) }} <span class="btn btn-sm btn-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $item->id }}">More</span></td>
                                        <td>
                                            <a href="{{ route('review.status', $item->id) }}">
                                                <button type="button"
                                                    class="btn btn-sm {{ $item->status == 'pending' ? 'btn-warning' : 'btn-success' }}">
                                                    <i
                                                        class="fas {{ $item->status == 'pending' ? 'fa-clock' : 'fa-check-circle' }} me-1"></i>
                                                    {{ ucfirst($item->status) }}
                                                </button>
                                            </a>
                                            <form action="{{ route('review.destroy', $item->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this review?')">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Review Message from {{ $item->name }}</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Workplace:</strong> {{ $item->workplace }}</p>
                                                    <hr>
                                                    <p><strong>Message:</strong></p>
                                                    <div class="p-3 rounded bg-light">
                                                        {{ $item->message }}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
