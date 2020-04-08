<?php

namespace App\Http\Controllers;

use App\OperationOrder;
use Illuminate\Http\Request;

class OperationOrderController extends Controller
{
  
    public function index()
    {
        $operationOrders = OperationOrder::all();
        return view('admin.operationOrder.index',compact('operationOrders'));
    }

    public function show($id)
    {
        $operationOrder = OperationOrder::find($id);
        return view('admin.operationOrder.show', compact('operationOrder'));


    }

}
