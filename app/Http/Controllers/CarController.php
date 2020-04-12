<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarBrandCategory;
use App\CarType;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\Car\StoreCarRequest;
use App\Custom;
use Auth;

class CarController extends Controller
{

    public function callAction($method, $parameters)
    {
        $group = Auth::guard('admin')->user()->group;

        $actionObject = app('request')->route()->getAction();
        $controller = class_basename($actionObject['controller']);
        list($controller, $action) = explode('@', $controller);
        $valid = Custom::permission($group, $controller, $action);
        if ($valid) {
            return parent::callAction($method, $parameters);
        } else {
            return response()->view('admin.errors.403');
        }
    }
    public function index()
    {
        //
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
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
        $clientId = '';
        return view('admin.cars.create', compact('carCategories', 'carTypes', 'clients', 'clientId'));
    }

    public function createCar($clientId)
    {
        $carCategories = CarBrandCategory::all();
        $carTypes = CarType::all();
        $clients = Client::all();
        $client = Client::find($clientId);
        return view('admin.cars.create', compact('carCategories', 'carTypes', 'clients', 'client', 'clientId'));
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
    public function show(Car $ca, $id)
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
        $car = Car::find($id);

        $carCategories = CarBrandCategory::all();
        $carTypes = CarType::all();
        $clients = Client::all();

        return view('admin.cars.edit', compact('carCategories', 'carTypes', 'clients', 'car'));
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
