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
}
