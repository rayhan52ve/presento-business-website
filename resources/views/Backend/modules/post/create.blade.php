@extends('Backend.layout.master')

@section('page_title', 'Create-post')

@section('content')
    <div class="container-fluid col-xl-6 col-md-6 mt-5">
        <div class="row justify-content-center">
            <div class="card m-4">
                <div class="card-header">
                    <h3>Create Post</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form" method="POST" action="{{ route('post.store') }}">
                        @csrf
                        <label class="control-label" for="name">Post Name</label>
                        <input name="name" type="text" placeholder="Post Name" class="form-control"
                            value="{{ old('name') }}">

                        <label class="control-label" for="slug">Slug</label>
                        <input name="slug" type="text" placeholder="Post Slug" class="form-control"
                            value="{{ old('slug') }}">

                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label" for="status">Select Category</label>
                                <select name="category_id" class="form-control form-select"
                                    value="{{ old('category_id') }}">
                                    <option selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option class="text-success" value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label" for="status">Select Sub-Category</label>
                                <select name="subCategory_id" class="form-control form-select">
                                    <option selected>Select Sub-Category</option>
                                    <option class="text-success" value="">
                                    </option>
                                </select>
                            </div>
                        </div>

                        <label class="control-label" for="status">Status</label>
                        <select name="status" class="form-control form-select" value="{{ old('status') }}">
                            <option selected>Select Status</option>
                            <option class="text-success" value="1">Active</option>
                            <option class="text-danger" value="2">Inactive</option>
                        </select>

                        <div class="card-footer mt-3">
                            <input class="btn btn-outline-primary form-control" type="submit" value="Save Post">
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
