<?php

namespace App\Http\Controllers;

use App\CarCatogray;
use App\Company;
use Illuminate\Http\Request;

class CarCatograyController extends Controller
{

/*     public function __construct()
    {
        $this->middleware('permission:car_catograys_show', ['only' => 'index','show']);
        $this->middleware('permission:car_catograys_edit', ['only' => 'edit','update']);
        $this->middleware('permission:car_catograys_add', ['only' => 'store' ,'create']);
        $this->middleware('permission:car_catograys_delete', ['only' => 'multi_delete','distroy']);
    } */
    public function index()
    {
        //
        $carCatogray = CarCatogray::all();
        return view('admin.carCatogray.index',compact('carCatogray'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $carCatogray = CarCatogray::all();
        $company = Company::all();
        return view('admin.carCatogray.create',compact('carCatogray','company'));
 
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
            'company_id'    => 'required',


         ];
         $data = $this->validate(request(), $rules, [], [
            'name_en'     => trans('site.name'),
            'name_ar'    => trans('site.email'),
            'company_id'    => trans('site.email'),

         ]);

         CarCatogray::create($data);

         session()->flash('success', trans('admin.updated'));
         return redirect('admin/carCatogray');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarCatogray  $carCatogray
     * @return \Illuminate\Http\Response
     */
    public function show(CarCatogray $carCatogray)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarCatogray  $carCatogray
     * @return \Illuminate\Http\Response
     */
    public function edit(CarCatogray $carCatog,$id)
    {
        //
        $carCatogray = CarCatogray::find($id);
        $company = Company::all();
        return view('admin.carCatogray.edit', compact('carCatogray','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarCatogray  $carCatogray
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarCatogray $carCatog,$id)
    {
        //
        $rules = [
            'name_en'     => 'required ',
            'name_ar'    => 'required',
            'company_id'    => 'required',


         ];
         $data = $this->validate(request(), $rules, [], [
            'name_en'     => trans('site.name'),
            'name_ar'    => trans('site.email'),
            'company_id'    => trans('site.email'),

         ]);

         CarCatogray::where('id', $id)->update($data);

         session()->flash('success', trans('admin.updated'));
         return redirect('admin/carCatogray');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarCatogray  $carCatogray
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarCatogray $carCatogray)
    {
        //
    }
}
