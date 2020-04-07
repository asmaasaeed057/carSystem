<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupRole extends Model
{

    protected $table = 'group_role';
    protected $fillable = ['group_id' , 'role_id'];
    protected $primaryKey = 'group_role_id';

    public function group(){
        return $this->belongsTo('App\Group' , 'group_id');
    }

    public function role(){
        return $this->belongsTo('App\Role' , 'role_id');
    }
}
