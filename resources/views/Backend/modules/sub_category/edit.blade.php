@extends('Backend.layout.master')

@section('page_title', 'Edit-sub-category')

@section('content')
    <div class="container-fluid col-xl-5 col-md-5 mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Sub Category</h3>
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

                        <form class="form" method="POST" action="{{ route('sub-category.update', $subCategory) }}">
                            @method('PUT')
                            @csrf
                            <label class="control-label" for="name">Sub Category Name</label>
                            <input name="name" id="name" type="text" placeholder="Category Name" class="form-control"
                                value="{{ $subCategory->name }}">

                            <label class="control-label" for="slug">Slug</label>
                            <input name="slug" id="slug" type="text" placeholder="Category Slug" class="form-control"
                                value="{{ $subCategory->slug }}">

                            <label class="control-label" for="status">Select Category</label>
                            <select name="category_id" class="form-control form-select" value="{{ old('category_id') }}">
                                <option>Select Category</option>
                                @foreach ($categories as $category)
                                    <option @selected($category->id == $subCategory->category->id) class="text-success" value="{{ @$category->id }}">
                                        {{ @$category->name }}</option>
                                @endforeach
                            </select>

                            <label class="control-label" for="order_by">Category Serial</label>
                            <input name="order_by" type="number" placeholder="Enter Serial" class="form-control"
                                value="{{ $subCategory->order_by }}">

                            <label class="control-label" for="status">Category Status</label>
                            <select name="status" class="form-control form-select">
                                <option>Select Status</option>
                                <option class="text-success" value="1" {{ $subCategory->status == 1 ? 'selected' : '' }}>
                                    Active</option>
                                <option class="text-danger" value="2" {{ $subCategory->status == 2 ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>

                            <div class="card-footer mt-3">
                                <input class="btn btn-outline-success form-control" type="submit" value="Update Event">

                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>

    @push('js')
        <script>
            $('#name').on('input', function() {
                let name = $(this).val()
                let slug = name.replaceAll(' ', '-')
                $('#slug').val(slug.toLowerCase());
            })
        </script>
    @endpush
@endsection
