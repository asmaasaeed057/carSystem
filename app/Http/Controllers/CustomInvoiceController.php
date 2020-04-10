<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\CustomInvoice;
use App\CustomInvoiceItem;



class CustomInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices=CustomInvoice::all();
        return view('admin.customInvoice.index', compact('invoices'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(CustomInvoice::orderBy('invoice_id', 'desc')->first())
        {
        $number=CustomInvoice::orderBy('invoice_id', 'desc')->first()->invoice_number;
        }
        else
        {
            $number=0;
        }

        $services = Service::get();
        return view('admin.customInvoice.create', compact('services','number'));

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
        $invoices=CustomInvoice::all();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
