@extends('Backend.layout.master')

@section('page_title', 'Create-category')

@section('content')
    <div class="container-fluid col-xl-10 col-md-10 mt-5">
        <div class="row justify-content-between">
            <div class="col-md-7">
                <div class="card m-4">
                    <div class="card-header">
                        <h3>Profile</h3>
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
                        <form class="form" method="POST" action="{{ route('category.store') }}">
                            @csrf
                            <label class="control-label" for="name">Name</label>
                            <input name="name" id="name" type="text" placeholder="Category Name"
                                class="form-control @if ($errors->all()) {{ $errors->has('name') ? 'is-invalid' : 'is-valid' }} @endif"
                                value="{{ auth()->user()->name }}">

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="control-label" for="status">Category Status</label>
                                    <select name="status"
                                        class="form-control form-select @if ($errors->all()) {{ $errors->has('status') ? 'is-invalid' : 'is-valid' }} @endif"
                                        value="{{ old('status') }}">
                                        <option selected disabled>Select Status</option>
                                        <option class="text-success" value="1">Active</option>
                                        <option class="text-danger" value="2">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="status">Category Status</label>
                                    <select name="status"
                                        class="form-control form-select @if ($errors->all()) {{ $errors->has('status') ? 'is-invalid' : 'is-valid' }} @endif"
                                        value="{{ old('status') }}">
                                        <option selected disabled>Select Status</option>
                                        <option class="text-success" value="1">Active</option>
                                        <option class="text-danger" value="2">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer mt-3">
                                <input class="btn btn-outline-primary form-control" type="submit" value="Save">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card m-4">
                    <div class="card-header">
                        <h3>Profile Pic</h3>
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
                        <form class="form" method="POST" action="">
                            @csrf
                            <label class="control-label" for="name">Name</label>
                            <input name="name" id="name" type="text" placeholder="Category Name"
                                class="form-control @if ($errors->all()) {{ $errors->has('name') ? 'is-invalid' : 'is-valid' }} @endif"
                                value="{{ auth()->user()->name }}">

                            <div class="card-footer mt-3">
                                <input class="btn btn-outline-primary form-control" type="submit" value="Save">
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
