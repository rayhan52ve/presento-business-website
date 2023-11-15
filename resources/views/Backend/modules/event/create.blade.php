
@extends('Backend.layout.master')

@section('page_title','Create-events')
@section('content')
<div class="container-fluid col-xl-5 col-md-5 mt-4">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
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

                        {!! Form::open(['route'=>'event.store','method'=>'post']) !!}
                        @include('Backend.modules.event.form')
                        {!! Form::button('Save Event',['class'=>'btn btn-info mt-3 form-control','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                
            </div>
        </div>
        
    </div>
</div>  
@endsection

