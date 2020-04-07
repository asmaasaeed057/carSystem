<?php

namespace App;
use App\Company;
use Illuminate\Database\Eloquent\Model;

class CarCatogray extends Model
{
    // 
    protected $table = 'car_brand_category';

    protected $fillable = [
		'name_ar',
    'name_en',
    'car_brand_id'
		
  ];
  public function brand()
	{
		return $this->belongsTo('App\Company','car_brand_id');
  }
  
}
