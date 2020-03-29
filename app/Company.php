<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'car_brands';

    // 
    protected $fillable = [
		'name_ar',
		'name_en',
		
	];
}
