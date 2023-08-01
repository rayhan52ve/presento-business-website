
@extends('Backend.layout.master')

@section('page_title','Tag List')

@section('content')
<div class="container-fluid m-4">
    <div class="row justify-content-center">
        
        <div class="col-xl-8 col-md-8">
            <div class="card m-2" style="width: 55rem;">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                    <h3><i class="fa-solid fa-tags"></i> Tags</h3>
                    <a class="btn btn-sm btn-success m-2 " href="{{route('tag.create')}}">Add</a>
                  </div>
                </div>
                    <div class="card-body">
                      {{-- @if(session()->has('msg'))
                        <div class="alert alert-{{session('cls')}}">
                          {{session('msg')}}
                        </div>
                      @endif --}}
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
                          @foreach ($tags as $tag)
                          <tr>
                            
                            <td>{{$sl++}}</td>
                            <td><b>{{$tag->name}}<b></td>
                            <td>{{$tag->slug}}</td>
                            <td>{{$tag->order_by}}</td>
                            <td>{!!$tag->status ==1 ? "<strong class='text-success' >Active</strong>":"<strong class='text-danger' >Inactive</strong>"!!}</td>
                            <td>{{$tag->created_at->format('d-m-y h:i A') }}</td>
                            <td>{{$tag->created_at != $tag->updated_at ?  $tag->updated_at->format('d-m-y h:i A'):'Not Updated' }}</td>
                            <td>
                                <a href="{{route('tag.show', $tag)}}" class="btn btn-info btn-sm ml-1 mt-1"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{route('tag.edit', $tag)}}" class="btn btn-success btn-sm ml-1 mt-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form id="{{'form_'.$tag->id}}" action="{{route('tag.destroy',$tag)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button data-id="{{$tag->id}}" class="delete btn btn-danger btn-sm ml-1 mt-1" type="button" ><i class="fa-solid fa-trash-can"></i></button>
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

@if(session()->has('msg'))
@push('js')
  <script>
     Swal.fire({
        position: 'top-end',
        icon: '{{session('cls')}}',
        toast: 'true',
        title: '{{session('msg')}}',
        showConfirmButton: false,
        timer: 3000
      })
  </script>
@endpush
@endif


@push('js')
  <script>
    $('.delete').on('click',function(){
      let id = $(this).attr('data-id')
      // console.log(id)

        Swal.fire({
          title: 'Are you sure to delete this tag?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $(`#form_${id}`).submit()

          }
        })
      })


      
  </script>
@endpush

@endsection

