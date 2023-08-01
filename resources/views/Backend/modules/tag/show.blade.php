@extends('Backend.layout.master')

@section('page_title','Show-tag')

@section('content')
<div class="container-fluid col-xl-6 col-md-12 mt-4">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header">
                  <h3><i class="fa-solid fa-tags"></i> Tag Details</h3>
                </div>
                    <div class="card-body">
                      <table class="table table-sm">
                        <tbody>
                          <tr>
                            <th scope="col">ID</th>
                            <td><b>{{$tag->id}}<b></td>
                          </tr>
                          <tr>
                            <th scope="col">Title</th>
                            <td>{{$tag->name}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Slug</th>
                            <td>{{$tag->slug}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Order By</th>
                            <td>{{$tag->order_by}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Status</th>
                            <td>{!!$tag->status == 1 ? '<b class="text-success">Active</b>':'<b class="text-danger">Inactive</b>'!!}</td>
                          </tr>
                          <tr>
                            <th scope="col">Created At</th>
                            <td>{{$tag->created_at->toDayDateTimeString()}}</td>
                          </tr>
                          <tr>
                            <th scope="col">Updated At</th>
                            <td>{{$tag->created_at != $tag->updated_at ? $tag->updated_at->toDayDateTimeString():'Not Updated'}}</td>
                          </tr>
                        </tbody>  
                      </table>
                      <a href="{{route('tag.index')}}" class="btn btn-outline-secondary" >Back</a>                       
                    </div>
                
            </div>
        </div>
        
    </div>
</div>  

@endsection