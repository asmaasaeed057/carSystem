<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $table = 'invoices';
    protected $fillable = ['invoice_number' , 'invoice_date' , 'invoice_total' , 'repair_card_id'];
    protected $primaryKey = 'invoice_id';
    public $timestamps = false;

    public function repairCard(){
        return $this->belongsTo('App\ReprairCard', 'repair_card_id');
    }

	public function invoicePayment(){
        return $this->hasMany('App\InvoicePayment','invoice_id');
    }
    public function operationOrder(){
        return $this->hasOne('App\OperationOrder','invoice_id');
    }

    public function getPaidAttribute()
    {

        $payment = $this->invoicePayment;
        $totalPayment = $payment->sum('invoice_payment_amount');

        return $totalPayment;
    }


    public function getRemainAttribute()
    {
        // $discount=$this->card_discount;
        // $items=$this->items;
        // $total=0;
        // foreach($items as $item){
        //     $total+=$item->service_client_cost;
        // }
        // $totalWithDiscount=$total-$discount;
        // $taxes=($this->card_taxes*$totalWithDiscount)/100;
        // return ($totalWithDiscount+$taxes);


        $totalWithTaxes = $this->repairCard->total_with_taxes;

        $remain = $totalWithTaxes - $this->paid ;
        return $remain;
    }
    
}
