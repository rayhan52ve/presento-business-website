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
                                    <td>{!! $post->status == 1 ? '<b class="text-success">Published</b>' : '<b class="text-danger">Not Published</b>' !!}</td>
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
                                        <a href="{{ url('uploads/post/original/' . $post->photo) }}"
                                            data-lightbox="post-image" title="{{ $post->title }}">
                                            <img class="img-thumbnail post-image" title="Fullscreen View"
                                                src="{{ url('uploads/post/original/' . $post->photo) }}" alt="">
                                        </a>

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


    </div>

    @push('js')
    @endpush

@endsection
