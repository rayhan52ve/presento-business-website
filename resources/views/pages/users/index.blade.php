
@extends('layout.master')

@section('content')
<div class="container-fluid col-xl-9 col-md-12 mt-4">
    <div class="row justify-content-center">
        <div class="">
            <div class="card" style="width: 60rem;">
                <div class="card-header">
                  <h3><i class="fa-regular fa-calendar-days"></i> Events</h3>
                </div>
                    <div class="card-body">
                      @if(session()->has('msg'))
                        <div class="alert alert-{{session('cls')}}">
                          {{session('msg')}}
                        </div>
                      @endif
                      <table class="table table-sm">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">password</th>
                            <th scope="col">Event List</th>
                            
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $sl=1 @endphp
                          @foreach ($users as $user)
                          <tr>
                            
                            <td>{{$sl++}}</td>
                            <td><b>{{$user->name}}<b></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->password}}</td>
                            <td>
                              <ol>
                                @foreach ($user->events as $event)
                                    <li>{{$event->title}}</li>
                                @endforeach
                              </ol>  
                            </td>
                            
                            <td>
                                <a href="{{route('user.show',$user->id)}}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
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
@endsection

