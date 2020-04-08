<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoicePayment extends Model
{

    protected $table = 'invoice_payment';
    protected $fillable = ['invoice_payment_number' , 'invoice_payment_date' , 'invoice_payment_amount' , 'invoice_id'];
    protected $primaryKey = 'invoice_payment_id';
    public $timestamps = false;

    public function invoice(){
        return $this->belongsTo('App\Invoice' , 'invoice_id');
    }


}
