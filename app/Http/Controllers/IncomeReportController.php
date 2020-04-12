<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use App\InvoicePayment;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Custom;
use Auth;
use App\ReprairCard;

class IncomeReportController extends Controller
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
        $incomes = InvoicePayment::all();


        $income_date_from = '';
        $income_date_to = '';

        return view('admin.report.incomeContractReport', [
            'income_date_from' => $income_date_from,
            'income_date_to' => $income_date_to,
            'incomes' => $incomes
        ]);
    }


    public function search()
    {
        $income_date_from = $_GET['income_date_from'];
        $income_date_to = $_GET['income_date_to'];

        $c = InvoicePayment::select("*");


        if ($income_date_from) {
            $c->whereDate('invoice_payment_date', '>=', $income_date_from)->whereDate('invoice_payment_date', '<=', $income_date_to)->get();
        }

        $incomes = $c->get();

        return view('admin.report.incomeContractReport', [
            'income_date_from' => $income_date_from,
            'income_date_to' => $income_date_to,
            'incomes' => $incomes

        ]);
    }

    public function indexNoneContract()
    {
        $incomes = InvoicePayment::all();


        $income_date_from = '';
        $income_date_to = '';

        return view('admin.report.incomeNoneContractReport', [
            'income_date_from' => $income_date_from,
            'income_date_to' => $income_date_to,
            'incomes' => $incomes
        ]);
    }


    public function searchNoneContract()
    {
        $income_date_from = $_GET['income_date_from'];
        $income_date_to = $_GET['income_date_to'];

        $c = InvoicePayment::select("*");

        if ($income_date_from) {
            $c->whereDate('invoice_payment_date', '>=', $income_date_from)->whereDate('invoice_payment_date', '<=', $income_date_to)->get();
        }


        $incomes = $c->get();

        return view('admin.report.incomeNoneContractReport', [
            'income_date_from' => $income_date_from,
            'income_date_to' => $income_date_to,
            'incomes' => $incomes

        ]);
    }
}
