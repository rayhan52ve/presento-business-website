@extends('Backend.layout.master')

@section('page_title', 'Category List')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3><i class="fa-regular fa-calendar-days"></i> Categories</h3>
                            <a class="btn btn-sm btn-success m-2 " href="{{ route('category.create') }}">Add</a>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- @if (session()->has('msg'))
                        <div class="alert alert-{{session('cls')}}">
                          {{session('msg')}}
                        </div>
                      @endif --}}
                      <div class="table-responsive text-nowrap">
                        <table class="table table-sm" id="categoryDataTbl">
                            <thead class="table-light">
                                <tr>
                                    <th>{{__('SL') }}</th>
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
                                @foreach ($categories as $category)
                                    <tr>

                                        <td>{{ $sl++ }}</td>
                                        <td><b>{{ $category->name }}<b></td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->order_by }}</td>
                                        <td>{!! $category->status == 1
                                            ? "<strong class='text-success' >Active</strong>"
                                            : "<strong class='text-danger' >Inactive</strong>" !!}</td>
                                        <td>{{ $category->created_at->format('d-m-y h:i A') }}</td>
                                        <td>{{ $category->created_at != $category->updated_at ? $category->updated_at->format('d-m-y h:i A') : 'Not Updated' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('category.show', $category) }}"
                                                class="btn btn-info btn-sm ml-1 mt-1"><i class="fa-solid fa-eye"></i></a>
                                            <a href="{{ route('category.edit', $category) }}"
                                                class="btn btn-success btn-sm ml-1 mt-1"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <form id="{{ 'form_' . $category->id }}"
                                                action="{{ route('category.destroy', $category) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button data-id="{{ $category->id }}"
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
                    $('#categoryDataTbl').DataTable({
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
