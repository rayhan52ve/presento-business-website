
@extends('layout.master')

@section('page_title','Edit-events')

@section('content')
<div class="container-fluid col-xl-5 col-md-3 mt-4">
    <div class="row justify-content-center">
        <div class="">
            <div class="card" style="width: 30rem;">
                <div class="card-header">
                  <h3>Edit Event</h3>
                </div>
                    <div class="card-body">
                      
                      @if($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif

                        {!! Form::model($event,['route'=>['event.update',$event->id],'method'=>'put']) !!}
                        @include('pages.event.form')
                        {{-- {!! Form::label('title','Event Title',['class'=>'control-label']) !!}
                        {!! Form::text('title',$event->title,['class'=>'form-control input-md','placeholder'=>'Event Title']) !!}
                        {!! Form::label('description','Description',['class'=>'label-control']) !!}
                        {!! Form::textarea('description',$event->description,['class'=>'form-control','rows'=>3]) !!}
                        {!! Form::label('start_date','Start Date',['class'=>'control-label']) !!}
                        {!! Form::date('start_date',\Carbon\Carbon::create($event->start_date),['class'=>'form-control']) !!}
                        {!! Form::label('end_date','End Date',['class'=>'control-label']) !!}
                        {!! Form::date('end_date', \Carbon\Carbon::create($event->end_date) ,['class'=>'form-control']) !!}
                        {!! Form::label('priority','Priority',['class'=>'control-label']) !!}
                        {!! Form::select('priority',[1=>'High Priority',2=>'Medium Priority',3=>'Low Priority'],$event->priority,['class'=>'form-select']) !!}
                        {!! Form::label('user_id','Select Member',['class'=>'control-label']) !!}
                        {!! Form::select('user_id',$user,$event->user_id,['class'=>'form-select']) !!} --}}
                        {!! Form::button('<i class="fa-solid fa-pen-to-square"></i>Update',['class'=>'btn btn-success mt-3','type'=>'submit']) !!}
                        {!! Form::close() !!}
                         {{-- <form class="form" method="POST" action="{{route('event.store')}}">
                          @csrf
                            <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="control-label" for="title">Event Title</label>  
                              <div class="">
                              <input value="{{$event->title}}" id="event_name" name="title" type="text" placeholder="Event Title" class="form-control input-md">
                                
                              </div>
                            </div>
                            
                            <!-- Textarea -->
                            <div class="form-group">
                              <label class="control-label" for="description">Description</label>
                              <div class="">                     
                                <textarea value="{{$event->description}}" class="form-control" id="description" name="description"></textarea>
                              </div>
                            </div>
                            
                            
                            
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="control-label" for="start_date">Start Date</label>  
                              <input value="{{$event->start_date}}" type="date" class="form-control" id="start_date" name="start_date" > 
                            
                              <label class="control-label" for="end_date">End Date</label>  
                              <input value="{{$event->end_date}}" type="date" class="form-control" id="end_date" name="End_date" > 
                            </div>
                            
                            <!-- Select Basic -->
                            <div class="form-group">
                              <label class="control-label" for="priority">Priority</label>
                              <div class="">
                                <select vlaue="" id="selectbasic" name="priority" class="form-control">
                                  <option class="text-success" value="1">High Priority</option>
                                  <option class="text-warning" value="2">Medium Priority</option>
                                  <option class="text-dander" value="3">Low Priority</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label" for="user_id">Select Staff</label>
                              <div class="">
                                
                                <select id="" name="user_id" class="form-control">
                                    
                                        <option  value="{{$user->id}}">{{$user->name}}</option>
                                    
                                </select>
                              </div>
                            </div>
                            
                            <div class="card-footer mt-3">
                                <input class="btn btn-outline-success form-control" type="submit" value="Update Event">
                                
                            </div>
                            </fieldset>
                            </form> --}}
                    </div>
                
            </div>
        </div>
        
    </div>
</div>  
@endsection

