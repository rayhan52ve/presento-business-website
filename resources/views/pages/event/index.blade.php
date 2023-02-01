
@extends('layout.master')

@section('content')
<div class="container-fluid col-xl-7 col-md-9 mt-4">
    <div class="row justify-content-center">
        <div class="">
            <div class="card" style="width: 50rem;">
                <div class="card-header">
                  <h3><i class="fa-solid fa-calendar-lines-pen"></i>Events</h3>
                </div>
                    <div class="card-body">
                      <table class="table table-sm">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Ending Date</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Member</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $sl=1 @endphp
                          @foreach ($events as $event)
                          <tr>
                            
                            <td>{{$sl++}}</td>
                            <td>{{$event->title}}</td>
                            <td>{{$event->description}}</td>
                            <td>{{$event->start_date}}</td>
                            <td>{{$event->end_date}}</td>
                            <td>{{$event->priority}}</td>
                            <td>{{$event->user}}</td>
                            <td>
                              <div class="btn-group-horizontal">
                                <a href="" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                                <a href="" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                              </div>
                              
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

