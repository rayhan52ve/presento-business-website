@extends('Backend.layout.master')

@section('page_title', 'Show-post')

@section('content')
    <div class="container-fluid  m-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa-solid fa-calendar-week"></i> Post Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <tbody>
                                <tr>
                                    <th scope="col">ID</th>
                                    <td><b>{{ $post->id }}<b></td>
                                </tr>
                                <tr>
                                    <th scope="col">Title</th>
                                    <td>{{ $post->title }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Slug</th>
                                    <td>{{ $post->slug }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Category</th>
                                    <td>
                                        <a
                                            href="{{ route('category.show', $post->category->id) }}">{{ $post->category->name }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Sub Category</th>
                                    <td>
                                        <a
                                            href="{{ route('sub-category.show', $post->sub_category->id) }}">{{ $post->sub_category->name }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Status</th>
                                    <td>{!! $post->status == 1 ? '<b class="text-success">Active</b>' : '<b class="text-danger">Inactive</b>' !!}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Approval</th>
                                    <td>{!! $post->is_approved == 1
                                        ? '<b class="text-light-green">Approved</b>'
                                        : '<b class="text-danger">Not Approved</b>' !!}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Description</th>
                                    <td>{!! $post->description !!}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Created At</th>
                                    <td>{{ $post->created_at->toDayDateTimeString() }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Updated At</th>
                                    <td>{{ $post->created_at != $post->updated_at ? $post->updated_at->toDayDateTimeString() : 'Not Updated' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Deleted At</th>
                                    <td>{{ $post->deleted_at != null ? $post->deleted_at->toDayDateTimeString() : 'Not Deleted' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Photo</th>
                                    <td>
                                        <img class="img-thumbnail post-image"
                                            data-src="{{ url('uploads/post/original/' . $post->photo) }}"
                                            src="{{ url('uploads/post/original/' . $post->photo) }}" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Tags</th>
                                    <td> @php
                                        $btnColors = [
                                            'btn-success',
                                            'btn-danger',
                                            'btn-info',
                                            'btn-warning',
                                            'btn-dark',
                                        ];
                                    @endphp
                                        @foreach ($post->tags as $tag)
                                            <a href="{{ route('tag.show', $tag->id) }}"><button
                                                    class="btn btn-sm mb-1 {{ $btnColors[rand(0, 4)] }}">{{ $tag->name }}</button></a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Back</a>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa-solid fa-calendar-week"></i> User Info</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-active">
                            <tbody>
                              <tr>
                                <th scope="col">ID</th>
                                <td><b>{{ $post->user->id }}<b></td>
                            </tr>
                            <tr>
                                <th scope="col">Name</th>
                                <td>{{ $post->user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Email</th>
                                <td>{{ $post->user->email }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Created At</th>
                                <td>{{ $post->created_at->toDayDateTimeString() }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Updated At</th>
                                <td>{{ $post->created_at != $post->updated_at ? $post->updated_at->toDayDateTimeString() : 'Not Updated' }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        

        </div>
        <!-- Button trigger Image Show modal -->
        <button id="image_show_button" type="button" class="btn btn-primary d-none" data-toggle="modal"
            data-target="#imageShow">
        </button>

        <!--Image Show Modal -->
        <div class="modal fade" id="imageShow" tabindex="-1" role="dialog" aria-labelledby="imageShowTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i>{{ $post->title }}</i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="img-thumbnail" id="display_image" alt="Blog Image">
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('js')
        <script>
            //show image
            $('.post-image').on('click', function() {
                let img = $(this).attr('data-src')
                $('#display_image').attr('src', img)
                $('#image_show_button').trigger('click')
            })
        </script>
    @endpush

@endsection
