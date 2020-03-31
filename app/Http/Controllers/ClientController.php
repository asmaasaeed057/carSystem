<?php

namespace App\Http\Controllers;

use App\Client;
use App\Car;
use App\box;
use App\ReprairCard;
use Illuminate\Http\Request;
use App\Http\Requests\Client\StoreClientRequest;
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
        // dd("sss");

        return view('admin.clients.create');
    }

    public function store(StoreClientRequest $request)
    {

        // $rules = [
        //     'fullName'     => 'required ',
        //     'email'    => 'required',
        //     'phone' => 'required',
        //     'address' => 'required',

        //  ];
        //  $data = $this->validate(request(), $rules, [], [
        //     'fullName'     => trans('site.name'),
        //     'email'    => trans('site.email'),
        //     'phone' => trans('site.password'),
        //     'address' => trans('site.address'),

        //  ]);


         Client::create($request->all());
         session()->flash('success', "Client created successfully");
         return redirect(route('client.index'));
    }

    public function show($id)
    {
        $client = Client::find($id);
        // $cars = Car::where('client_id','=',$id)->get();
        // $repairCards = ReprairCard::where('client_id','=',$id)->get();
        // // dd($repairCards);
        // $invoice = box::join("reprair_cards","reprair_cards.id","=","boxes.reprairCard_id")->where("reprair_cards.client_id",$id)->get();
        // //dd($invoice);
        return view('admin.clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request , $id)
    {
    //    $rules = [
    //       'fullName'     => 'required',
    //       'email'    => 'required',
    //       'phone' =>'required',
    //       'address' => 'required',
          

    //    ];
    //    $data = $this->validate(request(), $rules, [], [
    //       'fullName'     => trans('admin.name'),
    //       'email'    => trans('admin.email'),
    //       'phone' => trans('admin.password'),
    //       'address' => trans('admin.group_id'),
    //    ]);


       $client = Client::find($id);

       $client->update($request->all());

       session()->flash('success', "client updated successfully");
       return redirect(route('client.index'));
    }

    public function destroy($id)
    {
        $client = Client::find($id);

        $client->delete();

        session()->flash('success', "Client deleted successfully");
        return redirect(route('client.index'));
    }
    public function clientDetails($id){
        echo "ping";
    }
}
