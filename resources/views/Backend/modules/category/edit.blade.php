
@extends('Backend.layout.master')

@section('page_title','Edit-events')

@section('content')
<div class="container-fluid col-xl-5 col-md-3 mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="">
            <div class="card" style="width: 30rem;">
                <div class="card-header">
                  <h3>Edit Category</h3>
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

                         <form class="form" method="POST" action="{{route('category.update',$category)}}">
                          @method('PUT')
                          @csrf
                            <div class="form-group">
                              <label class="control-label" for="name">Category name</label>  
                              <div class="">
                              <input value="{{$category->name}}" id="event_name" name="name" type="text" placeholder="Update category name" class="form-control input-md">
                                
                              </div>
                            </div>
                            
                            <div class="card-footer mt-3">
                                <input class="btn btn-outline-success form-control" type="submit" value="Update Event">
                                
                            </div>
                            </form> 
                    </div>
                
            </div>
        </div>
        
    </div>
</div>  
@endsection

