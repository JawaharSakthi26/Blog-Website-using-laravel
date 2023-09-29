@extends('layouts.admin')
@section('title', 'Admin | Post | Create/Edit')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @if(isset($post))
                            <h1 class="m-0">Edit Post</h1>
                        @else
                            <h1 class="m-0">Add Post</h1>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Post</li>
                            <li class="breadcrumb-item active">
                                @if(isset($post))
                                    Edit Post
                                @else
                                    Add Post
                                @endif
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    </div>
    @endif
        <div class="row mx-5">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="card-body">
                        <form action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($post))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="category_name">Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="">-- Select Category --</option>
                                   @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{ isset($post) ? $post->category_id == $category->id ? 'selected' : '' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="post_name">Post Name</label>
                                <input type="text" class="form-control" id="post_name" name="name" value="{{ isset($post) ? $post->name : old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ isset($post) ? $post->slug : old('slug') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="mySummernote" name="description" rows="5">{{ isset($post) ? $post->description : old('description') }}</textarea>
                            </div>

                            <h5><u>SEO Tags</u></h5>
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ isset($post) ? $post->meta_title : old('meta_title') }}">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ isset($post) ? $post->meta_description : old('meta_description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{ isset($post) ? $post->meta_keyword : old('meta_keyword') }}">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="status" name="status" @if(isset($post) && $post->status) checked @endif>
                                <label for="status">Status</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ isset($post) ? 'Update Post' : 'Add Post' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection