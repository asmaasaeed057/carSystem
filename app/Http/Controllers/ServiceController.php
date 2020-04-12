<?php

namespace App\Http\Controllers;


use App\Service;
use Illuminate\Http\Request;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Custom;
use Auth;

class ServiceController extends Controller
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
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(StoreServiceRequest $request)
    {

        Service::create($request->all());

        session()->flash('success', "Service created successfully");
        return redirect(route('service.index'));
    }

    public function show($id)
    {
        $service = Service::find($id);
        return view('admin.service.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        $service->update($request->all());

        session()->flash('success', "Service updated successfully");
        return redirect(route('service.index'));
    }

    public function destroy($id)
    {
        $service = Service::find($id);

        $service->delete();

        session()->flash('success', "Service deleted successfully");
        return redirect(route('service.index'));
    }

}
