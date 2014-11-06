@extends('vhinx::layout.main')

@section('content')
      <h2>USERS</h2>
      {{ link_to('users/add', 'New', array('class'=>'btn btn-info btn-md')) }}
      <div class="table-responsive">          
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            
            <th>Group</th>
            <th>Action</th>
          </tr>
        </thead>
        
        <tbody>
            @foreach($users as $user) 
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            
            <td>{{ $user->email }}</td>
            <td>
                @foreach($user->groups as $usergroup)
                    {{  $usergroup->name }}
                @endforeach
            </td>
            <td>
                {{ link_to('users/edit/'.$user->id, 'Edit', array('class'=>'btn btn-info btn-md')) }}
                {{ link_to('#', 'Delete', array('class'=>'btn btn-danger btn-md','onclick'=>'deleteUser('.$user->id.')')) }}
                
                
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
      </div>
     {{ $users->links(); }}
    
     <script>
            
            function deleteUser(id){
                
                $( "#dialog > p" ).html('Do you want to delete selected data?');
                $( "#dialog" ).dialog({
			
			height: 200,
			width: 350,
			modal: true,
                        title : 'CONFIRM',
			buttons: {
				Ok: function() {
                                    
                                        window.parent.location.href='{{  url('users/delete') }}/'+id;
                                    
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
