<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        {{ HTML::style('packages/Vhinx/Acl/bootstrap.min.css') }}
        {{ HTML::style('packages/Vhinx/Acl/jq/jquery-ui.css') }}
        {{ HTML::script('packages/Vhinx/Acl/jq/external/jquery/jquery.js') }}
        {{ HTML::script('packages/Vhinx/Acl/jq/jquery-ui.js') }}
       {{ HTML::script('packages/Vhinx/Acl/bootstrap.min.js') }}
        <title>VHINX::ACL for laravel</title>
    </head>
    <body>
        <div class="container">

            @if(Session::has('message')) 
               <div class="col-md-12  bg-danger" >  
                  <center class="center-block text-danger">{{ Session::get('message') }}</center>
               </div>
            @endif 
            
           <div class="content">
               @if(Auth::check())
               <div class="container">
                   <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Menu
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                      <li role="presentation">{{ link_to('users/index', 'Users', array('role'=>'menuitem','tabindex'=>'-1')) }}</li>
                      <li role="presentation">{{ link_to('groups/index', 'Groups', array('role'=>'menuitem','tabindex'=>'-1')) }}</li>
                      
                      <li role="presentation">{{ link_to('resources/index', 'Resources', array('role'=>'menuitem','tabindex'=>'-1')) }}</li>
                      <li role="presentation" class="divider"></li>
                      <li role="presentation">{{ link_to('/logout', 'Log out', array('role'=>'menuitem','tabindex'=>'-1')) }}</li>
                    </ul>
                  </div>
                @endif
                   
                   
                   @yield("content")
               </div>
           </div>
        </div>
          
        <div id="dialog">
            <p></p>
        </div>
    </body>
    
</html>