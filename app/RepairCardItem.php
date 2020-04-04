<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairCardItem extends Model
{
    protected $table = 'repair_cards_items';
    protected $primaryKey = 'card_item_id';

    protected $fillable = [

        'card_id',
        'service_id',
        'service_client_cost',
        'service_cost',

];
public $timestamps = false;

public function card()
{
    return $this->belongsTo('App\ReprairCardItem', 'card_id', 'id');
}
public function service()
{
    return $this->belongsTo('App\Service', 'service_id', 'service_id');
}
public function status()
{
    return $this->hasMany('App\CardStatus','card_id');
}


    
}
