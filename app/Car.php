<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable = [
		'car_brand_category_id',
		'model',
		'client_id',
    'carType_id',
    'platNo',
    'car_structure_number',
    'car_color',

  ];
  
  public function client()
	{
		return $this->HasOne('App\Client','id','client_id');
    }
    public function carType() 
	{
		return $this->HasOne('App\CarType','id','carType_id');
    }
    
    public function category()
	{
    return $this->belongsTo('App\CarCatogray','car_brand_category_id','id');
  }
  


}
