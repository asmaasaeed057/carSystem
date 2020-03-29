<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reportController extends Controller
{
    //
    public function FilterClients(){
        return view('admin.report.clients');
    }
    public function FilterIncome(){
        return view('admin.report.income');
    }
    

}
