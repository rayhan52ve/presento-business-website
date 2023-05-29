
@extends('Backend.layout.master')

@section('page_title','Categories')
@section('content')
<div class="container-fluid col-xl-5 col-md-3 mt-5 pt-5">
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

                        
                        <form class="form" method="POST" action="{{route('category.store')}}">
                          @csrf
                            <div class="form-group">
                              <label class="control-label" for="title">Category Name</label>  
                              <input name="name" type="text" placeholder="Category Name" class="form-control input-md">
                            </div>
                            
                            <div class="card-footer mt-3">
                                <input class="btn btn-outline-primary form-control" type="submit" value="Save Category">
                            </div>
                            </form> 
                    </div>
                
            </div>
        </div>
        
    </div>
</div>  
@endsection

