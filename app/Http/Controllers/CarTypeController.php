<?php

namespace App\Http\Controllers;

use App\CarType;
use App\Car;
use Illuminate\Http\Request;
use App\Http\Requests\CarType\StoreCarTypeRequest;

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
    public function store(StoreCarTypeRequest $request)
    {
         CarType::create($request->all());
         session()->flash('success', "Car type created successfully");
         return redirect(route('carType.index'));
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
    public function edit($id)
    {
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
    public function update(Request $request ,$id)
    {

         $type = carType::find($id);

         $type->update($request->all());
  
         session()->flash('success', "Car Type updated successfully");
         return redirect(route('carType.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = CarType::find($id);

        $cars = Car::all()->where('carType_id' , '=' , $id);
        $counCars= count($cars);

        if($counCars > 0){
            session()->flash('error', "You cant remove car type");

        }
        else{
            $type->delete();
            session()->flash('success', "Car Type deleted successfully");

        }
        return redirect(route('carType.index'));
    }
}
