<?php

namespace App\Http\Middleware;

use Closure;

class AdminPermission
{
    public function handle($request, Closure $next,$role)
    {
        if(auth('admin')->user()->group->$role === "disable" && auth('admin')->user()->group_id !== null  )
        {
            session()->flash('error', trans('site.PermissionAleat'));
            return back();
        }

        return $next($request);
    }
}
