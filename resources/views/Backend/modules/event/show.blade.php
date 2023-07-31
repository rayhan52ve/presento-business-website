@extends('Backend.layout.master')

@section('page_title','Show-events')

@section('content')
<div class="container-fluid col-xl-6 col-md-12 mt-4">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header">
                  <h3><i class="fa-solid fa-calendar-week"></i> Event Info</h3>
                </div>
                    <div class="card-body">
                      <table class="table table-sm">
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
                            <th scope="col">Created At</th>
                            <td>{{$event->created_at->toDayDateTimeString()}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Updated At</th>
                            <td>{{$event->created_at != $event->updated_at ? $event->updated_at->toDayDateTimeString():'Not Updated'}}</td>
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
                      </table> 
                      <a href="{{route('category.index')}}" class="btn btn-warning" >Back</a>                                             
                    </div>
                
            </div>
        </div>
        
    </div>
</div>  

<div class="container-fluid col-xl-4 col-md-6 mt-4">
  <div class="row">
      <div class="">
          <div class="card ">
              <div class="card-header">
                <h3><i class="fa-sharp fa-solid fa-user"></i> Staff Info</h3>
              </div>
                  <div class="card-body">
                    <table class="table table-sm">
                      <tbody>
                        <tr>
                          <th>Name</th>
                          <td>{{$event->user->name}}</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>{{$event->user->email}}</td>
                        </tr>
                    </table>                       
                  </div>
              
          </div>
      </div>
      
  </div>
</div>  
@endsection