
@extends('Backend.layout.master')

@section('page_title','Create-sub-category')

@section('content')
<div class="container-fluid col-xl-5 col-md-5 mt-5">
    <div class="row justify-content-center">
        <div class="card m-4">
            <div class="card-header">
              <h3>Create Sub Category</h3>
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
                    <form class="form" method="POST" action="{{route('sub-category.store')}}">
                      @csrf
                        <label class="control-label" for="name">Sub Category Name</label>  
                        <input name="name" type="text" placeholder="Sub Category Name" class="form-control" value="{{old('name')}}">
                        
                        <label class="control-label" for="slug">Slug</label>  
                        <input name="slug" type="text" placeholder="Sub Category Slug" class="form-control" value="{{old('slug')}}">

                        <label class="control-label" for="status">Select Category</label>  
                        <select name="category_id" class="form-control form-select" value="{{old('category_id')}}">
                          <option selected disabled>Select Category</option>
                          @foreach ($categories as $category)
                          <option class="text-success" value="{{@$category->id}}">{{@$category->name}}</option>
                          @endforeach
                        </select>

                        <label class="control-label" for="order_by">Sub Category Serial</label>  
                        <input name="order_by" type="number" placeholder="Enter Serial" class="form-control" value="{{old('order_by')}}">

                        <label class="control-label" for="status">Status</label>  
                        <select name="status" class="form-control form-select" value="{{old('status')}}">
                          <option selected disabled>Select Status</option>
                          <option class="text-success" value="1">Active</option>
                          <option class="text-danger" value="2">Inactive</option>
                        </select>

                        <div class="card-footer mt-3">
                            <input class="btn btn-outline-primary form-control" type="submit" value="Save Sub Category">
                        </div>
                        </form> 
                </div>
            
        </div>
    </div>
        
</div>  
@endsection

