<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Group;
use App\Role;
use Illuminate\Support\Facades\DB;
use App\GroupRole;
use App\Custom;
use Auth;

class GroupController extends Controller
{
    // public function callAction($method, $parameters)
    // {
    //     $group = Auth::guard('admin')->user()->group;

    //     $actionObject = app('request')->route()->getAction();
    //     $controller = class_basename($actionObject['controller']);
    //     list($controller, $action) = explode('@', $controller);
    //     $valid = Custom::permission($group, $controller, $action);
    //     if ($valid) {
    //         return parent::callAction($method, $parameters);
    //     } else {
    //         return response()->view('admin.errors.403');
    //     }
    // }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $groups = Group::all();

        return view('admin/group.index', [
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $roles = DB::table('roles')
            ->get()->groupBy('role_controller_label');
        return view('admin/group.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_name' => 'required',
        ]);
        $group = Group::create([
            'group_name' => $request['group_name'],
        ]);
        if ($request->get('role_id')) {

            foreach ($request->get('role_id') as $i => $id) {
                $groupRole = new GroupRole();
                $groupRole->role_id = $id;
                $groupRole->group_id = $group->group_id;
                $groupRole->save();
            }
        }

        //        Group::create($request->all());

        return redirect(route('group.index'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $roles = DB::table('roles')
            ->get()->groupBy('role_controller_label');

        $group = Group::find($id);
        $groupRoles = $group->roles;
        $roleIds = $groupRoles->pluck('role_id')->toArray();
        return view('admin/group.edit', [
            'roles' => $roles,
            'group' => $group,
            'roleIds' => $roleIds,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $group = Group::find($id);
        $groupRoles = $group->roles;
        if ($groupRoles) {
            foreach ($groupRoles as $groupRole) {
                $groupRole->delete();
            }
        }
        $group->update([
            'group_name' => $request['group_name'],
        ]);
        if ($request->get('role_id')) {
            foreach ($request->get('role_id') as $i => $id) {

                $groupRole = new GroupRole();
                $groupRole->role_id = $id;
                $groupRole->group_id = $group->group_id;
                $groupRole->save();
            }
        }

        //$group->update($request->all());

        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);

        $group->delete();

        return redirect()->route('group.index');
    }
}
