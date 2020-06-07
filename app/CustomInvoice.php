<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomInvoice extends Model
{

    protected $table = 'custom_invoice';
    protected $fillable = ['invoice_number' , 'invoice_date' , 'client_name','invoice_taxes','invoice_discount'];
    protected $primaryKey = 'invoice_id';
    public $timestamps = false;

	public function items(){
        return $this->hasMany('App\CustomInvoiceItem','invoice_id');
    }


    public function getTotalAttribute()
    {
        $discount=$this->invoice_discount;

        $items=$this->items;
        $total=0;
        foreach($items as $item){
            $total+=$item->client_cost;
        }
        return ($total-$discount);
    }
    public function getTotalWithTaxesAttribute()
    {
       $discount=$this->invoice_discount;

        $items=$this->items;
        $total=0;
        foreach($items as $item){
            $total+=$item->client_cost;
        }
        $totalWithDiscount=$total-$discount;
        $taxes=($this->invoice_taxes*$totalWithDiscount)/100;
        return ($totalWithDiscount+$taxes);

    }

    public function getTaxesAttribute(){
        $discount=$this->invoice_discount;

        $items=$this->items;
        $total=0;
        foreach($items as $item){
            $total+=$item->client_cost;
        }
        $totalWithDiscount=$total-$discount;

        $taxes=($this->invoice_taxes*$totalWithDiscount)/100;
        return ($taxes);

    }

}
