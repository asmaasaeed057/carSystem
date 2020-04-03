<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'roles';
    protected $fillable = array('role_controller', 'role_action', 'role_label', 'role_controller_label');
    protected $primaryKey = 'role_id';
    public $timestamps = false;

//    public function users()
//    {
//        return $this->hasMany('App\User','group_id');
//    }
    public function groups()
    {
        return $this->hasMany('App\GroupRole', 'role_id');
    }

}
