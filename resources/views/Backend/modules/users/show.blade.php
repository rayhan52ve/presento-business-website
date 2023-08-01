
@extends('Backend.layout.master')

@section('page_title','Users-events')

@section('content')
<div class="container-fluid col-md-6 mt-4">
    <div class="row">
        <div class="">
            <div class="card h-100">
                <div class="card-header">
                  <h3><i class="fa-solid fa-user"></i> User Info</h3>
                </div>
                    <div class="card-body">
                      
                      <table class="table table-sm">
                        @foreach ($users->events as $event)
                        <tbody>
                          
                          <tr>
                            <th scope="col">ID</th>
                            <td><b>{{$event->id}}<b></td>
                          </tr>
                          <tr>
                            <th scope="col">Title</th>
                            <td>{{$event->title}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Description</th>
                            <td>{{$event->description}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Start Date</th>
                            <td>{{$event->start_date}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Ending Date</th>
                            <td>{{$event->end_date}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Priority</th>
                            @if($event->priority==1)
                                <td class="text-danger"><b>High Priority<b></td>
                              @elseif($event->priority==2)
                                <td class="text-warning"><b>Medium Priority<b></td>
                              @else
                                <td class="text-success"><b>Low Priority<b></td>
                              @endif
                          </tr>
                        </tbody>
                        @endforeach 
                            
                      </table>
                                            
                    </div>
                
            </div>
        </div>
        
    </div>
</div>  
  
@endsection