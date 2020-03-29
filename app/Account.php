<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $fillable = [
		'ItemName',
        'qty',
        'price',
        'subTotal',
        'tax',
        'total',
        'car_id',
        'client_id',
        'admin_id',
        'paidAmount',
        'isDebet',
        'status',
		'reprairCard_id'
    ];
    
    public function car()
	{
		return $this->HasOne('App\Car','id','car_id');
    }
        
    public function client()
	{
		return $this->HasOne('App\Client','id','client_id');
    }
    public function admin()
	{
		return $this->HasOne('App\Admin','id','admin_id');
    }
    public function reprairCard()
	{
		return $this->HasOne('App\ReprairCard','id','reprairCard_id');
    }
}
