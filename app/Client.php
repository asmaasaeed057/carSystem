<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
		'fullName',
		'phone',
		'address',
		'email',
	];

	public function car(){
        return $this->hasMany('App\Car','id');
	}
}
