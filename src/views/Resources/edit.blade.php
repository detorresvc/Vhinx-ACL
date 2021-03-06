@extends('vhinx::layout.main')

@section('content')
      <h2>EDIT RESOURCE</h2>
      {{ Form::model($resource,array('class' => 'form-horizontal','role'=>'form')) }} 
        <div class="form-group">
            {{ Form::label('name', 'Name',array('class'=>'control-label col-md-4')) }}
          <div class="col-md-5">          
            {{ Form::text('name',null,array('class'=>'form-control')) }}
          </div>
        </div>
      <div class="form-group">
            {{ Form::label('pattern', 'Pattern',array('class'=>'control-label col-md-4')) }}
          <div class="col-md-5">          
            {{ Form::text('pattern',null,array('class'=>'form-control')) }}
          </div>
        </div>
        <div class="form-group">
            {{ Form::label('target', 'Target',array('class'=>'control-label col-md-4')) }}
          <div class="col-md-5">          
            {{ Form::text('target',null,array('class'=>'form-control')) }}
          </div>
        </div>
       <div class="form-group">
            {{ Form::label('before_filter', 'Before Filter',array('class'=>'control-label col-md-4')) }}
          <div class="col-md-5">          
            {{ Form::text('before_filter',null,array('class'=>'form-control')) }}
          </div>
        </div>

      <div class="form-group">
            {{ Form::label('secure', 'Secure',array('class'=>'control-label col-md-4')) }}
          <div class="col-md-5">          
            {{ Form::select('secure', array('1' => 'True', '0' => 'False'),null,array('class'=>'control-label col-md-4')) }}
          </div>
        </div>
          <div class="form-group">   
              <div class="col-md-12" >    
                  {{ Form::submit('Submit',array('class'=>'btn btn-info center-block')) }}
              </div>
        </div>
      {{ Form::close() }}
   
@stop