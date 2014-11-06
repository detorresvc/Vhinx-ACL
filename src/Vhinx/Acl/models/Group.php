<?php namespace Vhinx\Acl\models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Config;
class Group extends Eloquent
{
    protected $table = "group";

    protected $softDelete = true;

    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
        "deleted_at"
    ];
    
    public $rules = [
        'name' => 'required'
    ];

    public function resources()
    {
        return $this->belongsToMany(Config::get("vhinx::acl.resource.model"))->withTimestamps()->select('resource.*');
    }

    public function users()
    {
        return $this->belongsToMany(Config::get("vhinx::acl.user.model"))->withTimestamps();
    }
}