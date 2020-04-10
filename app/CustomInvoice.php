<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomInvoice extends Model
{

    protected $table = 'custom_invoice';
    protected $fillable = ['invoice_number' , 'invoice_date' , 'client_name','invoice_taxes'];
    protected $primaryKey = 'invoice_id';
    public $timestamps = false;

	public function items(){
        return $this->hasMany('App\CustomInvoiceItem','invoice_id');
    }

    public function getTotalAttribute()
    {
        $items=$this->items;
        $total=0;
        foreach($items as $item){
            $total+=$item->client_cost;
        }
        return ($total);
    }
    public function getTotalWithTaxesAttribute()
    {
        $items=$this->items;
        $total=0;
        foreach($items as $item){
            $total+=$item->client_cost;
        }
        $taxes=($this->invoice_taxes*$total)/100;
        return ($total+$taxes);
    }

    public function getTaxesAttribute(){
        $items=$this->items;
        $total=0;
        foreach($items as $item){
            $total+=$item->client_cost;
        }
        $taxes=($this->invoice_taxes*$total)/100;
        return ($taxes);

    }

}
