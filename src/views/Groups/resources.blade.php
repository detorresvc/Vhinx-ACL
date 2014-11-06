@extends('vhinx::layout.main')

@section('content')
        <h2>GROUP RESOURCES :: {{ $group->name }} </h2>
      {{ Form::open(array('class' => 'form-horizontal','role'=>'form')) }} 
         <div class="table-responsive">          
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>


                </tr>
              </thead>

              <tbody>
                    @foreach($resources as $resource)    
                      <tr>
                        <td>{{ Form::checkbox('resources[]', $resource->id,(in_array($resource->id,$group->resources()->lists('id')) ? true : false )) }}</td>
                        <td>{{ Form::label('Group', $resource->name,array('class'=>'')) }}</td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
         </div>
      
       
          <div class="form-group">   
              <div class="col-md-12" >    
                  {{ Form::submit('Submit',array('class'=>'btn btn-info center-block')) }}
              </div>
        </div>
      {{ Form::close() }}
   
@stop