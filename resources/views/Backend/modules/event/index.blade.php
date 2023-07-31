
@extends('Backend.layout.master')

@section('page_title','Event List')

@section('content')
<div class="container-fluid col-xl-10 col-md-12 mt-4">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                    <h3><i class="fa-regular fa-calendar-days"></i> Events</h3>
                    <a class="btn btn-sm btn-success m-2 " href="{{route('event.create')}}">Add</a>
                  </div>                </div>
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
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Ending Date</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Member</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $sl=1 @endphp
                          @foreach ($events as $event)
                          <tr>
                            
                            <td>{{$sl++}}</td>
                            <td><b>{{$event->title}}<b></td>
                            <td>{{substr($event->description,0,20)}}</td>
                            <td>{{\Carbon\Carbon::create($event->start_date)->format('d-m-y')}}</td>
                            <td>{{\Carbon\Carbon::create($event->end_date)->format('d-m-y')}}</td>
                              @if($event->priority==1)
                                <td class="text-danger"><b>High Priority<b></td>
                              @elseif($event->priority==2)
                                <td class="text-warning"><b>Medium Priority<b></td>
                              @else
                                <td class="text-success"><b>Low Priority<b></td>
                              @endif
                            <td>{{$event->user->name }}</td>
                            <td>{{$event->created_at->format('d-m-y h:i A')}}</td>
                            <td>{{$event->created_at != $event->updated_at ? $event->updated_at->format('d-m-y h:i A'):'Not Updated'}}</td>
                            <td>
                                <a href="{{route('event.show' ,$event->id)}}" class="btn btn-info btn-sm ml-1 mt-1"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{route('event.edit', $event->id)}}" class="btn btn-success btn-sm ml-1 mt-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                {!! Form::open(['method'=>'delete','id'=>'form_'.$event->id,'route'=>['event.destroy',$event->id]]) !!}
                                {!! Form::button('<i class="fa-solid fa-trash-can"></i>',['data-id'=>$event->id,'class'=>'delete btn btn-danger btn-sm ml-1 mt-1','type'=>'button']) !!}
                                {!! Form::close() !!} 
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

{{--Submit message--}}
@if (session()->has('msg'))
  @push('js')
    <script>
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        toast: 'true',
        title: '{{session('msg')}}',
        showConfirmButton: false,
        timer: 3000
      })
    </script>
  @endpush
@endif

{{--Delete message--}}
@if (session()->has('delmsg'))
@push('js')
<script>
  Swal.fire(
          'Deleted!',
          '{{session('delmsg')}}',
          'success'
        )
</script>
@endpush
@endif

{{--Delete Permission--}}
@push('js')
  <script>
    $('.delete').on('click',function(){
      let id = $(this).attr('data-id')
        Swal.fire({
          title: 'Are you sure to delete?',
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

