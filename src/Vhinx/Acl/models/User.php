<?php namespace Vhinx\Acl\models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface as UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface as RemindableInterface;

use Illuminate\Support\Facades\Config;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        
        public $rules = [
            'username' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'email' => 'email|unique:users'
        ];
        
	protected $hidden = array('password', 'remember_token');
        
        public function getAuthIdentifier()
        {
            return $this->getKey();
        }

        public function getAuthPassword()
        {
            return $this->password;
        }

        public function getReminderEmail()
        {
            return $this->email;
        }

        public function groups()
        {
            return $this->belongsToMany(Config::get("vhinx::acl.group.model"))->withTimestamps()->select('group.id','group.name');
        }
        
       

}
