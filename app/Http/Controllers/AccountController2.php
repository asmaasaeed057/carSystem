<?php

namespace App\Http\Controllers;
use App\Client;
use App\ReprairCard;
use App\carCategory;
use App\Account;
use Illuminate\Http\Request;
use App\ReceiptVoucher;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //underMaintance
        $accounts  = Account::select('reprairCard_id as id','reprairCard_id as reprairCard_id', 'car_id', 'client_id')->distinct()->where('status' , '=','accepted' )->get();
         $accountCount = (count($accounts));
       //dd($accounts[0]->);
        return view('admin.accounting.index',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        Account::where('reprairCard_id' , $id)->update([
            'status' => 'underMaintance'
        ]);
        ReprairCard::where('id' , $id)->update([
            'status' => 'underMaintance'
        ]);
        session()->flash('success', trans('admin.done'));
        return back();
    }
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */


    public function print(Account $account,$id)
    {
        $repairCard = ReprairCard::find($id);
        $accounts  = Account::where('reprairCard_id', $id)->get();
      // dd($accounts);
      $subTotal = Account::where("reprairCard_id",$id)->get()->sum('subTotal');
      $tax = Account::where("reprairCard_id",$id)->get()->sum('tax');
      $ReceiptVoucher  = ReceiptVoucher::where('reprairCard_id', $id)->get();
      $datt = $ReceiptVoucher->sum('amount');
      $info  = Account::select('reprairCard_id as id', 'car_id', 'client_id')->distinct()->where('reprairCard_id',$id)->get();
        return view('admin.accounting.print',compact('accounts','info' ,'subTotal' ,'tax','ReceiptVoucher' ,'datt'));
    }
    public function edit(Account $account,$id)
    {
        //
        $repairCard = ReprairCard::find($id);
        $accounts  = Account::where('reprairCard_id', $id)->get();
        $ReceiptVoucher  = ReceiptVoucher::where('reprairCard_id', $id)->get();
        $datt = $ReceiptVoucher->sum('amount');
      // dd($accounts);
      $subTotal = Account::where("reprairCard_id",$id)->get()->sum('subTotal');
      $tax = Account::where("reprairCard_id",$id)->get()->sum('tax');

      $info  = Account::select('reprairCard_id as id', 'car_id', 'client_id')->distinct()->where('reprairCard_id',$id)->get();
        return view('admin.accounting.create',compact('accounts','info' ,'subTotal' ,'tax' ,'ReceiptVoucher' ,'datt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account ,$id)
    {
        $admin = Account::find($id);
        $admin->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }
}
