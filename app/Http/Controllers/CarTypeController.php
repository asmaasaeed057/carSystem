<?php

namespace App\Http\Controllers;

use App\CarType;
use Illuminate\Http\Request;

class CarTypeController extends Controller
{
/*     public function __construct()
    {
        $this->middleware('permission:car_types_show', ['only' => 'index','show']);
        $this->middleware('permission:car_types_edit', ['only' => 'edit','update']);
        $this->middleware('permission:car_types_add', ['only' => 'store' ,'create']);
        $this->middleware('permission:car_types_delete', ['only' => 'multi_delete','distroy']);
    } */
    public function index()
    {
        //
        $carTypes = CarType::all();
        return view('admin.carType.index',compact('carTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.carType.create');
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

         CarType::create($data);

         session()->flash('success', trans('admin.added'));
         return redirect('admin/carType');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function show(CarType $carType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function edit(CarType $carT,$id)
    {
        //

         //
         $carType = CarType::find($id);
         return view('admin.carType.edit', compact('carType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarType $carT,$id)
    {
        //
         //
         $rules = [
            'name_en'     => 'required ',
            'name_ar'    => 'required',


         ];
         $data = $this->validate(request(), $rules, [], [
            'name_en'     => trans('site.name'),
            'name_ar'    => trans('site.email'),

         ]);

         carType::where('id', $id)->update($data);

         session()->flash('success', trans('admin.updated'));
         return redirect('admin/carType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarType $carType)
    {
        //
    }
}
