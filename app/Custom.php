<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\GroupRole;
use App\Role;


class Custom
{

    public static function permission($group,$controller,$action)
    {
        $grouproles = $group->roles;
        $roleIds = $grouproles->pluck('role_id');
        $roles = Role::whereIn('role_id', $roleIds)->get();

        $controller = strtolower(str_replace("Controller", "", $controller));

        $valid = false;

        foreach ($roles as $role)
        {
            if ($role->role_controller == $controller && $role->role_action == $action)
            {
                $valid = true;
            }
        }
        return $valid;
        
    }

}
