<?php

namespace App\Http\Controllers;

use App\OperationOrder;
use Illuminate\Http\Request;
use App\Custom;
use Auth;
class OperationOrderController extends Controller
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
        $operationOrders = OperationOrder::all();
        return view('admin.operationOrder.index', compact('operationOrders'));
    }

    public function show($id)
    {
        $operationOrder = OperationOrder::find($id);
        return view('admin.operationOrder.show', compact('operationOrder'));
    }
}
