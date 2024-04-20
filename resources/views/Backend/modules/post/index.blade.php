@extends('Backend.layout.master')

@section('page_title', 'Post List')

@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">

            <div class="col-xl-11 col-md-11">
                <div class="card m-2">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3><i class="fa-regular fa-calendar-days"></i> Posts</h3>
                            <a class="btn btn-sm btn-success m-2 " href="{{ route('post.create') }}">Add</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table table-sm post-table table-bordered table-striped table-striped-columns text-center"
                                id="">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Sl</th>
                                        <th scope="col">
                                            <p>Title</p>
                                            <hr>
                                            <p>Slug</p>
                                        </th>
                                        <th scope="col">
                                            <p>Category</p>
                                            <hr>
                                            <p>Sub-Category</p>
                                        </th>
                                        <th scope="col">
                                            <p>Status</p>
                                            <hr>
                                            <p>Approval</p>
                                        </th>
                                        <th>Photo</th>
                                        <th>Tags</th>
                                        <th scope="col">
                                            <p>Created at</p>
                                            <hr>
                                            <p>Updated at</p>
                                            <hr>
                                            <p>Created By</p>
                                        </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sl=1 @endphp
                                    @foreach ($posts as $key => $post)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <p>{{ $post->title }}</p>
                                                <hr>
                                                <p>{{ $post->slug }}</p>
                                            </td>
                                            <td>
                                                <p><a
                                                        href="{{ route('category.show', $post->category->id) }}">{{ $post->category->name }}</a>
                                                </p>
                                                <hr>
                                                <p><a
                                                        href="{{ route('sub-category.show', $post->sub_category->id) }}">{{ $post->sub_category->name }}</a>
                                                </p>
                                            </td>
                                            <td>
                                                <p>{!! $post->status == 1
                                                    ? "<strong class='text-success' >Published</strong>"
                                                    : "<strong class='text-danger' >Not Published</strong>" !!}</p>
                                                <hr>
                                                <p>{!! $post->is_approved == 1
                                                    ? "<strong class='text-light-green' >Approved</strong>"
                                                    : "<strong class='text-danger' >Not Approved</strong>" !!}</p>
                                            </td>
                                            <td>
                                                <img class="img-thumbnail post-image"
                                                    data-src="{{ url('uploads/post/original/' . $post->photo) }}"
                                                    src="{{ url('uploads/post/original/' . $post->photo) }}" alt="">
                                            </td>
                                            <td>
                                                @php
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
                                            <td>
                                                <p>{{ $post->created_at->format('d-m-y h:i A') }}</p>
                                                <hr>
                                                <p>{{ $post->created_at != $post->updated_at ? $post->updated_at->format('d-m-y h:i A') : 'Not Updated' }}
                                                </p>
                                                <hr>
                                                <p>{{ $post->user->name }}</p>
                                            </td>
                                            <td>
                                                <a href="{{ route('post.show', $post) }}"
                                                    class="btn btn-info btn-sm ml-1 mt-1"><i
                                                        class="fa-solid fa-eye"></i></a>
                                                <a href="{{ route('post.edit', $post) }}"
                                                    class="btn btn-success btn-sm ml-1 mt-1"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <form id="{{ 'form_' . $post->id }}"
                                                    action="{{ route('post.destroy', $post) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-id="{{ $post->id }}"
                                                        class="delete btn btn-danger btn-sm ml-1 mt-1" type="button"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2">
                                {{ $posts->links() }}
                            </div>
                        </div>
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
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Post Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img class="img-thumbnail" id="display_image" alt="Blog Image">
                    </div>
                </div>
            </div>
        </div>

    </div>

    @if (session()->has('msg'))
        @push('js')
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{{ session('cls') }}',
                    toast: 'true',
                    title: '{{ session('msg') }}',
                    showConfirmButton: false,
                    confirmButtonText: "ok",
                    timerProgressBar: false,
                    showCancelButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showCloseButton: true,
                    timer: 3000
                })
            </script>
        @endpush
    @endif


    @push('js')
        <script>
            $(document).ready(function() {
                $('#DataTbl').DataTable({
                    "paging": true,
                    "pageLength": 10,
                    "lengthMenu": [10, 25, 50, 100],
                    "ordering": true,
                    "searching": true,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true
                });
            });

            $('.delete').on('click', function() {
                let id = $(this).attr('data-id')
                // console.log(id)

                Swal.fire({
                    title: 'Are you sure you want to delete?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#form_${id}`).submit()

                    }
                })
            })


            //show image
            $('.post-image').on('click', function() {
                let img = $(this).attr('data-src')
                $('#display_image').attr('src', img)
                $('#image_show_button').trigger('click')
            })
        </script>
    @endpush

@endsection
