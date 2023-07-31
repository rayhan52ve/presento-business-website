
@extends('Backend.layout.master')

@section('page_title','Category List')

@section('content')
<div class="container-fluid m-4">
    <div class="row justify-content-center">
        
        <div class="col-xl-8 col-md-8">
            <div class="card m-2" style="width: 55rem;">
                <div class="card-header">
                  <h3><i class="fa-regular fa-calendar-days"></i> Categories</h3>
                  <a class="btn btn-sm btn-success position-absolute top-0 end-0 m-3" href="{{route('category.create')}}">Add Event</a>
                </div>
                    <div class="card-body">
                      @if(session()->has('msg'))
                        <div class="alert alert-{{session('cls')}}">
                          {{session('msg')}}
                        </div>
                      @endif
                      <table class="table table-sm">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Order By</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $sl=1 @endphp
                          @foreach ($categories as $category)
                          <tr>
                            
                            <td>{{$sl++}}</td>
                            <td><b>{{$category->name}}<b></td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->order_by}}</td>
                            <td>{!!$category->status ==1 ? "<strong class='text-success' >Active</strong>":"<strong class='text-danger' >Inactive</strong>"!!}</td>
                            <td>{{$category->created_at->format('d-m-y h:i A') }}</td>
                            <td>{{$category->created_at != $category->updated_at ?  $category->updated_at->format('d-m-y h:i A'):'Not Updated' }}</td>
                            <td>
                                <a href="{{route('category.show', $category)}}" class="btn btn-info btn-sm ml-1 mt-1"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{route('category.edit', $category)}}" class="btn btn-success btn-sm ml-1 mt-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{route('category.destroy',$category)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm ml-1 mt-1" type="submit" ><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>                       
                    </div>
                
            </div>
        </div>
        
    
</div>  
@endsection

