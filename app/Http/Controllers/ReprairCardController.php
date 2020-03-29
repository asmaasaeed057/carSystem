<?php

namespace App\Http\Controllers;
use App\Client;
use App\ReprairCard;
use App\CarCatogray;
use App\Account;
use App\Car;
use Illuminate\Http\Request;
use App\Box;
use App\ReceiptVoucher;

class ReprairCardController extends Controller
{
/*     public function __construct()
    {
        $this->middleware('permission:reprair_cards_show', ['only' => 'index','show']);
        $this->middleware('permission:reprair_cards_edit', ['only' => 'edit','update']);
        $this->middleware('permission:reprair_cards_add', ['only' => 'store' ,'create']);
        $this->middleware('permission:reprair_cards_delete', ['only' => 'multi_delete','distroy']);
    } */
    public function money(){
        // dd(request()->all());
        $tex_totle = request()->tex_totle;
        $title = request()->total;
        $total = request()->tex_totle - request()->total;
        $box = box::where('reprairCard_id' ,request()->reprairCard_id )->first();
        if($box == null) {
            $createBox = new box();
            $createBox->IsDebit = $total;
            $createBox->total = request()->tex_totle;
            $createBox->tex = request()->tax;
            $createBox->reprairCard_id = request()->reprairCard_id;
            $createBox->Admin_id = auth('admin')->user()->id;
            $createBox->save();
        }

        $countBox = ReceiptVoucher::where('reprairCard_id' ,request()->reprairCard_id)->get()->sum('amount');
        $box = box::where('reprairCard_id' ,request()->reprairCard_id)->get()->sum('total');
        $isDebit = $box - $countBox;
        dd($isDebit);
        if ($isDebit > 0 ) {
            if (request()->type === "cash") {
                $account = new ReceiptVoucher();
                $account->reprairCard_id = request()->reprairCard_id;
                $account->paymentType = request()->type;
                // $account->IsDebit = $total;
                // $account->total = request()->tex_totle;
                $account->amount = request()->total;
                $account->Admin_id = auth('admin')->user()->id;
                // paymentType
                $account->save();
            } else {

                $account = new ReceiptVoucher();
                $account->reprairCard_id = request()->reprairCard_id;
                // $account->tex = request()->tax;
                $account->pay_no = request()->pay_no;
                $account->pay_date = request()->pay_date;
                $account->bankName = request()->bankName;
                $account->paymentType = request()->type;
                // $account->IsDebit = $total;
                $account->amount = request()->total;
                // $account->PaidUp = request()->total;
                // $account->total = request()->tex_totle;
                $account->Admin_id = auth('admin')->user()->id;
                $account->save();
            }

            $countBox1 = ReceiptVoucher::where('reprairCard_id' ,request()->reprairCard_id)->get()->sum('amount');
            $box1 = box::where('reprairCard_id' ,request()->reprairCard_id)->get()->sum('total');
            $isDebit2 = $box1 - $countBox1;
            $updatebox = box::where('reprairCard_id' ,request()->reprairCard_id)->update([
                'IsDebit' => $isDebit2,
                'status' => 'isDebit'
            ]);
        } else {
            session()->flash('error', trans('site.paid'));
            return redirect('admin/box');
        }

        $countBox3 = ReceiptVoucher::where('reprairCard_id' ,request()->reprairCard_id)->get()->sum('amount');
        $box3 = box::where('reprairCard_id' ,request()->reprairCard_id)->get()->sum('total');
        $isDebit3 = $box3 - $countBox3;

        if($isDebit3 === 0) {
            box::where('reprairCard_id' ,request()->reprairCard_id)->update([
                'status' => 'finshed'
            ]);
        }

        session()->flash('success', trans('admin.added'));
        return redirect('admin/box');
    }
    public function approved($id){
        $Card = ReprairCard::find($id);
        $client = Client::find($Card->client_id);
        $car = Car::find($Card->car_id);
        $account = Account::where("reprairCard_id",$id)->get();

        $subTotal = Account::where("reprairCard_id",$id)->get()->sum('subTotal');
        $tax = Account::where("reprairCard_id",$id)->get()->sum('tax');
        // dd($subTotal);
        return view('admin.repairCard.approved' , \compact('Card','car','client' ,'account' ,'subTotal' ,'tax'));

    }
    public function accept(Request $request){
        // dd(request()->All());

        $rules = [
            'client_id'=> 'required|numeric',
            'car_id' => 'required|numeric',
            'reprairCard_id' => 'required|numeric',
            'ItemName'=> '',
            'qty' => '',
            'price' => '',
            'subTotal'=> '',
            'tax' => '',
            'total' => '',
            // 'paidAmount' => 'required',
            // 'isDebet' => 'required',
         ];
         $data = $this->validate(request(), $rules, [], [
            'client_id'     => trans('site.clientName'),
            'car_id'  => trans('site.car'),
            'reprairCard_id' => trans('site.RepairCard'),
            'ItemName'     => trans('site.ItemName'),
            'qty'  => trans('site.qty'),
            'price' => trans('site.price'),
            'tax'     => trans('site.tax'),
            'total'  => trans('site.total'),
            // 'paidAmount' => trans('site.paidAmount'),
            // 'isDebet' => trans('site.isDebet'),

         ]);
        //  dd();
         for($i = 0 ; $i < count(request()->ItemName) ;$i++ ) {
            if (request()->ItemName[$i] != null || request()->qty[$i] != null || request()->price[$i] !=  null || request()->subTotal[$i] != null  || request()->total[$i] != null  || request()->tax[$i] != null )
            {
                $account = new Account();
                $account->client_id = request()->client_id;
                $account->car_id = request()->car_id;
                $account->reprairCard_id = request()->reprairCard_id;
                $account->admin_id = auth('admin')->user()->id;
                $account->status = "accepted";
                $account->qty = request()->qty[$i];
                $account->subTotal = request()->subTotal[$i];
                $account->ItemName = request()->ItemName[$i];
                $account->price = request()->price[$i];
                $account->tax = request()->tex_totle;
                $account->total = request()->total[$i];
                $account->save();
            }
         }
        //  return "done";
        //  $data['admin_id'] = auth('admin')->user()->id;

        //  $data['status'] = "accepted";
        //  Account::create($data);
            ReprairCard::where('id',\request()->reprairCard_id)->update(['status'=>"accepted"] );
         session()->flash('success', trans('admin.added'));
         return back();


    }
    public function newitem()
    {
        $repairCards = ReprairCard::get();

        return view('admin.repairCard.item',compact('repairCards'));
    }
    public function index()
    {
        //
        $repairCards = ReprairCard::where('status' ,'=','panding')->get();
        
        return view('admin.repairCard.index',compact('repairCards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients = Client::get();
        $cars = Car::get();
        return view('admin.repairCard.create',compact('clients','cars'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $request->validate([
            'checkReprort'=> 'required ',
            'client_id' => 'required',
            'car_id' => 'required',
        ]);

        ReprairCard::create($request->all());

        session()->flash('success', trans('admin.added'));
        return redirect('admin/reprairCard');
    }






    /**
     * Display the specified resource.
     *
     * @param  \App\ReprairCard  $reprairCard
     * @return \Illuminate\Http\Response
     */
    public function show(ReprairCard $reprairC,$id)
    {
        //
        $repairCard = ReprairCard::find($id);

        return view('admin.repairCard.show',compact('repairCard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReprairCard  $reprairCard
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repairCard = ReprairCard::find($id);
        $cars = Car::all();
        $clients = Client::all();


        return view('admin.repairCard.edit', compact('repairCard','clients','cars'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReprairCard  $reprairCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReprairCard $reprairCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReprairCard  $reprairCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReprairCard $reprairCard)
    {
        $admin = AdminGroup::find($id);

        $admin->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }
    public function get_car(ReprairCard $reprairCard ,Request $request)
    {
        // dd($request->all());
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = Car::join("car_catograys" , 'car_catograys.id', '=' , 'cars.carCatogaries_id')->select("cars.id","car_catograys.name_ar")->where("client_id" , $value)->get();
        $output = '<option value="">'.trans("site.options").'</option>';
        foreach($data as $row)
        {
        $output .= '<option value="'.$row->id.'">'.$row->name_ar.'</option>';
        }

        echo $output;
    }
}
