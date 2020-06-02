<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardTaxes extends Model
{
    protected $table = 'repair_cards_taxes';
    protected $primaryKey = 'taxes_id';

    protected $fillable = [

        'taxes_value',

];
public $timestamps = false;



    
}
