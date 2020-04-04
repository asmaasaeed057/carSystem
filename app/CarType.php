<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    //
    protected $fillable = [
		'name_ar',
		'name_en',
		
	];

	public function car(){
        return $this->hasMany('App\Car','id');
	}
}
