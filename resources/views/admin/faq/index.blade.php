@extends('layouts.app')

@section('content')
    <div class="app-content-header">
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <span class="mb-2 btn btn-success">Slider List</span>
                    <button class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Slider Add
                    </button>
                </div>

                <div class="mb-4 card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">SL</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $key => $item)
                                    <tr class="align-middle">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->question }}</td>
                                        <td>{{ $item->answer }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $item->id }}">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <a href="{{ route('faq.delete', $item->id) }}" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Slider</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                 <div class="modal-body">
                                                <form action="{{ route('faq.update', $item->id) }}" method="post">
                                                    @csrf
                                                    <div class="mb-3 form-group">
                                                        <label for="">Question</label>
                                                        <input type="text" class="form-control" name="question"
                                                            value="{{ $item->question }}" placeholder="enter question">
                                                    </div>
                                                    <div class="mb-3 form-group">
                                                        <label for="">Answer</label>
                                                        <textarea name="answer" class="form-control" cols="30" rows="5">{{ $item->answer }}</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-success w-100">Update FAQ</button>
                                                </form>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Add New Slider</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('faq.store') }}" method="post">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="">Question</label>
                            <input type="text" class="form-control" name="question" placeholder="enter question">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="">Answer</label>
                            <textarea name="answer" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
