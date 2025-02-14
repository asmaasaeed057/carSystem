<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  protected $table = 'cars';

  protected $fillable = [
    'model',
    'platNo',
    'car_structure_number',
    'car_color',
    'client_id',
    'carType_id',
    'car_brand_category_id',

  ];

  public function client()
{
		return $this->belongsTo('App\Client','client_id');
}    

  public function carType()
  {
    return $this->belongsTo('App\CarType', 'carType_id');
  }

  public function carCategory()
  {
    return $this->belongsTo('App\CarBrandCategory', 'car_brand_category_id');
  }
}
