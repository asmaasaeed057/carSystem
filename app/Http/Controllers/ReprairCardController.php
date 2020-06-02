<?php

namespace App\Http\Controllers;

use App\Client;
use App\ReprairCard;
use App\RepairCardItem;
use App\CarCategory;
use App\Account;
use App\Car;
use Illuminate\Http\Request;
use App\Box;
use DB;
use App\Service;
use App\CardStatus;
use App\CarBrandCategory;
use App\Invoice;
use App\OperationOrder;
use App\InvoicePayment;
use App\TechnicalEmployee;
use App\Custom;
use Auth;
use App\CompanyDetails;
use App\CardTaxes;





class ReprairCardController extends Controller
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

    public function approved($id)
    {
        $card = ReprairCard::find($id);
        $date = date('Y-m-d H:i:s');
        $card->status = 'accepted';
        $card->save();
        $status = new CardStatus();
        $status->card_id = $id;
        $status->card_status_date = $date;
        $status->card_status = $card->status;
        $status->save();

        return back();
    }

    public function denied($id)
    {
        $card = ReprairCard::find($id);
        $date = date('Y-m-d H:i:s');
        $card->status = 'denied';
        $card->save();
        $status = new CardStatus();
        $status->card_id = $id;
        $status->card_status_date = $date;
        $status->card_status = $card->status;
        $status->save();

        return back();
    }

    public function index()
    {
        $clients = Client::get();
        $repairCards = ReprairCard::get();
        $categories = CarBrandCategory::get();
        $categoryId = "";
        $date = "";
        $clientId = "";
        $platNo = "";
        $cardNo = "";
        $status = "";
        $datefrom = "";
        $dateto = "";
        return view('admin.repairCard.index', compact('repairCards', 'clients', 'categories', 'categoryId', 'dateto', 'datefrom', 'clientId', 'platNo', 'cardNo', 'status'));
    }

    public function invoiceIndexNoneContract()
    {
        $invoices = Invoice::all();
        return view('admin.invoice.invoiceIndexNoneContract', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientId = '';
        $clients = Client::get();
        if (ReprairCard::orderBy('id', 'desc')->first()) {
            $number = ReprairCard::orderBy('id', 'desc')->first()->card_number;
        } else {
            $number = 0;
        }

        $cars = Car::get();
        $services = Service::get();
        $employee = TechnicalEmployee::get();
        $taxes=CardTaxes::orderBy('taxes_id', 'desc')->first()->taxes_value;
        return view('admin.repairCard.create', compact('clients', 'cars', 'services', 'clientId', 'number', 'employee','taxes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'checkReprort' => 'required ',
            'client_id' => 'required',
            'car_id' => 'required',
            'employee_id' => 'required'
        ]);

        $repairCard = ReprairCard::create($request->all());
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
        session()->flash('success', trans('admin.added'));
        return redirect('admin/reprairCard');
    }


    public function createRepairCardFromClient($clientId)
    {
        $clients = Client::get();
        $cars = Car::get();
        $services = Service::get();
        $client = Client::find($clientId);
        $employee = TechnicalEmployee::get();
        $clientCars = Car::all()->where('client_id', '=', $client->id);
        if (ReprairCard::orderBy('id', 'desc')->first()) {
            $number = ReprairCard::orderBy('id', 'desc')->first()->card_number;
        } else {
            $number = 0;
        }

        return view('admin.repairCard.create', compact('clients', 'cars', 'services', 'client', 'clientId', 'clientCars', 'employee', 'number'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\ReprairCard  $reprairCard
     * @return \Illuminate\Http\Response
     */
    public function show(ReprairCard $reprairC, $id)
    {
        $repairCard = ReprairCard::find($id);
        $company=CompanyDetails::all()->first();

        return view('admin.repairCard.show', compact('repairCard','company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReprairCard  $reprairCard
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repairCard = ReprairCard::find($id);
        $cars = Car::where('client_id', $repairCard->client_id)->get();
        $clients = Client::all();
        $allServices = Service::all();
        $employee = TechnicalEmployee::get();

        return view('admin.repairCard.edit', compact('repairCard', 'clients', 'cars', 'allServices', 'employee'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReprairCard  $reprairCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'checkReprort' => 'required ',
            'client_id' => 'required',
            'car_id' => 'required',
            'employee_id' => 'required'
        ]);
        $card = ReprairCard::find($id);
        $card->update($request->only(
            [
                'checkReprort', 'client_id', 'car_id', 'employee_id','card_discount'
            ]
        ));
        $card->save();
        $items = $card->items;
        foreach ($items as $item) {
            $item->delete();
        }
        $price =   $request->get('price');
        foreach ($request->get('services') as $id => $service) {
            $repairCardItem = new RepairCardItem();
            $repairCardItem->service_id = $service;
            $carService = Service::find($service);
            $repairCardItem->card_id = $card->id;
            $repairCardItem->service_client_cost = $price[$id];
            $repairCardItem->service_cost = $carService->service_cost;
            $repairCardItem->save();
        }
        session()->flash('success', trans('admin.added'));
        return redirect('admin/reprairCard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReprairCard  $reprairCard
     * @return \Illuminate\Http\Response
     */
    public function cardSearch()
    {
        $clients = Client::get();
        $categories = CarBrandCategory::get();

        $clientId = $_GET['client_id'];
        $datefrom = $_GET['date_from'];
        $dateto = $_GET['date_to'];
        $categoryId = $_GET['car_brand_category_id'];
        $platNo = $_GET['plat_number'];
        $cardNo = $_GET['card_number'];
        $status = $_GET['status'];

        $c = ReprairCard::select("*");
        if ($categoryId) {
            $carIds = Car::where('car_brand_category_id', $categoryId)->pluck('id');
            $c->whereIn('car_id', $carIds);
        }
        if ($datefrom) {
            $c->whereDate('created_at', '>=', $datefrom)
                ->whereDate('created_at', '<=', $dateto)
                ->get();
        }
        if ($clientId) {
            $c->where('client_id', $clientId);
        }
        if ($platNo) {
            $car = Car::where('platNo', $platNo)->first();
            if ($car) {
                $c->where('car_id', $car->id);
            }
        }
        if ($cardNo) {
            $c->where('card_number', $cardNo);
        }
        if ($status) {
            $c->where('status', $status);
        }
        $repairCards = $c->get();

        return view('admin.repairCard.index', compact('repairCards', 'clients', 'categories', 'categoryId', 'dateto', 'datefrom', 'clientId', 'platNo', 'cardNo', 'status'));
    }

    //Reports
    public function ClientReport()
    {
        $clients = Client::get();
        $clientId = "";
        $cards = array();
        return view('admin.repairCard.clientReport', compact('clientId', 'clients', 'cards'));
    }

    public function clientSearch()
    {
        $clientId = $_GET['client_id'];
        $clients = Client::get();

        $c = ReprairCard::select("*");
        if ($clientId) {
            $c->where('client_id', $clientId);
        }
        $cards = $c->get();
        return view('admin.repairCard.clientReport', compact('clientId', 'clients', 'cards'));
    }
    public function cardTaxesReport()
    {
        $datefrom = "";
        $dateto = "";
        $cards = array();
        return view('admin.repairCard.cardTaxesReport', compact('cards', 'datefrom', 'dateto'));
    }
    public function cardTaxesSearch()
    {
        $datefrom = $_GET['card_date_from'];
        $dateto = $_GET['card_date_to'];
        $c = ReprairCard::select("*");


        if ($datefrom) {
            $c->whereDate('created_at', '>=', $datefrom)
                ->whereDate('created_at', '<=', $dateto)
                ->get();
        }
        $cards = $c->get();
        return view('admin.repairCard.cardTaxesReport', compact('cards', 'datefrom', 'dateto'));
    }


    //Invoices

    public function createInvoice($id)
    {
        $card = ReprairCard::find($id);

        $invoice = new Invoice;
        $invoice->invoice_number = $card->card_number;
        $invoice->invoice_date = date('Y-m-d H:i:s');
        $invoice->invoice_total = $card->total_with_taxes;
        $invoice->repair_card_id = $id;
        $invoice->save();
        $operationOrder = new OperationOrder;
        $operationOrder->operation_order_number = $card->card_number;
        $operationOrder->operation_order_date = date('Y-m-d H:i:s');
        $operationOrder->invoice_id = $invoice->invoice_id;
        $operationOrder->save();
        return back();
    }
    public function invoiceIndex()
    {
        $invoices = Invoice::all();
        return view('admin.invoice.index', compact('invoices'));
    }
    public function invoiceShow($id)
    {
        $invoice = Invoice::find($id);
        return view('admin.invoice.show', compact('invoice'));
    }
    public function invoicePayment($id)
    {
        $invoice = Invoice::find($id);
        if (InvoicePayment::orderBy('invoice_payment_id', 'desc')->first()) {
            $number = InvoicePayment::orderBy('invoice_payment_id', 'desc')->first()->invoice_payment_number;
        } else {
            $number = 0;
        }
        $amount = $invoice->repairCard->residual_amount;

        return view('admin.invoice.payment', compact('invoice', 'id', 'number', 'amount'));
    }
    public function paymentStore(Request $request)
    {
        $amount = $request->get('invoice_payment_amount');
        $invoiceId = $request->get('invoice_id');
        $invoice = Invoice::find($invoiceId);
        $date = date('Y-m-d H:i:s');
        $invoiceNo = $request->get('invoice_payment_number');
        $residual = $request->get('residual');
        if ($amount <= $residual) {
            $payment = new InvoicePayment();
            $payment->invoice_payment_amount = $amount;
            $payment->invoice_id = $invoiceId;
            $payment->invoice_payment_date = $date;
            $payment->invoice_payment_number = $invoiceNo;
            $payment->save();
        } else {
            return back()->with('error', 'المبلغ المسدد غير صحيح');
        }
        $invoices = Invoice::all();
        if ($invoice->repairCard->client->client_type == "contract") {
            return view('admin.invoice.index', compact('invoices'));

        } else {
            return view('admin.invoice.invoiceIndexNoneContract', compact('invoices'));

        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Ajax functions
    public function getCars(ReprairCard $reprairCard, Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('cars')
            ->where('client_id', $value)
            ->get();

        $output = '<option value="">' . trans("site.options") . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . CarCategory::find($row->car_brand_category_id)->brand->name_en . "-" . CarCategory::find($row->car_brand_category_id)->name_en . "-" . $row->model . "-" . $row->platNo . '</option>';
        }

        echo $output;
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
}
