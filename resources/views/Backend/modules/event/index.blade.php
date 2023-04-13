
@extends('Backend.layout.master')

@section('page_title','Event List')

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
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Ending Date</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Member</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $sl=1 @endphp
                          @foreach ($events as $event)
                          <tr>
                            
                            <td>{{$sl++}}</td>
                            <td><b>{{$event->title}}<b></td>
                            <td>{{substr($event->description,0,20)}}</td>
                            <td>{{\Carbon\Carbon::create($event->start_date)->format('d-m-y')}}</td>
                            <td>{{\Carbon\Carbon::create($event->end_date)->format('d-m-y')}}</td>
                              @if($event->priority==1)
                                <td class="text-danger"><b>High Priority<b></td>
                              @elseif($event->priority==2)
                                <td class="text-warning"><b>Medium Priority<b></td>
                              @else
                                <td class="text-success"><b>Low Priority<b></td>
                              @endif
                            <td>{{$event->user->name }}</td>
                            <td>{{$event->created_at->format('d-m-y h:i A') }}</td>
                            <td>
                                <a href="{{route('event.show' ,$event->id)}}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{route('event.edit', $event->id)}}" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                {!! Form::open(['method'=>'delete','route'=>['event.destroy',$event->id]]) !!}
                                {!! Form::button('<i class="fa-solid fa-trash-can"></i>',['class'=>'btn btn-danger btn-sm','type'=>'submit']) !!}
                                {!! Form::close() !!} 
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

