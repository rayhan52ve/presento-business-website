@extends('Backend.layout.master')

@section('page_title','Show-sub-category')

@section('content')
<div class="container-fluid col-xl-6 col-md-12 mt-4">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header">
                  <h3><i class="fa-solid fa-calendar-week"></i> Sub Category Details</h3>
                </div>
                    <div class="card-body">
                      <table class="table table-sm">
                        <tbody>
                          <tr>
                            <th scope="col">ID</th>
                            <td><b>{{$subCategory->id}}<b></td>
                          </tr>
                          <tr>
                            <th scope="col">Sub Category</th>
                            <td>{{$subCategory->name}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Slug</th>
                            <td>{{$subCategory->slug}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Category</th>
                            <td>{{$subCategory->category->name}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Order By</th>
                            <td>{{$subCategory->order_by}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Status</th>
                            <td>{!!$subCategory->status == 1 ? '<b class="text-success">Active</b>':'<b class="text-danger">Inactive</b>'!!}</td>
                          </tr>
                          <tr>
                            <th scope="col">Created At</th>
                            <td>{{$subCategory->created_at->toDayDateTimeString()}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Updated At</th>
                            <td>{{$subCategory->created_at != $subCategory->updated_at ? $subCategory->updated_at->toDayDateTimeString():'Not Updated'}}</td>
                          </tr>
                        </tbody>  
                      </table>
                      <a href="{{route('sub-category.index')}}" class="btn btn-outline-secondary" >Back</a>                       
                    </div>
                
            </div>
        </div>
        
    </div>
</div>  

@endsection