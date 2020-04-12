<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Custom;
use Auth;
class ExpenseReportController extends Controller
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
        $expenses = Expense::all();

        $expense_date_from = '';
        $expense_date_to = '';


        return view('admin.report.expenseReport', [
            'expense_date_from' => $expense_date_from,
            'expense_date_to' => $expense_date_to,
            'expenses' => $expenses
        ]);
    }


    public function search()
    {
        $expense_date_from = $_GET['expense_date_from'];
        $expense_date_to = $_GET['expense_date_to'];

        $c = Expense::select("*");

        if ($expense_date_from) {
            $c->whereBetween('expense_date', [$expense_date_from, $expense_date_to])->get();
        }
        $expenses = $c->get();

        return view('admin.report.expenseReport', [
            'expense_date_from' => $expense_date_from,
            'expense_date_to' => $expense_date_to,
            'expenses' => $expenses

        ]);
    }
}
