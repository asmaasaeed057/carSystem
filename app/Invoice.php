<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $table = 'invoices';
    protected $fillable = ['invoice_number' , 'invoice_date' , 'invoice_total' , 'repair_card_id'];
    protected $primaryKey = 'invoice_id';

    public function repairCard(){
        return $this->belongsTo('App\RepairCard' , 'repair_card_id');
    }

	public function invoicePayment(){
        return $this->hasMany('App\InvoicePayment','invoice_id');
    }
    public function operationOrder(){
        return $this->hasMany('App\OperationOrder','invoice_id');
	}
}
