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
  public function company()
	{
		return $this->HasOne('App\Company','id','car_brand_id');
  }
  
}
