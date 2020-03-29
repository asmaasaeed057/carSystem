<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable = [
		'carCatogaries_id',
		'model',
		'client_id',
        'carType_id',
        'platNo'
  ];
  
  public function client()
	{
		return $this->HasOne('App\Client','id','client_id');
    }
    public function carType() 
	{
		return $this->HasOne('App\CarType','id','carType_id');
    }
    
    public function carCatogray()
	{
		return $this->HasOne('App\CarCatogray','id','carCatogaries_id');
  }
  


}
