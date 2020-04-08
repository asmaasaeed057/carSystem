<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationOrder extends Model
{

    protected $table = 'operation_orders';
    protected $fillable = ['operation_order_number' , 'operation_order_date' , 'invoice_id'];
    protected $primaryKey = 'operation_order_id';

    public function invoice(){
        return $this->belongsTo('App\Invoice');
    }
    public $timestamps = false;


}
