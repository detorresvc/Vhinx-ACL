<?php namespace Vhinx\Acl\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Resource extends Eloquent
{
    protected $table = "resource";

    protected $softDelete = true;

    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
        "deleted_at"
    ];

    
    public $rules = [
        'name' => 'required',
        'pattern' => 'required',
        'target' => 'required'
    ];
    
    public function groups()
    {
        return $this->belongsToMany("Vhinx\\Acl\\models\\Group")->withTimestamps();
    }
}