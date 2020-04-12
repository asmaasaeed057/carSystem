<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\CustomInvoice;
use App\CustomInvoiceItem;
use App\Custom;
use Auth;


class CustomInvoiceController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = CustomInvoice::all();
        return view('admin.customInvoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (CustomInvoice::orderBy('invoice_id', 'desc')->first()) {
            $number = CustomInvoice::orderBy('invoice_id', 'desc')->first()->invoice_number;
        } else {
            $number = 0;
        }

        $services = Service::get();
        return view('admin.customInvoice.create', compact('services', 'number'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = CustomInvoice::create($request->all());
        $price =   $request->get('price');
        foreach ($request->get('services') as $id => $service) {
            if ($service) {
                $InvoiceItem = new CustomInvoiceItem();
                $InvoiceItem->service_id = $service;
                $carService = Service::find($service);
                $InvoiceItem->invoice_id = $invoice->invoice_id;
                $InvoiceItem->client_cost = $price[$id];
                $InvoiceItem->price_cost = $carService->service_cost;
                $InvoiceItem->save();
            }
        }
        $invoices = CustomInvoice::all();
        return view('admin.customInvoice.index', compact('invoices'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = CustomInvoice::find($id);
        return view('admin.customInvoice.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = CustomInvoice::find($id);
        $allServices = Service::all();

        return view('admin.customInvoice.edit', compact('invoice', 'allServices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $invoice = CustomInvoice::find($id);
        $invoice->update($request->only(
            [
                'client_name'
            ]
        ));
        $invoice->save();
        $items = $invoice->items;
        foreach ($items as $item) {
            $item->delete();
        }
        $price =   $request->get('price');
        foreach ($request->get('services') as $id => $service) {
            $invoiceItem = new CustomInvoiceItem();
            $invoiceItem->service_id = $service;
            $carService = Service::find($service);
            $invoiceItem->invoice_id = $invoice->invoice_id;
            $invoiceItem->client_cost = $price[$id];
            $invoiceItem->price_cost = $carService->service_cost;
            $invoiceItem->save();
        }
        return redirect('admin/customInvoice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = CustomInvoice::find($id);
        $items = $invoice->items;
        foreach ($items as $item) {
            $item->delete();
        }
        $invoice->delete();
        return back();
    }
}
