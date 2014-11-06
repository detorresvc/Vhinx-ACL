@extends('vhinx::layout.main')

@section('content')
      <h2>LOG IN</h2>
      {{ Form::open(array('class' => 'form-horizontal','role'=>'form')) }} 
        <div class="form-group">
            {{ Form::label('username', 'Username',array('class'=>'control-label col-md-4')) }}
          <div class="col-md-5">          
            {{ Form::text('username','',array('class'=>'form-control')) }}
          </div>
        </div>
        <div class="form-group">   
            {{ Form::label('password', 'Password',array('class'=>'control-label col-md-4')) }}
          <div class="col-md-5">          
             {{ Form::password('password',array('class'=>'form-control')) }}
          </div>
        </div>
          <div class="form-group">   
              <div class="col-md-12" >    
                  {{ Form::submit('Log in',array('class'=>'btn btn-info center-block')) }}
              </div>
        </div>
      {{ Form::close() }}
   
@stop