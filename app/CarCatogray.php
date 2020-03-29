<?php

namespace App;
use App\Company;
use Illuminate\Database\Eloquent\Model;

class CarCatogray extends Model
{
    // 
    protected $fillable = [
		'name_ar',
        'name_en',
        'company_id'
		
  ];
  public function company()
	{
		return $this->HasOne('App\Company','id','company_id');
  }
  
}
