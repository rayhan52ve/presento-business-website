{!! Form::label('title','Event Title',['class'=>'control-label']) !!}
{!! Form::text('title',null,['class'=>'form-control input-md','placeholder'=>'Write Event Title']) !!}
{!! Form::label('description','Description',['class'=>'label-control']) !!}
{!! Form::textarea('description',null,['class'=>'form-control','rows'=>3,'placeholder'=>'Write Description']) !!}
{!! Form::label('start_date','Start Date',['class'=>'control-label']) !!}
{!! Form::date('start_date',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Select Start Date']) !!}
{!! Form::label('end_date','End Date',['class'=>'control-label']) !!}
{!! Form::date('end_date', \Carbon\Carbon::now() ,['class'=>'form-control','placeholder'=>'Select End Date']) !!}
{!! Form::label('priority','Priority',['class'=>'control-label']) !!}
{!! Form::select('priority',[1=>'High Priority',2=>'Medium Priority',3=>'Low Priority'],'null',['class'=>'form-select','placeholder'=>'Select Priority Level']) !!}
{!! Form::label('user_id','Select Member',['class'=>'control-label']) !!}
{!! Form::select('user_id',$users,null,['class'=>'form-select','placeholder'=>'Select User']) !!}