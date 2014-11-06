@extends('vhinx::layout.main')

@section('content')
      <h2>NEW USER</h2>
      {{ Form::model($user,array('class' => 'form-horizontal','role'=>'form')) }} 
        <div class="form-group">
            {{ Form::label('username', 'Username',array('class'=>'control-label col-md-4')) }}
          <div class="col-md-5">          
            {{ Form::text('username', Input::old('username'),array('class'=>'form-control')) }}
          </div>
        </div>
     <div class="form-group">
            {{ Form::label('password', 'Password',array('class'=>'control-label col-md-4')) }}
          <div class="col-md-5">          
            {{ Form::password('password', array('class'=>'form-control')) }}
          </div>
        </div>
      <div class="form-group">
            {{ Form::label('password_confirmation', 'Confirm Password',array('class'=>'control-label col-md-4')) }}
          <div class="col-md-5">          
            {{ Form::password('password_confirmation', array('class'=>'form-control')) }}
          </div>
        </div>
      <div class="form-group">
            {{ Form::label('email', 'Email',array('class'=>'control-label col-md-4')) }}
          <div class="col-md-5">          
            {{ Form::text('email', Input::old('email'),array('class'=>'form-control')) }}
          </div>
        </div>
      
        <div class="form-group">
            {{ Form::label('Group', 'Group',array('class'=>'control-label col-md-4')) }}
          <div class="col-md-5">          

              @foreach($groups as $group)                    
                    {{ Form::checkbox('groups[]', $group->id,(in_array($group->id,$user->groups()->lists('id')) ? true : false )) }}
                    {{ Form::label('Group', $group->name,array('class'=>'')) }}
                    <br>
             @endforeach
          </div>
        </div>
          <div class="form-group">   
              <div class="col-md-12" >    
                  {{ Form::submit('Submit',array('class'=>'btn btn-info center-block')) }}
              </div>
        </div>
      {{ Form::close() }}
   
@stop