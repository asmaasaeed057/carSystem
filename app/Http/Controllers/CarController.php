<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarBrandCategory;
use App\CarType;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\Car\StoreCarRequest;

class CarController extends Controller
{
/*     public function __construct()
    {
        $this->middleware('permission:cars_show', ['only' => 'index','show']);
        $this->middleware('permission:cars_edit', ['only' => 'edit','update']);
        $this->middleware('permission:cars_add', ['only' => 'store' ,'create']);
        $this->middleware('permission:cars_delete', ['only' => 'multi_delete','distroy']);
    } */ 
    public function index()
    {
        //
        $cars = Car::all();
        return view('admin.cars.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $carCategories = CarBrandCategory::all();
        $carTypes = CarType::all();
        $clients = Client::all();
        return view('admin.cars.create',compact('carCategories','carTypes','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(StoreCarRequest $request)
    {
        Car::create($request->all());
        session()->flash('success', "Car created successfully");
        return redirect(route('car.index'));
   }
    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $ca,$id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $car= Car::find($id);

        $carCategories = CarBrandCategory::all();
        $carTypes = CarType::all();
        $clients = Client::all();

        return view('admin.cars.edit',compact('carCategories','carTypes','clients','car'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
      
        $car = Car::find($id);

        $car->update($request->all());

        session()->flash('success', "Car updated successfully");
        return redirect(route('car.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        session()->flash('success', "Car deleted successfully");

        return redirect()->route('car.index');
    }
    
    function get_catagray(Request $request)
    {
        // // dd($request->all());
        // $select = $request->get('select');
        // $value = $request->get('value');
        // $dependent = $request->get('dependent');
        // $data = CarBrandCategory::where("company_id" , $value)->get();

        // $output = '<option value="">'.trans("site.options").'</option>';
        // // dd($data);
        // foreach($data as $row)
        // {
        // $output .= '<option value="'.$row->id.'">'.$row->name_ar.'</option>';
        // }

        // echo $output;
    }
}
