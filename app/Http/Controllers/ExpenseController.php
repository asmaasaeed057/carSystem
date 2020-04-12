<?php

namespace App\Http\Controllers;

use App\Expense;
use App\box;
use Illuminate\Http\Request;
use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Role;
use App\Custom;
use Auth;

class ExpenseController extends Controller
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
        return view('admin.expense.index', compact('expenses'));
    }

    public function create()
    {
        return view('admin.expense.create');
    }
    public function show()
    {
    }

    public function store(StoreExpenseRequest $request)
    {

        Expense::create($request->all());
        session()->flash('success', "Expense created successfully");
        return redirect(route('expense.index'));
    }

    public function edit($id)
    {
        $expense = Expense::find($id);
        return view('admin.expense.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        $expense->update($request->all());
        session()->flash('success', "expense updated successfully");
        return redirect(route('expense.index'));
    }

    public function destroy($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        session()->flash('success', "Expense deleted successfully");
        return redirect(route('expense.index'));
    }
}
