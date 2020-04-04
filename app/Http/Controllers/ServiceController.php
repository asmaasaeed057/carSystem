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
        // $rules = [
        //     'service_name'     => 'required ',
        //     'service_number'    => 'required',
        //     'service_type' => 'required',
        //     'service_cost' => 'required',
        //     'service_client_cost' => 'required',
        //     'service_working_hours' => 'required'

        // ];
        // $data = $this->validate(request(), $rules, [], [
        //     'service_name'     => trans('site.name'),
        //     'service_number'    => trans('site.name'),
        //     'service_type' => trans('site.name'),
        //     'service_cost' => trans('site.address'),

        // ]);

        // $request->validate([
        //     'service_name' => 'required',
        //     'service_number' => 'required',
        // ]);

        Service::create($request->all());

        session()->flash('success', "Service created successfully");
        return redirect(route('service.index'));
    }

    public function show($id)
    {
        $service = Service::find($id);
        // $cars = Car::where('service_id', '=', $id)->get();
        // $repairCards = ReprairCard::where('client_id', '=', $id)->get();
        // // dd($repairCards);
        // $invoice = box::join("reprair_cards", "reprair_cards.id", "=", "boxes.reprairCard_id")->where("reprair_cards.client_id", $id)->get();
        // //dd($invoice);
        return view('admin.service.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        // $rules = [
        //     'fullName'     => 'required',
        //     'email'    => 'required',
        //     'phone' => 'required',
        //     'address' => 'required',


        // ];
        // $data = $this->validate(request(), $rules, [], [
        //     'fullName'     => trans('admin.name'),
        //     'email'    => trans('admin.email'),
        //     'phone' => trans('admin.password'),
        //     'address' => trans('admin.group_id'),
        // ]);
        // Client::where('id', $id)->update($data);

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
    // public function clientDetails($id)        return redirect()->route('about.index');

    // {
    //     echo "ping";
    // }
}
