<?php namespace Vhinx\Acl\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Vhinx\Acl\models\Group;
use Vhinx\Acl\models\Resource;

class GroupsController extends \BaseController {
    
    function index(){
        
        $groups = Group::paginate(15);
        
        return View::make('vhinx::groups.index')->with(compact('groups'));
    }
    
    function resources($groupId){
        

        $group = Group::findOrFail($groupId);
         $resources = Resource::where('resource.secure',true)->get();
        
        if(Request::isMethod('post')){
            
            
            $group->resources()->sync(Input::get('resources'));
            return Redirect::route('groups.resources',$groupId)->with(compact('group','resources'))->withMessage('Successfully updated');
        }
                
       
        return View::make('vhinx::groups.resources')->with(compact('group','resources'));
    }
    
    function add(){
        
        
         if(Request::isMethod('post')){
             
             $group = new Group;
             $v = Validator::make(
                        Input::all(),
                        $group->rules
                     );
            
             if ($v->fails()){
                 
                 return Redirect::route('groups.add')->withMessage($v->messages()->first())->withInput();
            }
             
             $group->name = Input::get('name');
             
             $group->save();
             return Redirect::route('groups.edit',$group->id)->withMessage('Successfully Saved')->withInput();
         }
        
        return View::make('vhinx::groups.add');
    }
    
    function edit($id){
        
        
         if(Request::isMethod('post')){
             
             $group = new Group;
             $v = Validator::make(
                        Input::all(),
                        $group->rules
                     );
            
             if ($v->fails()){
                 
                 return Redirect::route('groups.edit',$id)->withMessage($v->messages()->first())->withInput();
            }
             
             
             $group =  Group::find($id);
             $group->name = Input::get('name');
             
             $group->save();
             
             $group = Group::findOrFail($id);
        
            return Redirect::route('groups.edit',$id)->withMessage('Successfully Updated')->with(compact('group'));
         }
        
        $group = Group::findOrFail($id);
        
        return View::make('vhinx::groups.edit')->with(compact('group'));
        
    }
    
    function delete($id){
        $group = Group::findOrFail($id);
      
       DB::beginTransaction();
         try{   
             
            $group->resources()->detach($group->resources->lists('id'));
            $group->delete();
            
           
            DB::commit();
            return Redirect::route('groups.index')->withMessage('Successfully Deleted');
        }
        catch (\Exception  $e){
             DB::rollback();
            return Redirect::route('groups.index')->withMessage('Deleting Failed');
        }
        
        return Redirect::route('groups.index')->withMessage('Deleting Failed');
    }
}
?>
