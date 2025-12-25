@extends('layouts.app')

@section('content')
    <div class="app-content-header">
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <span class="mb-2 btn btn-success">Slider List</span>
                    <a href="{{ route('experience.create') }}" class="mb-2 btn btn-sm btn-success">Education Add</a>
                </div>

                <div class="mb-4 card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">SL</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Session</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($experiences as $key => $item)
                                    <tr class="align-middle">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($item->logo) }}"
                                                style="width: 60px; height: 60px; object-fit: cover;"
                                                class="border rounded">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->session }}</td>
                                        <td>{!! $item->description !!}</td>
                                        <td>
                                            <a href="{{ route('experience.edit', $item->id) }}"
                                                class="text-white btn btn-sm btn-info">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="{{ route('experience.delete', $item->id) }}"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
