@extends('Backend.layout.master')

@section('page_title', 'Edit-post')

@section('content')
    <div class="container-fluid col-xl-8 col-md-8 mt-5">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Post</h3>
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

                        <form class="form" method="POST" action="{{ route('post.update', $post) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label class="control-label mt-2" for="title">Post Title</label>
                            <input name="title" id="title" type="text" placeholder="Post Title"
                                class="form-control" value="{{ $post->title }}">

                            <label class="control-label mt-2" for="slug">Slug</label>
                            <input name="slug" id="slug" type="text" placeholder="Post Slug" class="form-control"
                                value="{{ $post->slug }}">

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="control-label" for="category_id">Select Category</label>
                                    <select name="category_id" id="category_id" class="form-control form-select"
                                        value="{{ old('category_id') }}">
                                        <option selected disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option class="text-success" value="{{ $category->id }}"
                                                {{ $category->id == $post->category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
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
                                <option class="text-success" value="1" {{ $post->status == '1' ? 'selected' : '' }}>
                                    Published</option>
                                <option class="text-danger" value="0" {{ $post->status == '0' ? 'selected' : '' }}>Not
                                    Published</option>
                            </select>

                            <label class="control-label mt-2" for="description">Descripton</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5"
                                placeholder="Write a Description...">{!! $post->description !!}</textarea>

                            <label class="control-label mt-2" for="">Select Tag</label>
                            </br>
                            <div class="row">
                                @foreach ($tags as $tag)
                                    <div class="col-3 col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                                id="flexCheckDefault" name="tag_ids[]"
                                                {{ in_array($tag->id, $selected_tags) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ $tag->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <label class="control-label mt-2" for="">Select Photo</label>
                            <input type="file" class="form-control" name="photo" id="photo">
                            <img id="preview" class="img-fluid rounded shadow img-thumbnail mt-2 border-info" src="{{ url('uploads/post/original/' . $post->photo) }}"
                                style="max-height: 200px;" alt="">

                                <img id="preview" src="#" alt="Image Preview" class="img-fluid rounded shadow img-thumbnail mt-2 border-info" style="max-width: 150px; display: none;">



                            <div class="card-footer mt-4">
                                <input class="btn btn-outline-primary form-control" type="submit" value="Update Post">
                            </div>
                        </form>
                    </div>

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
            const get_sub_categories = (category_id) => {
                let sub_categories;
                $('#subCategory_id').empty();
                $('#subCategory_id').append(`<option selected disabled>Select Sub-Category</option>`);
                axios.get(window.location.origin + '/admin/get-subcategory/' + category_id)
                    .then(res => {
                        sub_categories = res.data;

                        sub_categories.map((sub_category, index) => {
                            let selected = (sub_category.id == {{ $post->sub_category_id }}) ? 'selected' : '';
                            $('#subCategory_id').append(
                                `<option ${selected}  value="${sub_category.id}" >${sub_category.name}</option>`
                            );
                        });
                    });
            };

            get_sub_categories('{{ $post->category_id }}');

            $('#category_id').on('change', function() {
                let category_id = $('#category_id').val();
                get_sub_categories(category_id);
            });



            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });



            // slug
            $('#title').on('input', function() {
                let name = $(this).val()
                let slug = name.replaceAll(' ', '-')
                $('#slug').val(slug.toLowerCase());
            })
            // slug

            // Preview Image
            document.getElementById('photo').addEventListener('change', function(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    const preview = document.getElementById('preview');
                    preview.src = reader.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(event.target.files[0]);
            });
            // Preview Image
        </script>
    @endpush
@endsection
