
@extends('Backend.layout.master')

@section('page_title','Event List')

@section('content')
<div class="container-fluid col-xl-9 col-md-12 mt-4">
    <div class="row justify-content-center">
        <div class="">
            <div class="card" style="width: 60rem;">
                <div class="card-header">
                  <h3><i class="fa-regular fa-calendar-days"></i> Categories</h3>
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
                            <td>{{$category->created_at->format('d-m-y h:i A') }}</td>
                            <td>{{$category->updated_at->format('d-m-y h:i A') }}</td>
                            <td>
                                <a href="{{route('category.edit', $category)}}" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{route('category.destroy',$category)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm" type="submit" ><i class="fa-solid fa-trash-can"></i></button>
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
</div>  
@endsection

