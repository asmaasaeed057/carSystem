<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Custom;
use Auth;
use App\ReprairCard;

class InvoiceReportController extends Controller
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
        $invoices = Invoice::all();

        $invoice_number = '';
        $client_name = '';
        $invoice_date_from = '';
        $invoice_date_to = '';

        return view('admin.report.invoiceContractReport', [
            'invoice_number' => $invoice_number,
            'invoice_date_from' => $invoice_date_from,
            'invoice_date_to' => $invoice_date_to,
            'client_name' => $client_name,
            'invoices' => $invoices
        ]);
    }


    public function search()
    {
        $invoice_number = $_GET['invoice_number'];
        $invoice_date_from = $_GET['invoice_date_from'];
        $invoice_date_to = $_GET['invoice_date_to'];
        $client_name = $_GET['client_name'];

        $c = Invoice::select("*");
        if ($invoice_number) {
            $c->where('invoice_number', $invoice_number)->get();
        }

        if ($invoice_date_from) {
            $c->whereDate('invoice_date', '>=', $invoice_date_from)->whereDate('invoice_date', '<=', $invoice_date_to)->get();
        }

        if ($client_name) {

            $client = Client::where('fullName', $client_name)->first();
            if($client){
            $clientId = $client->id;

            $repairCard = ReprairCard::where('client_id', $clientId)->first();
            }
            else{
                $repairCard ='';
            }
            if ($repairCard) {
                $cardId =  $repairCard->id;
            } else {
                $cardId = '';
            }

            $c->where('repair_card_id', $cardId)->get();
        }
        $invoices = $c->get();

        return view('admin.report.invoiceContractReport', [
            'invoice_number' => $invoice_number,
            'invoice_date_from' => $invoice_date_from,
            'invoice_date_to' => $invoice_date_to,
            'client_name' => $client_name,
            'invoices' => $invoices

        ]);
    }

    public function indexNoneContract()
    {
        $invoices = Invoice::all();

        $invoice_number = '';
        $client_name = '';
        $invoice_date_from = '';
        $invoice_date_to = '';

        return view('admin.report.invoiceNoneContractReport', [
            'invoice_number' => $invoice_number,
            'invoice_date_from' => $invoice_date_from,
            'invoice_date_to' => $invoice_date_to,
            'client_name' => $client_name,
            'invoices' => $invoices
        ]);
    }


    public function searchNoneContract()
    {
        $invoice_number = $_GET['invoice_number'];
        $invoice_date_from = $_GET['invoice_date_from'];
        $invoice_date_to = $_GET['invoice_date_to'];
        $client_name = $_GET['client_name'];

        $c = Invoice::select("*");
        if ($invoice_number) {
            $c->where('invoice_number', $invoice_number)->get();
        }

        if ($invoice_date_from) {
            $c->whereDate('invoice_date', '>=', $invoice_date_from)->whereDate('invoice_date', '<=', $invoice_date_to)->get();
        }

        if ($client_name) {

            $client = Client::where('fullName', $client_name)->first();
            if($client){
            $clientId = $client->id;

            $repairCard = ReprairCard::where('client_id', $clientId)->first();
            }
            else{
                $repairCard ='';
            }
            if ($repairCard) {
                $cardId =  $repairCard->id;
            } else {
                $cardId = '';
            }

            $c->where('repair_card_id', $cardId)->get();
        }
        $invoices = $c->get();

        return view('admin.report.invoiceNoneContractReport', [
            'invoice_number' => $invoice_number,
            'invoice_date_from' => $invoice_date_from,
            'invoice_date_to' => $invoice_date_to,
            'client_name' => $client_name,
            'invoices' => $invoices

        ]);
    }
}
