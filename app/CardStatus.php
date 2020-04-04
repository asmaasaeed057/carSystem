<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardStatus extends Model
{
    protected $table = 'repair_cards_status';
    protected $primaryKey = 'card_status_id';

    protected $fillable = [

        'card_status',
        'card_status_date',
        'card_id',

];
public $timestamps = false;

public function card()
{
    return $this->belongsTo('App\ReprairCardItem', 'card_id', 'card_id');
}


    
}
