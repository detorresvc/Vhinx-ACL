<?php namespace Vhinx\Acl\controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Vhinx\Acl\models\User;
use Vhinx\Acl\models\Group;

class UsersController extends \BaseController {
    
    
    
    function index(){
     
         $users = User::paginate(10);
        
        return View::make('vhinx::users.index')->with(compact('users'));
    }
    
    function add(){
        
         if(Request::isMethod('post')){
             
            
             $user = new User;
             $user->rules['groups'] = 'required';
             
             $v = Validator::make(
                        Input::all(),
                        $user->rules
                     );
            
             if ($v->fails()){
                 
                 return Redirect::route('users.add')->withMessage($v->messages()->first())->withInput();
            }
            
            try {
                
                DB::beginTransaction();
                $user->username = Input::get('username');
                $user->password = \Hash::make(Input::get('password'));
                $user->email = Input::get('email');
            
                $user->save();

                $getUser = User::find($user->id);

               $getUser->groups()->attach(Input::get('groups'));
               
               DB::commit();
               return Redirect::route('users.index')->withMessage('Successfully Saved')->withInput();
            }
            catch (\Exception  $e){
                DB::rollback();
                return Redirect::route('users.index')->withMessage('Saving Failed')->withInput();
            }
         }
        
        $groups = Group::select('id', 'name')->get();
        
        
        return View::make('vhinx::users.add')->with(compact('groups'));
    }
    
    function edit($id){
        
        
         if(Request::isMethod('post')){
             
             
             
             try {
                
                DB::beginTransaction();
                
                $userGet = User::find($id);
                
                $user = new User;
                $user->rules['groups'] = 'required';
                
                if(Input::get('username') != $userGet->username){
                    $userGet->username = Input::get('username');
                }
                else{
                    unset($user->rules['username']);
                }
                
                $userGet->password = \Hash::make(Input::get('password'));
                if(Input::get('email') != $userGet->email){
                    $userGet->email = Input::get('email');
                }
                else{
                    unset($user->rules['email']);
                }
                
              
                $v = Validator::make(
                           Input::all(),
                           $user->rules
                        );

                if ($v->fails()){

                    return Redirect::route('users.edit',$id)->withMessage($v->messages()->first())->withInput();
               }
                
               $userGet->save();
                
               $userGet->groups()->sync(Input::get('groups'));
                
                DB::commit();

                return Redirect::route('users.index')->withMessage('Successully Updated')->with(compact('resource'));
             }
             catch (\Exception  $e){
                
                DB::rollback();
                return Redirect::route('users.index')->withMessage('Updating Failed')->withInput();
            }
        
            return Redirect::route('users.index')->withMessage('Updating Failed')->with(compact('resource'));
         }
        
         $user = User::findOrFail($id);
         $groups = Group::select('id', 'name')->get();
        return View::make('vhinx::users.edit')->with(compact('user','groups'));
        
    }
    
    function delete($id){
        $user = User::findOrFail($id);
      
       DB::beginTransaction();
         try{   
             
            $user->groups()->detach($user->groups->lists('id'));
            $user->delete();
            
           
            DB::commit();
            return Redirect::route('users.index')->withMessage('Successfully Deleted');
        }
        catch (\Exception  $e){
             DB::rollback();
            return Redirect::route('users.index')->withMessage('Deleting Failed');
        }
        
        return Redirect::route('users.index')->withMessage('Deleting Failed');
    }
    
    function login(){
        
        if(Request::isMethod('post')){
            if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('username')), true))
            {
             
                return Redirect::route('users.home');
            }
            else{
                return Redirect::route('users.login')->with('message','Invalid username and password');
            }
        }

        return View::make('vhinx::users.login');
    }
    
    
    function home(){
        
       
        return View::make('vhinx::users.home');
    }
    
    function logout(){
        Auth::logout();
        
      
        return Redirect::route('users.login');
    }
}
?>
