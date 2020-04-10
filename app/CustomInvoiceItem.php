<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomInvoiceItem extends Model
{

    protected $table = 'custom_invoice_items';
    protected $fillable = ['invoice_id' , 'service_id' , 'client_cost','price_cost'];
    protected $primaryKey = 'item_id';
    public $timestamps = false;

	public function invoice(){
        return $this->belongsTo('App\CustomInvoice','invoice_id');
    }
    public function service()
    {
    return $this->belongsTo('App\Service', 'service_id', 'service_id');
    }

}
