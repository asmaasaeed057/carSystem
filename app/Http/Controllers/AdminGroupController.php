<?php

namespace App\Http\Controllers;

use App\AdminGroup;
use Illuminate\Http\Request;

class AdminGroupController extends Controller
{
/*     public function __construct()
    {
        $this->middleware('permission:admingroup_show', ['only' => 'index','show']);
        $this->middleware('permission:admingroup_edit', ['only' => 'edit','update']);
        $this->middleware('permission:admingroup_add', ['only' => 'store' ,'create']);
        $this->middleware('permission:admingroup_delete', ['only' => 'multi_delete','distroy']);
    } */
    public function index()
    {
        $clients = AdminGroup::all();
        return view('admin.permissions.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validation_value()
    {
      $rules = [
         'name_en'     => 'required',
         'name_ar'    => 'required',
         'admin_add' => 'sometimes|nullable|in:enable,disable',
         'admin_edit' => 'sometimes|nullable|in:enable,disable',
         'admin_show' => 'sometimes|nullable|in:enable,disable',
         'admin_delete' => 'sometimes|nullable|in:enable,disable',
         'admingroup_add' => 'sometimes|nullable|in:enable,disable',
         'admingroup_edit' => 'sometimes|nullable|in:enable,disable',
         'admingroup_show' => 'sometimes|nullable|in:enable,disable',
         'admingroup_delete' => 'sometimes|nullable|in:enable,disable',
         'clients_add' => 'sometimes|nullable|in:enable,disable',
         'clients_edit' => 'sometimes|nullable|in:enable,disable',
         'clients_show' => 'sometimes|nullable|in:enable,disable',
         'clients_delete' => 'sometimes|nullable|in:enable,disable',
         'account_add' => 'sometimes|nullable|in:enable,disable',
         'account_edit' => 'sometimes|nullable|in:enable,disable',
         'account_show' => 'sometimes|nullable|in:enable,disable',
         'account_delete' => 'sometimes|nullable|in:enable,disable',
         'reports_add' => 'sometimes|nullable|in:enable,disable',
         'reports_edit' => 'sometimes|nullable|in:enable,disable',
         'reports_show' => 'sometimes|nullable|in:enable,disable',
         'reports_delete' => 'sometimes|nullable|in:enable,disable',
         'companies_add' => 'sometimes|nullable|in:enable,disable',
         'companies_edit' => 'sometimes|nullable|in:enable,disable',
         'companies_show' => 'sometimes|nullable|in:enable,disable',
         'companies_delete' => 'sometimes|nullable|in:enable,disable',
         'car_catograys_add' => 'sometimes|nullable|in:enable,disable',
         'car_catograys_edit' => 'sometimes|nullable|in:enable,disable',
         'car_catograys_show' => 'sometimes|nullable|in:enable,disable',
         'car_catograys_delete' => 'sometimes|nullable|in:enable,disable',
         'car_types_add' => 'sometimes|nullable|in:enable,disable',
         'car_types_edit' => 'sometimes|nullable|in:enable,disable',
         'car_types_show' => 'sometimes|nullable|in:enable,disable',
         'car_types_delete' => 'sometimes|nullable|in:enable,disable',
         'reprair_cards_add' => 'sometimes|nullable|in:enable,disable',
         'reprair_cards_edit' => 'sometimes|nullable|in:enable,disable',
         'reprair_cards_show' => 'sometimes|nullable|in:enable,disable',
         'reprair_cards_delete' => 'sometimes|nullable|in:enable,disable',
         'cars_add' => 'sometimes|nullable|in:enable,disable',
         'cars_edit' => 'sometimes|nullable|in:enable,disable',
         'cars_show' => 'sometimes|nullable|in:enable,disable',
         'cars_delete' => 'sometimes|nullable|in:enable,disable',
         'box_add' => 'sometimes|nullable|in:enable,disable',
         'box_edit' => 'sometimes|nullable|in:enable,disable',
         'box_show' => 'sometimes|nullable|in:enable,disable',
         'box_delete' => 'sometimes|nullable|in:enable,disable',
       ];
       $data = $this->validate(request(), $rules, [], [
          'name'     => trans('admin.name'),

         ]);
         $newdata = [];
         foreach ($rules as $key => $value) {
            if (empty(request($key))) {
               $newdata[$key] = 'disable';
            } else {
               $newdata[$key] = request($key);
            }

         }
       return $newdata;
    }

    public function store(Request $request)
    {
        // dd($this->validation_value());
        AdminGroup::create($this->validation_value());
         session()->flash('success', trans('admin.updated'));
         return redirect('admin/permission');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminGroup  $adminGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AdminGroup $adminGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminGroup  $adminGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminGroup $adminGroup , $id)
    {
        $client = AdminGroup::find($id);
        return view('admin.permissions.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminGroup  $adminGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminGroup $adminGroup,$id)
    {
        $data = $this->validation_value();
        AdminGroup::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updated'));
        return redirect('admin/permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminGroup  $adminGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminGroup $adminGroup)
    {
        //
    }
}
