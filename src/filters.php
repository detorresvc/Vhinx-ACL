<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});


use Illuminate\Database\Eloquent\ModelNotFoundException;
App::error(function(ModelNotFoundException $e)
{
    return \Response::make('404::Not Found', 404);
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter("xauth", function()
{
  
    if (\Auth::guest())
    {
        return \Redirect::route("users.login");
    }
    else
    {
      
        
        
        foreach (Auth::user()->groups as $group)
        {
         
            foreach ($group->resources as $resource)
            {
              
                if ($resource->pattern == "/".Route::getCurrentRoute()->getPath())
                {
                  
                    return;
                }
            }
        }
        
        return \Response::make('Access Denied',403);
    }
});


Route::filter('xauth.basic', function()
{ 
	return \Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

//Route::filter('guest', function()
//{
//	if (Auth::check()) return Redirect::to('/');
//});
Route::filter("xguest", function()
{
  
    if (\Auth::check())
    {
        
       if("/".Route::getCurrentRoute()->getPath() == '//'){
            return Redirect::route("users.home");
       }
    }
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (\Session::token() != \Input::get('_token'))
	{
		throw new \Illuminate\Session\TokenMismatchException;
	}
});


//Route::filter('old',function($route, $request, $value=0){
//     
//    if($value < 20){
//        return \Response::make('You are not allowed', 403);
//    }
//    return;
//    
//});