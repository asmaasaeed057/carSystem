<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
/*
    public function __construct()
    {
        $this->middleware('permission:admin_show', ['only' => 'index','show']);
        $this->middleware('permission:admin_edit', ['only' => 'edit','update']);
        $this->middleware('permission:admin_add', ['only' => 'store' ,'create']);
        $this->middleware('permission:admin_delete', ['only' => 'multi_delete','distroy']);
    } */
    public function index()
    {

        $clients = Admin::all();

        return view('admin.admins.index',compact('clients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.admins.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'     => 'required|min:4',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'group_id' => 'required',

        ];
        $data = $this->validate(request(), $rules, [], [
            'name'     => trans('site.name'),
            'email'    => trans('site.email'),
            'password' => trans('site.password'),
        ]);
        if (!empty(request('password'))) {
			$data['password'] = bcrypt(request('password'));
		}
        Admin::create($data);

        session()->flash('success', trans('admin.added'));
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Request $client,$id)
    {
        $admin = Admin::find($id);
        return view('admin.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $cl,$id)
    {
        $client = Admin::find($id);
        return view('admin.admins.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $rules = [
            'name'     => 'required|min:4',
            'group_id' => 'required',
            'email' => "required|email|unique:admins,email,$id",
        ];
        $data = $this->validate(request(), $rules, [], [
            'name'     => trans('site.name'),
            'email'    => trans('site.email'),
        ]);
        if (!empty(request('password'))) {
			$data['password'] = bcrypt(request('password'));
		}
        Admin::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updated'));
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $client)
    {
        //
    }
}
