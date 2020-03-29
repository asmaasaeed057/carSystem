<?php

namespace App\Http\Controllers;


use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{


    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
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

        session()->flash('success', trans('admin.added'));
        return redirect('admin/service');
    }

    public function show(Client $clie, $id)
    {
        // $service = Service::find($id);
        // $cars = Car::where('service_id', '=', $id)->get();
        // $repairCards = ReprairCard::where('client_id', '=', $id)->get();
        // // dd($repairCards);
        // $invoice = box::join("reprair_cards", "reprair_cards.id", "=", "boxes.reprairCard_id")->where("reprair_cards.client_id", $id)->get();
        // //dd($invoice);
        // return view('admin.clients.show', compact('client', 'cars', 'invoice', 'repairCards'));
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request , $id)
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


        session()->flash('success', trans('admin.updated'));
        return redirect('admin/service');
    }

    public function destroy(Client $client)
    {
        //
    }
    public function clientDetails($id)
    {
        echo "ping";
    }
}
