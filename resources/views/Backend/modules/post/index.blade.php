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
                            <table class="table table-sm" id="DataTbl">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Sl</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Order By</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Updated at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sl=1 @endphp
                                    @foreach ($posts as $post)
                                        <tr>

                                            <td>{{ $sl++ }}</td>
                                            <td><b>{{ $post->name }}<b></td>
                                            <td>{{ $post->slug }}</td>
                                            <td>{{ $post->order_by }}</td>
                                            <td>{!! $post->status == 1
                                                ? "<strong class='text-success' >Active</strong>"
                                                : "<strong class='text-danger' >Inactive</strong>" !!}</td>
                                            <td>{{ $post->created_at->format('d-m-y h:i A') }}</td>
                                            <td>{{ $post->created_at != $post->updated_at ? $post->updated_at->format('d-m-y h:i A') : 'Not Updated' }}
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
            </script>
        @endpush

    @endsection
