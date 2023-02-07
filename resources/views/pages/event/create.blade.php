
@extends('layout.master')

@section('content')
<div class="container-fluid col-xl-5 col-md-3 mt-4">
    <div class="row justify-content-center">
        <div class="">
            <div class="card" style="width: 30rem;">
                <div class="card-header">
                  <h3>Create Event</h3>
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

                      {!! Form::open(['route'=>'event.store','method'=>'post']) !!}
                        @include('pages.event.form')
                        {!! Form::button('Save Event',['class'=>'btn btn-info mt-3 form-control','type'=>'submit']) !!}
                        {!! Form::close() !!}
                        {{-- <form class="form" method="POST" action="{{route('event.store')}}">
                          @csrf
                            <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="control-label" for="title">Event Title</label>  
                              <div class="">
                              <input id="" name="title" type="text" placeholder="Event Title" class="form-control input-md">
                                
                              </div>
                            </div>
                            
                            <!-- Textarea -->
                            <div class="form-group">
                              <label class="control-label" for="description">Description</label>
                              <div class="">                     
                                <textarea class="form-control" id="description" name="description"></textarea>
                              </div>
                            </div>
                            
                            
                            
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="control-label" for="start_date">Start Date</label>  
                              <input type="date" class="form-control" id="start_date" name="start_date" > 
                            
                              <label class="control-label" for="end_date">End Date</label>  
                              <input type="date" class="form-control" id="end_date" name="End_date" > 
                            </div>
                            
                            <!-- Select Basic -->
                            <div class="form-group">
                              <label class="control-label" for="priority">Priority</label>
                              <div class="">
                                <select id="selectbasic" name="priority" class="form-control">
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
                                   @foreach ($users as $id=>$user)
                                         <option  value="{{$id}}">{{$user->name}}</option>
                                   @endforeach
                                </select>
                              </div>
                            </div>
                            
                            <div class="card-footer mt-3">
                                <input class="btn btn-outline-primary form-control" type="submit" value="Save Event">
                            </div>
                            </fieldset>
                            </form>  --}}
                    </div>
                
            </div>
        </div>
        
    </div>
</div>  
@endsection

