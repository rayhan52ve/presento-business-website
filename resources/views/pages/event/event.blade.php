{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ----------> --}}
@extends('layout.master')

@section('content')
<div class="container-fluid col-xl-6 col-md-6 mt-4">
    <div class="row justify-content-center">
        <div class="">
            <div class="card" style="width: 30rem;">
                <div class="card-header">
                  <h3>Create Event</h3>
                </div>
                    <div class="card-body">
                        <form class="form">
                            <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="control-label" for="title">Event Title</label>  
                              <div class="">
                              <input id="event_name" name="title" type="text" placeholder="Event Title" class="form-control input-md">
                                
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
                              <label class="control-label" for="user">Select Staff</label>
                              <div class="">
                                <select id="selectbasic" name="user" class="form-control">
                                  <option class="text-success" value="1">High Priorit</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="card-footer mt-3">
                                <input class="btn btn-outline-primary" type="submit" value="Save Event">
                            </div>
                            </fieldset>
                            </form> 
                    </div>
                
            </div>
        </div>
        
    </div>
</div>  
@endsection

