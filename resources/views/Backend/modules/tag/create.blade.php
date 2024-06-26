@extends('Backend.layout.master')

@section('page_title', 'Create-tag')

@section('content')
    <div class="container-fluid col-xl-5 col-md-5 mt-5">
        <div class="row justify-content-center">
            <div class="card m-4">
                <div class="card-header">
                    <h3><i class="fa-solid fa-tag"></i> Create Tag</h3>
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
                    <form class="form" method="POST" action="{{ route('tag.store') }}">
                        @csrf
                        <label class="control-label" for="name">Tag Name</label>
                        <input name="name" id="name" type="text" placeholder="Tag Name" class="form-control"
                            value="{{ old('name') }}">

                        <label class="control-label" for="slug">Slug</label>
                        <input name="slug" id="slug" type="text" placeholder="Tag Slug" class="form-control"
                            value="{{ old('slug') }}">

                        <label class="control-label" for="order_by">Tag Serial</label>
                        <input name="order_by" type="number" placeholder="Enter Serial" class="form-control"
                            value="{{ old('order_by') }}">

                        <label class="control-label" for="status">Tag Status</label>
                        <select name="status" class="form-control form-select" value="{{ old('status') }}">
                            <option selected disabled>Select Status</option>
                            <option class="text-success" value="1">Active</option>
                            <option class="text-danger" value="2">Inactive</option>
                        </select>

                        <div class="card-footer mt-3">
                            <input class="btn btn-outline-primary form-control" type="submit" value="Save Tag">
                        </div>
                    </form>
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
