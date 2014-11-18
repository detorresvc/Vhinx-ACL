<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


use Vhinx\Acl\models\Resource as Resource;



Route::group(["before" => "xguest"], function()
{
    if (Schema::hasTable('resource')){
        $resources = Resource::where("secure", false)->get();

        foreach ($resources as $resource)
        {

            Route::any($resource->pattern, [
                "as"   => $resource->name,
                "uses" => $resource->target 
            ]);
        }
    }
});

Route::group(["before" => "xauth"], function()
{
     if (Schema::hasTable('resource')){
        $resources = Resource::where("secure", true)->get();

        foreach ($resources as $resource)
        {

            Route::any($resource->pattern, [
                "before" => $resource->before_filter,
                "as"   => $resource->name,
                "uses" => $resource->target
            ]);
        }
     }
});


