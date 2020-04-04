<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $table = 'groups';
    protected $fillable = array('group_name');
    protected $primaryKey = 'group_id';
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\Admin', 'group_id');
    }

    public function roles()
    {
        return $this->hasMany('App\GroupRole', 'group_id');
    }

}
