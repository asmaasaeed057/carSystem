<?php

namespace App\Http\Controllers;

use App\Client;
use App\OperationOrder;
use Illuminate\Http\Request;
use App\Custom;
use App\Invoice;
use App\ReprairCard;
use App\Car;
use App\TechnicalEmployee;
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
        $client_name = '';
        $car_id = '';
        $technical_name = '';
        $operation_order_number = '';
        $operationOrders = OperationOrder::all();
        $cars = Car::get();

        return view('admin.operationOrder.index', compact('operationOrders', 'client_name', 'car_id', 'technical_name', 'operation_order_number', 'cars'));
    }

    public function show($id)
    {
        $operationOrder = OperationOrder::find($id);
        return view('admin.operationOrder.show', compact('operationOrder'));
    }
    public function indexNoneContract()
    {
        $client_name = '';
        $car_id = '';
        $technical_name = '';
        $operation_order_number = '';
        $operationOrders = OperationOrder::all();
        $cars = Car::get();
        return view('admin.operationOrder.indexNoneContract', compact('operationOrders', 'client_name', 'car_id', 'technical_name', 'operation_order_number', 'cars'));
    }

    public function operationSearchIndex()
    {
        $client_name = $_GET['client_name'];
        $car_id = $_GET['car_id'];
        $technical_name = $_GET['technical_name'];
        $operation_order_number = $_GET['operation_order_number'];
        $cars = Car::get();

        $c = OperationOrder::select("*");

        if ($client_name) {
            $client = Client::where('fullName', '=', $client_name)->first();

            if ($client) {
                $clientId = $client->id;
                $clientRepairCard = ReprairCard::where('client_id', '=', $clientId)->first();
                if ($clientRepairCard) {
                    $invoiceId = $clientRepairCard->invoice->invoice_id;
                } else {
                    $invoiceId = '';
                }
            } else {
                $invoiceId = '';
            }
            $c->where('invoice_id', '=', $invoiceId)->get();
        }
        if ($car_id) {
            $car = Car::where('id', '=', $car_id)->first();
            if ($car) {
                $carId = $car->id;
                $carRepairCard = ReprairCard::where('car_id', '=', $carId)->first();
                if ($carRepairCard) {
                    $invoiceId = $carRepairCard->invoice->invoice_id;
                } else {
                    $invoiceId = '';
                }
            } else {
                $invoiceId = '';
            }
            $c->where('invoice_id', '=', $invoiceId)->get();
        }


        if ($technical_name) {
            $technicalEmp = TechnicalEmployee::where('employee_name', '=', $technical_name)->first();
            if ($technicalEmp) {
                $employeeId = $technicalEmp->employee_id;

                $clientRepairCard = ReprairCard::where('employee_id', '=', $employeeId)->first();
                if ($clientRepairCard) {
                    $invoiceId = $clientRepairCard->invoice->invoice_id;
                } else {
                    $invoiceId = '';
                }
            } else {
                $invoiceId = '';
            }
            $c->where('invoice_id', '=', $invoiceId)->get();
        }

        if ($operation_order_number) {
            $c->where('operation_order_number', '=', $operation_order_number)->get();
        }

        $operationOrders = $c->get();

        return view('admin.operationOrder.index', [
            'client_name' => $client_name,
            'car_id' => $car_id,
            'technical_name' => $technical_name,
            'operation_order_number' => $operation_order_number,
            'operationOrders' => $operationOrders,
            'cars' => $cars
        ]);
    }

    public function operationSearchNoneContractIndex()
    {
        $client_name = $_GET['client_name'];
        $car_id = $_GET['car_id'];
        $technical_name = $_GET['technical_name'];
        $operation_order_number = $_GET['operation_order_number'];
        $cars = Car::get();

        $c = OperationOrder::select("*");

        if ($client_name) {
            $client = Client::where('fullName', '=', $client_name)->first();

            if ($client) {
                $clientId = $client->id;
                $clientRepairCard = ReprairCard::where('client_id', '=', $clientId)->first();
                if ($clientRepairCard) {
                    $invoiceId = $clientRepairCard->invoice->invoice_id;
                } else {
                    $invoiceId = '';
                }
            } else {
                $invoiceId = '';
            }
            $c->where('invoice_id', '=', $invoiceId)->get();
        }
        if ($car_id) {
            $car = Car::where('id', '=', $car_id)->first();
            if ($car) {
                $carId = $car->id;
                $carRepairCard = ReprairCard::where('car_id', '=', $carId)->first();
                if ($carRepairCard) {
                    $invoiceId = $carRepairCard->invoice->invoice_id;
                } else {
                    $invoiceId = '';
                }
            } else {
                $invoiceId = '';
            }
            $c->where('invoice_id', '=', $invoiceId)->get();
        }


        if ($technical_name) {
            $technicalEmp = TechnicalEmployee::where('employee_name', '=', $technical_name)->first();
            if ($technicalEmp) {
                $employeeId = $technicalEmp->employee_id;

                $clientRepairCard = ReprairCard::where('employee_id', '=', $employeeId)->first();
                if ($clientRepairCard) {
                    $invoiceId = $clientRepairCard->invoice->invoice_id;
                } else {
                    $invoiceId = '';
                }
            } else {
                $invoiceId = '';
            }
            $c->where('invoice_id', '=', $invoiceId)->get();
        }

        if ($operation_order_number) {
            $c->where('operation_order_number', '=', $operation_order_number)->get();
        }

        $operationOrders = $c->get();

        return view('admin.operationOrder.indexNoneContract', [
            'client_name' => $client_name,
            'car_id' => $car_id,
            'technical_name' => $technical_name,
            'operation_order_number' => $operation_order_number,
            'operationOrders' => $operationOrders,
            'cars' => $cars
        ]);
    }
}
