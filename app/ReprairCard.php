<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReprairCard extends Model
{
    //  
    protected $fillable = [

        'status',
        'checkReprort',
        'client_id',
        'car_id' ,
        'card_taxes',
        'card_number',
        'employee_id',
        'card_discount',

		 
    ];
    public function client()
	{
       return $this->HasOne('App\Client','id','client_id');
        // return $this->belongsToMany('App\Client','id','client_id');

        
    }
    public function car()
	{
		return $this->HasOne('App\Car','id','car_id');
    }
    
    public function carCategory()
	{
		return $this->HasOne('App\CarCategory','id','car_id');
    }
    
    public function items()
    {
        return $this->hasMany('App\RepairCardItem','card_id');
    }
    public function getTotalAttribute()
    {
        $discount=$this->card_discount;
        $items=$this->items;
        $total=0;
        foreach($items as $item){
            $total+=$item->service_client_cost;
        }
        return ($total-$discount);
    }
    public function getTotalWithTaxesAttribute()
    {
        $discount=$this->card_discount;
        $items=$this->items;
        $total=0;
        foreach($items as $item){
            $total+=$item->service_client_cost;
        }
        $totalWithDiscount=$total-$discount;
        $taxes=($this->card_taxes*$totalWithDiscount)/100;
        return ($totalWithDiscount+$taxes);
    }

    
    public function getTaxesAttribute(){
        $discount=$this->card_discount;

        $items=$this->items;
        $total=0;
        foreach($items as $item){
            $total+=$item->service_client_cost;
        }
        $totalWithDiscount=$total-$discount;

        $taxes=($this->card_taxes*$totalWithDiscount)/100;
        return ($taxes);

    }
    public function getDate(){
    $date= date("d M Y", strtotime($this->created_at));
    return $date;
        
    }

    public function invoice(){
        return $this->hasOne('App\Invoice','repair_card_id');
    }
    public function getResidualAmountAttribute()
    {
    $total=$this->total_with_taxes;
    $payments=$this->invoice->invoicePayment;
    if(!$payments->isEmpty())
    {

        $totalAmount=0;
        foreach($payments as $payment)
        {
            $totalAmount+=$payment->invoice_payment_amount;
        }
        $residual=$total-$totalAmount;

    }
    else{
        $residual=$total;

    }
    return $residual;
    }

    public function employee()
    {
        return $this->belongsTo('App\TechnicalEmployee', 'employee_id');
    }
    
}
