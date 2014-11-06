@extends('vhinx::layout.main')

@section('content')
      <h2>RESOURCES</h2>
      {{ link_to('resources/add', 'New', array('class'=>'btn btn-info btn-md')) }}
      <div class="table-responsive">          
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Pattern</th>
            <th>Target</th>
            <th>Secure</th>
            <th>Action</th>
          </tr>
        </thead>
        
        <tbody>
            @foreach($resources as $resource) 
          <tr>
            <td>{{ $resource->id }}</td>
            <td>{{ $resource->name }}</td>
            <td>{{ $resource->pattern }}</td>
            <td>{{ $resource->target }}</td>
             <td>{{ $resource->secure }}</td>
            <td>
                {{ link_to('resources/edit/'.$resource->id, 'Edit', array('class'=>'btn btn-info btn-md')) }}
                
                {{ link_to('#', 'Delete', array('class'=>'btn btn-danger btn-md','onclick'=>'deleteRes('.$resource->id.')')) }}
                
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
      </div>
     {{ $resources->links(); }}
     <script>
            
            function deleteRes(id){
                
                $( "#dialog > p" ).html('Do you want to delete selected data?');
                $( "#dialog" ).dialog({
			
			height: 200,
			width: 350,
			modal: true,
                        title : 'CONFIRM',
			buttons: {
				Ok: function() {
                                    
                                        window.parent.location.href='{{  url('resources/delete') }}/'+id;
                                    
					$(this).dialog('close');
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			},
			close: function() {		
				$(this).dialog('close');
			}
		});
            }

   </script>
   
@stop