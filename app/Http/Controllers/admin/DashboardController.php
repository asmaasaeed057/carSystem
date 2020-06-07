<?php

namespace App\Http\Controllers\admin;

use App\ReprairCard;
use App\Car;

use App\Client;
use App\Account;
use App\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InvoicePayment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

  public function home()
  {

    $repairCardQty = ReprairCard::whereDate('created_at', Carbon::today())->get()->count();
    // dd($repairCardQty);
    //$repairCardQty = count($repairCardQty);

    //clients
    $clients = Client::where('client_type', '=', 'contract')->whereDate('created_at', Carbon::today())->get();
    $totalContractClients = Client::where('client_type', '=', 'contract')->get()->count();
    $todayConractClients = Client::where('client_type', '=', 'contract')->whereDate('created_at', Carbon::today())->get()->count();

    //cars
    $todayCars = Car::whereDate('created_at', Carbon::today())->get()->count();
    $totalAcceptedCars = ReprairCard::where('status', '=', 'accepted')->get()->count();
    $totalCars = Car::get()->count();


    //repair cards
    $totalAcceptedCards = ReprairCard::where('status', '=', 'accepted')->whereDate('created_at', Carbon::today())->get()->count();
    $totalPandingCards = ReprairCard::where('status', '=', 'panding')->whereDate('created_at', Carbon::today())->get()->count();
    $totalDeniedCards = ReprairCard::where('status', '=', 'denied')->whereDate('created_at', Carbon::today())->get()->count();


    //expenses
    $todayExpenses = Expense::whereDate('expense_date', Carbon::today())->get()->sum('expense_price');
    $totalExpenses = Expense::get()->sum('expense_price');


    //payments

    $todayInvoicePayment = InvoicePayment::whereDate('invoice_payment_date', Carbon::today())->get()->sum('invoice_payment_amount');
    // $todayInvoicePaymenyContract = InvoicePayment::whereDate('invoice_payment_date', Carbon::today())
    // 	->join('client', 'repairCard.client_id', '=', 'client.id')

    // ->with('invoice.repairCard.client')->where('client.client_type' , '=' , 'contract')->get()->sum('invoice_payment_amount');



    // $todayInvoicePaymenyContract = InvoicePayment::with(array('invoice' => function($query)
    // {
    //      $query->where('invoice.repairCard.client.client_type' , '=' , 'contract');
    //     //  $query->orderBy('orders.created_at', 'DESC');
    // }))
    //     // ->orderBy('date')
    //     ->get();


    // $todayInvoicePaymenyContract = DB::table('invoices')
    // ->leftJoin('invoice_payment', 'invoices.invoice_id', '=', 'invoice.invoice_id')->orderBy('invoice_payment_amount', 'DESC')
    // ->get();


    $data = DB::table('invoice_payment')
      ->join('invoices', 'invoices.invoice_id', '=', 'invoice_payment.invoice_id')
      ->join('reprair_cards', 'reprair_cards.id', '=', 'invoices.repair_card_id')
      ->join('clients', 'clients.id', '=', 'reprair_cards.client_id')
      ->where('client_type', '=', 'contract')
      ->sum('invoice_payment.invoice_payment_amount');
      // ->distinct()
      // ->get();


    //  $data = DB::table('city')
    //  ->join('state', 'state.state_id', '=', 'city.state_id')
    //  ->join('country', 'country.country_id', '=', 'state.country_id')
    //  ->select('country.country_name', 'state.state_name', 'city.city_name')
    //  ->get();



    // User::with('city.region')->get();

    // dd($data);
    // dd($totalCars);


    ////////////////////////////////////////////
    $account = Account::whereDate('created_at', Carbon::today())->get()->count();


    $carsQtn = Car::whereDate('created_at', Carbon::today())->get()->count();


    $repairCardQty = ReprairCard::whereDate('created_at', Carbon::today())->get()->count();


    $repairCardQty = ReprairCard::whereDate('created_at', Carbon::today())->get()->count();
    $repairCardQty2 = ReprairCard::all();





    //dd($account);
    return view('admin.index', compact('todayCars', 'totalAcceptedCars', 'totalCars', 'totalAcceptedCards', 'totalPandingCards', 'totalDeniedCards', 'todayExpenses', 'totalExpenses', 'todayInvoicePayment', 'account', 'todayConractClients', 'clients', 'carsQtn', 'totalContractClients', 'repairCardQty2'));
  }

  public function client()
  {
    return view('admin.client');
  }

  public function createAdmin()
  {
    return view('admin.admins.create');
  }
}
