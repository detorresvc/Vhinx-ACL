@extends('vhinx::layout.main')

@section('content')
      <h2>GROUPS</h2>
      {{ link_to('groups/add', 'New', array('class'=>'btn btn-info btn-md')) }}
      <div class="table-responsive">          
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
           
            <th>Action</th>
          </tr>
        </thead>
        
        <tbody>
            @foreach($groups as $group) 
          <tr>
            <td>{{ $group->id }}</td>
            <td>{{ $group->name }}</td>
            
            <td>
                {{ link_to('groups/resources/'.$group->id, 'Group Resources', array('class'=>'btn btn-info btn-md')) }}
                {{ link_to('groups/edit/'.$group->id, 'Edit', array('class'=>'btn btn-info btn-md')) }}
                {{ link_to('#', 'Delete', array('class'=>'btn btn-danger btn-md','onclick'=>'deleteGrp('.$group->id.')')) }}
                
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
      </div>
     {{ $groups->links(); }}
    <script>
            
            function deleteGrp(id){
                
                $( "#dialog > p" ).html('Do you want to delete selected data?');
                $( "#dialog" ).dialog({
			
			height: 200,
			width: 350,
			modal: true,
                        title : 'CONFIRM',
			buttons: {
				Ok: function() {
                                    
                                        window.parent.location.href='{{  url('groups/delete') }}/'+id;
                                    
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