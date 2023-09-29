@extends('layouts.admin')
@section('title', 'Admin | Post | Create/Edit')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add User Role</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">User</li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-5">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <p class="form-control">{{$user->name}}</p>
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <p class="form-control">{{$user->email}}</p>
                        </div>
                        <div class="mb-3">
                            <label for="">Created At</label>
                            <p class="form-control">{{$user->created_at}}</p>
                        </div>
                        <form action="{{route('user.update',$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Role</label>
                                <select id="" class="form-control" name="role">
                                    @foreach (['User','Admin'] as $index => $item)
                                        <option value="{{$index}}" {{$index == $user->role ? 'selected': ''}}>{{$item}}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection