@extends('Backend.layout.master')

@section('page_title','Show-category')

@section('content')
<div class="container-fluid col-xl-6 col-md-12 mt-4">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header">
                  <h3><i class="fa-solid fa-calendar-week"></i> Category Details</h3>
                </div>
                    <div class="card-body">
                      <table class="table table-sm">
                        <tbody>
                          <tr>
                            <th scope="col">ID</th>
                            <td><b>{{$category->id}}<b></td>
                          </tr>
                          <tr>
                            <th scope="col">Title</th>
                            <td>{{$category->name}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Slug</th>
                            <td>{{$category->slug}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Order By</th>
                            <td>{{$category->order_by}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Status</th>
                            <td>{!!$category->status == 1 ? '<b class="text-success">Active</b>':'<b class="text-danger">Inactive</b>'!!}</td>
                          </tr>
                          <tr>
                            <th scope="col">Created At</th>
                            <td>{{$category->created_at->toDayDateTimeString()}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Updated At</th>
                            <td>{{$category->created_at != $category->updated_at ? $category->updated_at->toDayDateTimeString():'Not Updated'}}</td>
                          </tr>
                        </tbody>  
                      </table>
                      <a href="{{route('category.index')}}" class="btn btn-outline-secondary" >Back</a>                       
                    </div>
                
            </div>
        </div>
        
    </div>
</div>  

@endsection