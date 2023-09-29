@extends('layouts.admin')
@section('title','Admin | Post')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Post</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Post</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Post List</h3>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Category Name</th>
                                    <th>Post Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $index => $post)
                                    <tr>
                                        <th>{{$index+1}}</th>
                                        <td>{{ $post->category->name}}</td>
                                        <td>{{ $post->name }}</td>
                                        <td>{{ $post->status == '1' ? 'Shown' : 'Hidden' }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary mx-2">Edit</a>
                                                <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
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
</div>
@endsection
