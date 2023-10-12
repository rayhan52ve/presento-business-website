@extends('Backend.layout.master')

@section('page_title', 'Users List')

@section('content')
    <div class="container-fluid col-xl-11 col-md-11 mt-5">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa-solid fa-user"></i> Users</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm align-middle">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Sl</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Event List</th>

                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sl=1 @endphp
                                    @foreach ($users as $user)
                                        <tr>

                                            <td>{{ $sl++ }}</td>
                                            <td><b>{{ $user->name }}<b></td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <ol>
                                                    @foreach ($user->events as $event)
                                                        <li>{{ $event->title }}</li>
                                                    @endforeach
                                                </ol>
                                            </td>

                                            <td>
                                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm"><i
                                                        class="fa-solid fa-eye"></i></a>
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
    </div>
@endsection
