<?php namespace Vhinx\Acl\controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Vhinx\Acl\models\Resource;

class ResourcesController extends \BaseController {
    
    function index(){
        
        $resources = Resource::paginate(15);
        
        return View::make('vhinx::resources.index')->with(compact('resources'));
    }
    
    
    function add(){
        
        
         if(Request::isMethod('post')){
             
             $resource = new Resource;
             $v = Validator::make(
                        Input::all(),
                        $resource->rules
                     );
            
             if ($v->fails()){
                 
                 return Redirect::route('resources.add')->withMessage($v->messages()->first())->withInput();
            }
             
             $resource->name = Input::get('name');
             $resource->pattern = Input::get('pattern');
             $resource->target = Input::get('target');
             $resource->secure = Input::get('secure');
             $resource->before_filter = Input::get('before_filter');
             $resource->save();
             return Redirect::route('resources.edit',$resource->id)->withMessage('Successfully Saved')->withInput();
         }
        
        return View::make('vhinx::resources.add');
    }
    
    function edit($id){
        
        
         if(Request::isMethod('post')){
             
             $resource = new Resource;
             $v = Validator::make(
                        Input::all(),
                        $resource->rules
                     );
            
             if ($v->fails()){
                 
                 return Redirect::route('resources.edit',$id)->withMessage($v->messages()->first())->withInput();
            }
             
             
             $resource =  Resource::find($id);
             $resource->name = Input::get('name');
             $resource->pattern = Input::get('pattern');
             $resource->target = Input::get('target');
             $resource->before_filter = Input::get('before_filter');
             
             $resource->secure = Input::get('secure');
             $resource->save();
             
             $resource = Resource::findOrFail($id);
        
            return Redirect::route('resources.edit',$id)->withMessage('Successfully Updated')->with(compact('resource'));
         }
        
        $resource = Resource::findOrFail($id);
        
        return View::make('vhinx::resources.edit')->with(compact('resource'));
        
    }
    
    function delete($id){
        $resource = Resource::findOrFail($id);
        if($resource){
            $resource->delete();
            return Redirect::route('resources.index')->withMessage('Successfully deleted');
        }
        
        return Redirect::route('resources.index')->withMessage('Deleting Failed');
    }
}
?>
