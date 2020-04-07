<?php

namespace App\Http\Controllers;

use App\Client;
use App\Car;
use App\Admin;
use App\RepairCard;
use App\box;
use App\ReprairCard;
use Illuminate\Http\Request;
use App\Http\Requests\Client\StoreClientRequest;
use App\Role;
use App\Custom;
use App\RepairCardItem;
use Auth;


class ClientController extends Controller
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
        $clients = Client::all();
        return view('admin.clients.index',compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(StoreClientRequest $request)
    {

         Client::create($request->all());
         session()->flash('success', "Client created successfully");
         return redirect(route('client.index'));
    }

    public function show($id)
    {
        $client = Client::find($id);
        $repairCards = ReprairCard::all()->where('client_id','=' ,$client->id);
        return view('admin.clients.show', compact('client','repairCards'));
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request , $id)
    {
       $client = Client::find($id);

       $client->update($request->all());

       session()->flash('success', "client updated successfully");
       return redirect(route('client.index'));
    }

    public function destroy($id)
    {
        $client = Client::find($id);

        $clients = Car::all()->where('client_id' , '=' , $id);
        $counClients= count($clients);

        if($counClients > 0){
            session()->flash('error', "You cant remove this client");

        }
        else{
            $client->delete();
            session()->flash('success', "Client deleted successfully");

        }
        return redirect(route('client.index'));
    }
    public function clientDetails($id){
        echo "ping";
    }
}
