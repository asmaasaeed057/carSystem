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
use App\Service;
use Auth;
use App\Invoice;
use App\OperationOrder;
use App\InvoicePayment;
use App\CarBrandCategory;
use App\CarType;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use PhpParser\Node\Expr\New_;
use App\TechnicalEmployee;
class ClientController extends Controller
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
        $client_name = '';
        $client_phone = '';
        $clients = Client::all();
        return view('admin.clients.index', compact('clients','client_name' , 'client_phone'));
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
        $repairCards = ReprairCard::all()->where('client_id', '=', $client->id);
        return view('admin.clients.show', compact('client', 'repairCards'));
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        $client->update($request->all());

        session()->flash('success', "client updated successfully");
        return redirect(route('client.index'));
    }

    public function destroy($id)
    {
        $client = Client::find($id);

        $clients = Car::all()->where('client_id', '=', $id);
        $counClients = count($clients);

        if ($counClients > 0) {
            session()->flash('error', "You cant remove this client");
        } else {
            $client->delete();
            session()->flash('success', "Client deleted successfully");
        }
        return redirect(route('client.index'));
    }
    public function search()
    {
        $client_name = $_GET['client_name'];
        $client_phone = $_GET['client_phone'];

        $c = Client::select("*");


        if ($client_name) {
            $c->where('fullName', '=', $client_name)->get();
        }
        if ($client_phone) {
            $c->where('phone', '=', $client_phone)->get();
        }
        $clients = $c->get();

        return view('admin.clients.index', [
            'client_name' => $client_name,
            'client_phone' => $client_phone,
            'clients' => $clients

        ]);
    }

    public function createNoneContractClient()
    {
        $carCategories = CarBrandCategory::all();
        $carTypes = CarType::all();
        if (ReprairCard::orderBy('id', 'desc')->first()) {
            $number = ReprairCard::orderBy('id', 'desc')->first()->card_number;
        } else {
            $number = 0;
        }
        $employee = TechnicalEmployee::get();

        return view('admin.clients.createNoneContract', [
            'carCategories' => $carCategories,
            'carTypes' => $carTypes,
            'number' => $number,
            'employee' => $employee
        ]);
    }

    public function storeNoneContractClient(Request $request)
    {

        $request->validate([
            'fullName' => 'required ',
            'phone' => 'required',
            'platNo' => 'required',
            'car_structure_number' => 'required',
            'car_color' => 'required',
            'model' => 'required',
            'car_brand_category_id' => 'required',
            'carType_id' => 'required'

        ]);
        $client = new Client();
        $client->fullName = $request->get('fullName');
        $client->phone = $request->get('phone');
        $client->client_type = 'noneContract';
        $client->save();


        $car = new Car();
        $car->model = $request->get('model');
        $car->platNo = $request->get('platNo');
        $car->car_structure_number = $request->get('car_structure_number');
        $car->client_id = $client->id;
        $car->carType_id = $request->get('carType_id');
        $car->car_brand_category_id = $request->get('car_brand_category_id');
        $car->car_color = $request->get('car_color');
        $car->save();

        $repairCard = new ReprairCard();
        $repairCard->checkReprort = $request->get('checkReprort');
        $repairCard->card_taxes = $request->get('card_taxes');
        $repairCard->card_number = $request->get('card_number');
        $repairCard->employee_id = $request->get('employee_id');
        $repairCard->client_id = $client->id;
        $repairCard->car_id = $car->id;
        $repairCard->status = 'accepted';
        $repairCard->save();

        $price =   $request->get('price');
        foreach ($request->get('services') as $id => $service) {
            if ($service) {
                $repairCardItem = new RepairCardItem();
                $repairCardItem->service_id = $service;
                $carService = Service::find($service);
                $repairCardItem->card_id = $repairCard->id;
                $repairCardItem->service_client_cost = $price[$id];
                $repairCardItem->service_cost = $carService->service_cost;
                $repairCardItem->save();
            }
        }

        $invoice = new Invoice;
        $invoice->invoice_number = $repairCard->card_number;
        $invoice->invoice_date = date('Y-m-d H:i:s');
        $invoice->invoice_total = $repairCard->total_with_taxes;
        $invoice->repair_card_id = $repairCard->id;
        $invoice->save();
        $operationOrder = new OperationOrder;
        $operationOrder->operation_order_number = $repairCard->card_number;
        $operationOrder->operation_order_date = date('Y-m-d H:i:s');
        $operationOrder->invoice_id = $invoice->invoice_id;
        $operationOrder->save();

        session()->flash('success', "Client created successfully");
        return redirect(route('invoiceIndexNoneContract'));


    }

    public function indexNoneContract()
    {
        $clients = Client::all();
        return view('admin.clients.indexNoneContract', compact('clients'));
    }

    public function editNoneContractClient($id)
    {
        $repairCard = ReprairCard::find($id);

        $carCategories = CarBrandCategory::all();
        $carTypes = CarType::all();
        $allServices = Service::all();
        $employee = TechnicalEmployee::get();

        return view('admin.clients.editNoneContractClient', compact('repairCard', 'carCategories', 'carTypes', 'allServices','employee'));
    }
    public function updateNoneContractClient(Request $request, $id)
    {
        $repairCard = ReprairCard::find($id);


        $client = Client::find($repairCard->client->id);
        $client->update($request->only(
            [
                'fullName', 'phone'
            ]
        ));
        $client->save();

        $car = Car::find($repairCard->car->id);
        $car->update($request->only(
            [
                'model', 'car_structure_number', 'platNo', 'car_color',
                'carType_id', 'car_brand_category_id'
            ]
        ));
        $car->client_id = $client->id;
        $car->save();

        $items = $repairCard->items;
        foreach ($items as $item) {
            $item->delete();
        }
        $price =   $request->get('price');
        foreach ($request->get('services') as $id => $service) {
            $repairCardItem = new RepairCardItem();
            $repairCardItem->service_id = $service;
            $carService = Service::find($service);
            $repairCardItem->card_id = $repairCard->id;
            $repairCardItem->service_client_cost = $price[$id];
            $repairCardItem->service_cost = $carService->service_cost;
            $repairCardItem->save();
        }
        $repairCard->update($request->only(
            [
                'checkReprort','employee_id'
            ]
        ));
        $repairCard->client_id = $client->id;
        $repairCard->car_id = $car->id;
        $repairCard->save();

        session()->flash('success', trans('admin.added'));
        return redirect('admin/reprairCard');
    }

    public function getServices(ReprairCard $reprairCard, Request $request)
    {
        $value = $request->get('value');
        $data = DB::table('car_services')
            ->where('service_type', $value)
            ->get();

        $output = '<option value="">' . trans("site.options") . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->service_id . '">' . $row->service_name . "_" . $row->service_number . '</option>';
        }

        echo $output;
    }
    public function getPrice(ReprairCard $reprairCard, Request $request)
    {
        $value = $request->get('value');
        $data = Service::where('service_id', $value)->firstOrFail();
        $output = $data->service_client_cost;
        echo $output;
    }
    // public function mail($id)
    // {

    //     $client = Client::find($id);

    //     Mail::to($client->email)->send(new SendMailable($client));

    //     if (Mail::failures()) {
    //         return response()->Fail('Sorry! Please try again latter');
    //     } else {
    //         return response()->success('Great! Successfully send in your mail');
    //     }
    // }
}
