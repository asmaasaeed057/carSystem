<?php

namespace App\Http\Controllers;

use App\CarBrand;
use App\CarBrandCategory;
use App\Http\Requests\CarBrand\StoreCarBrandRequest;
use Illuminate\Http\Request;
use App\Custom;
use Auth;

class CarBrandController extends Controller
{

    public function callAction($method, $parameters)
    {
        $group = Auth::guard('admin')->user()->group;
        
        $actionObject = app('request')->route()->getAction();
        $controller = class_basename($actionObject['controller']);
        list($controller, $action)= explode('@', $controller);
        $valid = Custom::permission($group, $controller, $action);
        if ($valid)
        {
            return parent::callAction($method, $parameters);
        }
        else
        {
            return response()->view('admin.errors.403');
        }
    }
    public function index()
    {
        $brands = CarBrand::all();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(StoreCarBrandRequest $request)
    {
        CarBrand::create($request->all());
        session()->flash('success', "Car Brand created successfully");
        return redirect(route('brand.index'));
    }

    public function show($id)
    {
        $brand = CarBrand::find($id);
        return view('admin.brand.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = CarBrand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = CarBrand::find($id);

        $brand->update($request->all());

        session()->flash('success', "Car Brand updated successfully");
        return redirect(route('brand.index'));
    }

    public function destroy($id)
    {
        $brand = CarBrand::find($id);
        $carBrandCategory = CarBrandCategory::all()->where('car_brand_id' , '=' , $brand->id);
        $countCategory = count($carBrandCategory);

        if($countCategory > 0){
            session()->flash('error', "You cant remove brand");

        }
        else{
            $brand->delete();
            session()->flash('success', "Car Brand deleted successfully");

        }

        return redirect(route('brand.index'));
    }
}
