{!! Form::label('title','Event Title',['class'=>'control-label']) !!}
{!! Form::text('title',null,['class'=>'form-control input-md','placeholder'=>'Event Title']) !!}
{!! Form::label('description','Description',['class'=>'label-control']) !!}
{!! Form::textarea('description',null,['class'=>'form-control','rows'=>3]) !!}
{!! Form::label('start_date','Start Date',['class'=>'control-label']) !!}
{!! Form::date('start_date',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
{!! Form::label('end_date','End Date',['class'=>'control-label']) !!}
{!! Form::date('end_date', \Carbon\Carbon::now() ,['class'=>'form-control']) !!}
{!! Form::label('priority','Priority',['class'=>'control-label']) !!}
{!! Form::select('priority',[1=>'High Priority',2=>'Medium Priority',3=>'Low Priority'],'null',['class'=>'form-select']) !!}
{!! Form::label('user_id','Select Member',['class'=>'control-label']) !!}
{!! Form::select('user_id',$users,null,['class'=>'form-select']) !!}