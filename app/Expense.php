<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expense';
    protected $fillable = [
		'expense_name',
		'expense_bill',
		'expense_price',
        'expense_tax',
        'expense_date',
        'expense_notes'
    ];
    
  
    protected $primaryKey = 'expense_id';
  
    public $timestamps = false;

}
