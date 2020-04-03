<?php

namespace App\Http\Controllers;

use App\CarBrand;
use App\CarBrandCategory;
use App\Car;
use App\Http\Requests\CarBrandCategory\StoreCarBrandCategoryRequest;
use Illuminate\Http\Request;
use App\Custom;
use Auth;

class CarBrandCategoryController extends Controller
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
        $brandCategories = CarBrandCategory::all();
        return view('admin.brandCategory.index', compact('brandCategories'));
    }

    public function create()
    {
        $brands = CarBrand::all();
        return view('admin.brandCategory.create', ['brands' => $brands]);
    }

    public function store(StoreCarBrandCategoryRequest $request)
    {
        // dd($request);
        CarBrandCategory::create($request->all());
        session()->flash('success', "Car Brand Category created Category successfully");
        return redirect(route('brandCategory.index'));
    }

    public function show($id)
    {
        // $brand = CarBrandCategory::find($id);
        // return view('admin.brandCategory.show', compact('brandCategory'));
    }

    public function edit($id)
    {
        $brandCategory = CarBrandCategory::find($id);
        $brands = CarBrand::all();

        return view('admin.brandCategory.edit', compact('brandCategory'), ['brands' => $brands]);
    }

    public function update(Request $request, $id)
    {
        $brandCategory = CarBrandCategory::find($id);

        $brandCategory->update($request->all());

        session()->flash('success', "Car Brand Category updated successfully");
        return redirect(route('brandCategory.index'));
    }

    public function destroy($id)
    {
        $brandCategory = CarBrandCategory::find($id);

        $categories = Car::all()->where('car_brand_category_id', '=', $id);
        $councategories = count($categories);

        if ($councategories > 0) {
            session()->flash('error', "You cant remove this category");
        } else {
            $brandCategory->delete();
            session()->flash('success', "Category deleted successfully");
        }
        return redirect(route('brandCategory.index'));
    }
}
