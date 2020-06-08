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


    //elmadyonat

    $contractPayments = DB::table('invoice_payment')
      ->join('invoices', 'invoices.invoice_id', '=', 'invoice_payment.invoice_id')
      ->whereDate('invoice_payment_date', Carbon::today())
      ->join('reprair_cards', 'reprair_cards.id', '=', 'invoices.repair_card_id')
      ->join('clients', 'clients.id', '=', 'reprair_cards.client_id')
      ->where('client_type', '=', 'contract')
      ->sum('invoice_payment.invoice_payment_amount');

    $noneContractPayments = DB::table('invoice_payment')
      ->join('invoices', 'invoices.invoice_id', '=', 'invoice_payment.invoice_id')
      ->whereDate('invoice_payment_date', Carbon::today())

      ->join('reprair_cards', 'reprair_cards.id', '=', 'invoices.repair_card_id')
      ->join('clients', 'clients.id', '=', 'reprair_cards.client_id')
      ->where('client_type', '!=', 'contract')
      ->sum('invoice_payment.invoice_payment_amount');


    $invoicesContract = DB::table('invoices')
      ->whereDate('invoice_date', Carbon::today())
      ->join('reprair_cards', 'reprair_cards.id', '=', 'invoices.repair_card_id')
      ->join('clients', 'clients.id', '=', 'reprair_cards.client_id')
      ->where('client_type', '=', 'contract');

    $todayTotalInvoices = $invoicesContract->sum('invoices.invoice_total');
    $invoicesContract->leftJoin('invoice_payment', 'invoice_payment.invoice_id', '=', 'invoices.invoice_id');
    $todayTotalPayment = $invoicesContract->sum('invoice_payment.invoice_payment_amount');
    $todayRemainContract = $todayTotalInvoices - $todayTotalPayment;



    $invoicesTotalContract = DB::table('invoices')
      ->join('reprair_cards', 'reprair_cards.id', '=', 'invoices.repair_card_id')
      ->join('clients', 'clients.id', '=', 'reprair_cards.client_id')
      ->where('client_type', '=', 'contract');

    $totalInvoices = $invoicesTotalContract->sum('invoices.invoice_total');
    $invoicesTotalContract->leftJoin('invoice_payment', 'invoice_payment.invoice_id', '=', 'invoices.invoice_id');
    $totalPayment = $invoicesTotalContract->sum('invoice_payment.invoice_payment_amount');
    $totalRemainContract = $totalInvoices - $totalPayment;
    // dd($totalRemainCotract);






    ////////////////////////////////////////////
    $account = Account::whereDate('created_at', Carbon::today())->get()->count();


    $carsQtn = Car::whereDate('created_at', Carbon::today())->get()->count();


    $repairCardQty = ReprairCard::whereDate('created_at', Carbon::today())->get()->count();


    $repairCardQty = ReprairCard::whereDate('created_at', Carbon::today())->get()->count();
    $repairCardQty2 = ReprairCard::all();





    //dd($account);
    return view('admin.index', compact('todayCars', 'totalAcceptedCars', 'totalCars', 'totalAcceptedCards', 'totalPandingCards', 'totalDeniedCards', 'todayExpenses', 'totalExpenses', 'todayInvoicePayment', 'account', 'todayConractClients', 'clients', 'carsQtn', 'totalContractClients', 'contractPayments', 'noneContractPayments', 'totalRemainContract', 'todayRemainContract'));
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
