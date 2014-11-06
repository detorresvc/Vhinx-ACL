@extends('vhinx::layout.main')

@section('content')
      <h2>EDIT GROUP</h2>
      {{ Form::model($group,array('class' => 'form-horizontal','role'=>'form')) }} 
        <div class="form-group">
            {{ Form::label('name', 'Name',array('class'=>'control-label col-md-4')) }}
          <div class="col-md-5">          
            {{ Form::text('name',null,array('class'=>'form-control')) }}
          </div>
        </div>
      
          <div class="form-group">   
              <div class="col-md-12" >    
                  {{ Form::submit('Submit',array('class'=>'btn btn-info center-block')) }}
              </div>
        </div>
      {{ Form::close() }}
   
@stop