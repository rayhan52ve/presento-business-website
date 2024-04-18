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
                    <form class="form" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                        @csrf
                        <label class="control-label mt-2" for="title">Post Title</label>
                        <input name="title" id="title" type="text" placeholder="Post Title" class="form-control"
                            value="{{ old('name') }}">

                        <label class="control-label mt-2" for="slug">Slug</label>
                        <input name="slug" id="slug" type="text" placeholder="Post Slug" class="form-control"
                            value="{{ old('slug') }}">

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="control-label" for="category_id">Select Category</label>
                                <select name="category_id" id="category_id" class="form-control form-select"
                                    value="{{ old('category_id') }}">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option class="text-success" value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label" for="subCategory_id">Select Sub-Category</label>
                                <select name="sub_category_id" id="subCategory_id" class="form-control form-select">
                                    <option selected disabled>Select Sub-Category</option>

                                    </option>
                                </select>
                            </div>
                        </div>

                        <label class="control-label mt-2" for="status">Status</label>
                        <select name="status" class="form-control form-select" value="{{ old('status') }}">
                            <option selected>Select Status</option>
                            <option class="text-success" value="1" {{ old('status') == "1" ? 'selected' : '' }}>Published</option>
                            <option class="text-danger" value="0" {{ old('status') == "0" ? 'selected' : '' }}>Not Published</option>
                        </select>

                        <label class="control-label mt-2" for="description">Descripton</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="5"
                            value="{{ old('description') }}" placeholder="Write a Description..."></textarea>

                        <label class="control-label mt-2" for="">Select Tag</label>
                        </br>
                        <div class="row">
                            @foreach ($tags as $tag)
                                <div class="col-3 col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                            id="flexCheckDefault" name="tag_ids[]">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $tag->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <label class="control-label mt-2" for="">Select Photo</label>
                        <input type="file" class="form-control" name="photo" id="photo">


                        <div class="card-footer mt-4">
                            <input class="btn btn-outline-primary form-control" type="submit" value="Save Post">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @push('css')
        <style>
            .ck.ck-editor__main>.ck-editor__editable {
                min-height: 250px;
            }
        </style>
    @endpush

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.8/axios.min.js"
            integrity="sha512-PJa3oQSLWRB7wHZ7GQ/g+qyv6r4mbuhmiDb8BjSFZ8NZ2a42oTtAq5n0ucWAwcQDlikAtkub+tPVCw4np27WCg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>


        <script>
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });


            $('#category_id').on('change', function() {
                let category_id = $(this).val();
                let sub_categories
                $('#subCategory_id').empty()
                $('#subCategory_id').append(`<option selected disabled>Select Sub-Category</option>`)
                axios.get(window.location.origin + '/admin/get-subcategory/' + category_id).then(res => {
                    sub_categories = res.data

                    sub_categories.map((sub_category, index) => {
                        $('#subCategory_id').append(
                            `<option value="${sub_category.id}">${sub_category.name}</option>`);
                    })
                })
            })

            // slug
            $('#title').on('input', function() {
                let name = $(this).val()
                let slug = name.replaceAll(' ', '-')
                $('#slug').val(slug.toLowerCase());
            })
            // slug
        </script>
    @endpush
@endsection
