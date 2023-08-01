
@extends('Backend.layout.master')

@section('page_title','Edit-tag')

@section('content')
<div class="container-fluid col-xl-5 col-md-3 mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="">
            <div class="card" style="width: 30rem;">
                <div class="card-header">
                  <h3><i class="fa-solid fa-tags"></i> Edit Tag</h3>
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

                         <form class="form" method="POST" action="{{route('tag.update',$tag)}}">
                          @method('PUT')
                          @csrf
                          <label class="control-label" for="name">tag Name</label>  
                          <input name="name" type="text" placeholder="tag Name" class="form-control" value="{{$tag->name}}">

                          <label class="control-label" for="slug">Slug</label>  
                          <input name="slug" type="text" placeholder="tag Slug" class="form-control" value="{{$tag->slug}}">
  
                          <label class="control-label" for="order_by">Order By</label>  
                          <input name="order_by" type="number" placeholder="Enter Serial" class="form-control" value="{{$tag->order_by}}">
  
                          <label class="control-label" for="status">Status</label>  
                          <select name="status" class="form-control form-select">
                            <option >Select Status</option>
                            <option class="text-success" value="1" {{$tag->status==1 ? 'selected':'' }}>Active</option>
                            <option class="text-danger" value="2" {{$tag->status==2 ? 'selected':'' }}>Inactive</option>
                          </select>

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

