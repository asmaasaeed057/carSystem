<?php

namespace App\Http\Controllers;

use App\Car;
use App\Company;
use App\CarType;
use App\Client;
use App\CarCatogray;
use Illuminate\Http\Request;

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
        //

        $Company = Company::all();
        $CarType = CarType::all();
        $CarCatogray = CarCatogray::all();
        //dd($CarCatogray);
        $clients = Client::all();
        return view('admin.cars.create',compact('Company','CarType','CarCatogray','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'car_brand_category_id'=> 'required ',
            'model' => 'required',
            'client_id' => 'required',
            'carType_id' => 'required',
            'platNo' => 'required',
            'car_structure_number' => 'required',
            'car_color' => 'required',
        ]);
        Car::create($request->all());

        session()->flash('success', trans('admin.added'));
        return redirect('admin/car');
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
    public function edit(Car $ca,$id)
    {
        //
        $car= Car::find($id);

        $Company = Company::all();
        $CarType = CarType::all();
        $CarCatogray = CarCatogray::all();
        $clients = Client::all();
        return view('admin.cars.edit',compact('Company','CarType','CarCatogray','clients','car'));

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
        $request->validate([
            'car_brand_category_id'=> 'required ',
            'model' => 'required',
            'client_id' => 'required',
            'carType_id' => 'required',
            'platNo' => 'required',
            'car_structure_number' => 'required',
            'car_color' => 'required',
        ]);


        $car = Car::find($id);

        $car->update($request->all());

        session()->flash('success', trans('admin.updated'));
        return redirect('admin/car');
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

        return redirect()->route('car.index');
    }
    
    function get_catagray(Request $request)
    {
        // dd($request->all());
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = CarCatogray::where("company_id" , $value)->get();

        $output = '<option value="">'.trans("site.options").'</option>';
        // dd($data);
        foreach($data as $row)
        {
        $output .= '<option value="'.$row->id.'">'.$row->name_ar.'</option>';
        }

        echo $output;
    }
}
