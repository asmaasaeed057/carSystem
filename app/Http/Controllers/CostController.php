<?php

namespace App\Http\Controllers;

use App\cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $costList = cost::all();
        //dd($costList);

        return view('admin.cost.index',compact('costList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.cost.create');

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
        $rules = [
            'amount'=> 'required ',
            'note' => 'required',
            'beneficiary'=> 'required ',
            'paymentType' => 'required',
             'type' => '',
             

         ];
         $data = $this->validate(request(), $rules, [], [
            'amount'=> trans('site.name'),
            'pay_no'  => trans('site.email'),
            'pay_date' => trans('site.password'),
            'note' => trans('site.address'),
            'admin_id' => trans('site.address'),
            
            'beneficiary'=> trans('site.name'),
            'paymentType'  => trans('site.email'),
            'pay_date' => trans('site.password'),
            'cardHolder' => trans('site.address'),

         ]);

         cost::create($data);

         session()->flash('success', trans('admin.added'));
         return redirect('admin/cost');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function show(cost $co,$id)
    {
        //
        
        $costList = cost::find($id);
       
        return view('admin.cost.show', compact('costList'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function edit(cost $cost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cost $cost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function destroy(cost $cost)
    {
        //
    }
}
