<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
/*     public function __construct()
    {
        $this->middleware('permission:companies_show', ['only' => 'index','show']);
        $this->middleware('permission:companies_edit', ['only' => 'edit','update']);
        $this->middleware('permission:companies_add', ['only' => 'store' ,'create']);
        $this->middleware('permission:companies_delete', ['only' => 'multi_delete','distroy']);
    } */
    public function index()
    {
        //
        $company = Company::all();
        //dd($clients);

        return view('admin.company.index',compact('company'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'name_en'     => 'required ',
            'name_ar'    => 'required',


         ];
         $data = $this->validate(request(), $rules, [], [
            'name_en'     => trans('site.name'),
            'name_ar'    => trans('site.email'),


         ]);

         Company::create($data);

         session()->flash('success', trans('admin.added'));
         return redirect('admin/company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $comp,$id)
    {
        //
        $company = Company::find($id);
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $rules = [
            'name_en'     => 'required ',
            'name_ar'    => 'required',


         ];
         $data = $this->validate(request(), $rules, [], [
            'name_en'     => trans('site.name'),
            'name_ar'    => trans('site.email'),


         ]);

         Company::where('id', $id)->update($data);

         session()->flash('success', trans('admin.updated'));
         return redirect('admin/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
