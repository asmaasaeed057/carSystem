<?php

namespace App\Http\Controllers\admin;
use App\ReprairCard;
use App\Car;

use App\Client;
use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class DashboardController extends Controller
{

    public function home() {

    $repairCardQty = ReprairCard::whereDate('created_at', Carbon::today())->get()->count();
   // dd($repairCardQty);
    //$repairCardQty = count($repairCardQty);

    $clients = Client::all();
    $clientQty = Client::whereDate('created_at', Carbon::today())->get()->count();
  
    $account = Account::whereDate('created_at', Carbon::today())->get()->count();
   

    $carsQtn = Car::whereDate('created_at', Carbon::today())->get()->count();
   

    $repairCardQty = ReprairCard::whereDate('created_at', Carbon::today())->get()->count();
    
    
    $repairCardQty = ReprairCard::whereDate('created_at', Carbon::today())->get()->count();
    $repairCardQty2 = ReprairCard::all();
    
  
   
    
      
    //dd($account);
		return view('admin.index',compact('repairCardQty','account','clientQty','carsQtn','clients','repairCardQty2'));
    }

    public function client() {
		return view('admin.client');
    }

    public function createAdmin(){
      return view('admin.admins.create');
    }


}
