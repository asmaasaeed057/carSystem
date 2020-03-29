<?php

namespace App\Http\Controllers;

use App\Client;
use App\Car;
use App\box;
use App\ReprairCard;
use Illuminate\Http\Request;

class ClientController extends Controller
{ 

/*     public function __construct()
    {
        $this->middleware('permission:clients_show', ['only' => 'index','show']);
        $this->middleware('permission:clients_edit', ['only' => 'edit','update']);
        $this->middleware('permission:clients_add', ['only' => 'store' ,'create']);
        $this->middleware('permission:clients_delete', ['only' => 'distroy']);
    } */
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index',compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'fullName'     => 'required ',
            'email'    => 'required',
            'phone' => 'required',
            'address' => 'required',

         ];
         $data = $this->validate(request(), $rules, [], [
            'fullName'     => trans('site.name'),
            'email'    => trans('site.email'),
            'phone' => trans('site.password'),
            'address' => trans('site.address'),

         ]);

         Client::create($data);
        
         session()->flash('success', trans('admin.added'));
         return redirect('admin/client');
    }

    public function show(Client $clie,$id)
    {
        $client = Client::find($id);
        $cars = Car::where('client_id','=',$id)->get();
        $repairCards = ReprairCard::where('client_id','=',$id)->get();
        // dd($repairCards);
        $invoice = box::join("reprair_cards","reprair_cards.id","=","boxes.reprairCard_id")->where("reprair_cards.client_id",$id)->get();
        //dd($invoice);
        return view('admin.clients.show', compact('client','cars','invoice','repairCards'));
    }

    public function edit(Client $cl,$id)
    {
        $client = Client::find($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update($id)
    {
       $rules = [
          'fullName'     => 'required',
          'email'    => 'required',
          'phone' =>'required',
          'address' => 'required',
          

       ];
       $data = $this->validate(request(), $rules, [], [
          'fullName'     => trans('admin.name'),
          'email'    => trans('admin.email'),
          'phone' => trans('admin.password'),
          'address' => trans('admin.group_id'),
       ]);
       Client::where('id', $id)->update($data);

       session()->flash('success', trans('admin.updated'));
       return redirect('admin/client');
    }

    public function destroy(Client $client)
    {
        //
    }
    public function clientDetails($id){
        echo "ping";
    }
}
