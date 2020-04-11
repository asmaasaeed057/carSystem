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
use App\ReceiptVoucher;
use DB;
use App\Service;
use App\CardStatus;
use App\CarBrandCategory;
use App\Invoice;
use App\OperationOrder;
use App\InvoicePayment;
use App\TechnicalEmployee;




class ReprairCardController extends Controller
{
    /*     public function __construct()
    {
        $this->middleware('permission:reprair_cards_show', ['only' => 'index','show']);
        $this->middleware('permission:reprair_cards_edit', ['only' => 'edit','update']);
        $this->middleware('permission:reprair_cards_add', ['only' => 'store' ,'create']);
        $this->middleware('permission:reprair_cards_delete', ['only' => 'multi_delete','distroy']);
    } */
    public function money()
    {
        // dd(request()->all());
        $tex_totle = request()->tex_totle;
        $title = request()->total;
        $total = request()->tex_totle - request()->total;
        $box = box::where('reprairCard_id', request()->reprairCard_id)->first();
        if ($box == null) {
            $createBox = new box();
            $createBox->IsDebit = $total;
            $createBox->total = request()->tex_totle;
            $createBox->tex = request()->tax;
            $createBox->reprairCard_id = request()->reprairCard_id;
            $createBox->Admin_id = auth('admin')->user()->id;
            $createBox->save();
        }

        $countBox = ReceiptVoucher::where('reprairCard_id', request()->reprairCard_id)->get()->sum('amount');
        $box = box::where('reprairCard_id', request()->reprairCard_id)->get()->sum('total');
        $isDebit = $box - $countBox;
        dd($isDebit);
        if ($isDebit > 0) {
            if (request()->type === "cash") {
                $account = new ReceiptVoucher();
                $account->reprairCard_id = request()->reprairCard_id;
                $account->paymentType = request()->type;
                // $account->IsDebit = $total;
                // $account->total = request()->tex_totle;
                $account->amount = request()->total;
                $account->Admin_id = auth('admin')->user()->id;
                // paymentType
                $account->save();
            } else {

                $account = new ReceiptVoucher();
                $account->reprairCard_id = request()->reprairCard_id;
                // $account->tex = request()->tax;
                $account->pay_no = request()->pay_no;
                $account->pay_date = request()->pay_date;
                $account->bankName = request()->bankName;
                $account->paymentType = request()->type;
                // $account->IsDebit = $total;
                $account->amount = request()->total;
                // $account->PaidUp = request()->total;
                // $account->total = request()->tex_totle;
                $account->Admin_id = auth('admin')->user()->id;
                $account->save();
            }

            $countBox1 = ReceiptVoucher::where('reprairCard_id', request()->reprairCard_id)->get()->sum('amount');
            $box1 = box::where('reprairCard_id', request()->reprairCard_id)->get()->sum('total');
            $isDebit2 = $box1 - $countBox1;
            $updatebox = box::where('reprairCard_id', request()->reprairCard_id)->update([
                'IsDebit' => $isDebit2,
                'status' => 'isDebit'
            ]);
        } else {
            session()->flash('error', trans('site.paid'));
            return redirect('admin/box');
        }

        $countBox3 = ReceiptVoucher::where('reprairCard_id', request()->reprairCard_id)->get()->sum('amount');
        $box3 = box::where('reprairCard_id', request()->reprairCard_id)->get()->sum('total');
        $isDebit3 = $box3 - $countBox3;

        if ($isDebit3 === 0) {
            box::where('reprairCard_id', request()->reprairCard_id)->update([
                'status' => 'finshed'
            ]);
        }

        session()->flash('success', trans('admin.added'));
        return redirect('admin/box');
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

    public function accept(Request $request)
    {
        // dd(request()->All());

        $rules = [
            'client_id' => 'required|numeric',
            'car_id' => 'required|numeric',
            'reprairCard_id' => 'required|numeric',
            'ItemName' => '',
            'qty' => '',
            'price' => '',
            'subTotal' => '',
            'tax' => '',
            'total' => '',
            // 'paidAmount' => 'required',
            // 'isDebet' => 'required',
        ];
        $data = $this->validate(request(), $rules, [], [
            'client_id'     => trans('site.clientName'),
            'car_id'  => trans('site.car'),
            'reprairCard_id' => trans('site.RepairCard'),
            'ItemName'     => trans('site.ItemName'),
            'qty'  => trans('site.qty'),
            'price' => trans('site.price'),
            'tax'     => trans('site.tax'),
            'total'  => trans('site.total'),
            // 'paidAmount' => trans('site.paidAmount'),
            // 'isDebet' => trans('site.isDebet'),

        ]);
        //  dd();
        for ($i = 0; $i < count(request()->ItemName); $i++) {
            if (request()->ItemName[$i] != null || request()->qty[$i] != null || request()->price[$i] !=  null || request()->subTotal[$i] != null  || request()->total[$i] != null  || request()->tax[$i] != null) {
                $account = new Account();
                $account->client_id = request()->client_id;
                $account->car_id = request()->car_id;
                $account->reprairCard_id = request()->reprairCard_id;
                $account->admin_id = auth('admin')->user()->id;
                $account->status = "accepted";
                $account->qty = request()->qty[$i];
                $account->subTotal = request()->subTotal[$i];
                $account->ItemName = request()->ItemName[$i];
                $account->price = request()->price[$i];
                $account->tax = request()->tex_totle;
                $account->total = request()->total[$i];
                $account->save();
            }
        }
        //  return "done";
        //  $data['admin_id'] = auth('admin')->user()->id;

        //  $data['status'] = "accepted";
        //  Account::create($data);
        ReprairCard::where('id', \request()->reprairCard_id)->update(['status' => "accepted"]);
        session()->flash('success', trans('admin.added'));
        return back();
    }


    public function newitem()
    {
        $repairCards = ReprairCard::get();

        return view('admin.repairCard.item', compact('repairCards'));
    }
    public function index()
    {
        //
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

    public function invoiceIndexNoneContract(){
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
        //
        $clientId = '';
        $clients = Client::get();
        if (ReprairCard::orderBy('id', 'desc')->first()) {
            $number = ReprairCard::orderBy('id', 'desc')->first()->card_number;
        } else {
            $number = 0;
        }

        $cars = Car::get();
        $services = Service::get();
        $employee=TechnicalEmployee::get();

        return view('admin.repairCard.create', compact('clients', 'cars', 'services', 'clientId', 'number','employee'));
    }

    public function createRepairCard($clientId)
    {
        // dd($clientId);
        $clients = Client::get();
        $cars = Car::get();
        $services = Service::get();
        $client = Client::find($clientId);
        $clientCars = Car::all()->where('client_id', '=', $client->id);
        // dd($clientCars);
        return view('admin.repairCard.create', compact('clients', 'cars', 'services', 'client', 'clientId', 'clientCars'));
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






    /**
     * Display the specified resource.
     *
     * @param  \App\ReprairCard  $reprairCard
     * @return \Illuminate\Http\Response
     */
    public function show(ReprairCard $reprairC, $id)
    {
        //
        $repairCard = ReprairCard::find($id);

        return view('admin.repairCard.show', compact('repairCard'));
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
        $employee=TechnicalEmployee::get();


        return view('admin.repairCard.edit', compact('repairCard', 'clients', 'cars', 'allServices','employee'));
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
        $card = ReprairCard::find($id);
        $card->update($request->only(
            [
                'checkReprort', 'client_id','car_id','employee_id'
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
    public function destroy(ReprairCard $reprairCard)
    {
        $admin = AdminGroup::find($id);

        $admin->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }
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
    public function invoice($id)
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
        return view('admin.invoice.index', compact('invoices'));
    }
}
