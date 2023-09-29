@extends('layouts.admin')
@section('title', 'Admin | Category | Create/Edit')
@section('content')
<div class="wrapper">

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @if(isset($category))
                            <h1 class="m-0">Edit Category</h1>
                        @else
                            <h1 class="m-0">Add Category</h1>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Category</li>
                            <li class="breadcrumb-item active">
                                @if(isset($category))
                                    Edit Category
                                @else
                                    Add Category
                                @endif
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-5">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        @endif
                        <form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($category))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="name"value="{{ isset($category) ? $category->name : old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ isset($category) ? $category->slug : old('slug') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="mySummernote" name="description" rows="5">{{ isset($category) ? $category->description : old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="image"name="image" accept="image/*">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                            <h5><u>SEO Tags</u></h5>
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ isset($category) ? $category->meta_title : old('meta_title') }}">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ isset($category) ? $category->meta_description : old('meta_description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{ isset($category) ? $category->meta_keyword : old('meta_keyword') }}">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="navbar_status" name="navbar_status" @if(isset($category) && $category->navbar_status) checked @endif>
                                <label for="navbar_status">Navbar Status</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="status" name="status" @if(isset($category) && $category->status) checked @endif>
                                <label for="status">Status</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ isset($category) ? 'Update Category' : 'Add Category' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection