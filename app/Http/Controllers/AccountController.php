<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Admin;
use App\Group;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $groups = Group::all();
        $users = Admin::all();
        return view('admin/account.index', [
            'groups' => $groups,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $groups = Group::all();

        return view('admin/account.create', [
            'groups' => $groups,
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if ($request->input('password') == $request->input('password_confirmation'))
        {
            $account = Admin::create([
                        'group_id' => $request['group_id'],
                        'password' => Hash::make($request['group_id']),
                        'name' => $request['name'],
                        'email' => $request['email'],
            ]);

            return redirect(route('account.index'));
        }
        else
        {
            return redirect(route('account.create'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = Admin::find($id);
        $groups = Group::all();

        return view('admin/account.edit', [
            'user' => $user,
            'groups' => $groups,
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
        $user = Admin::find($id);

        $user->update($request->all());

        return redirect()->route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = Admin::find($id);

        $user->delete();

        return redirect()->route('account.index');
    }

}
