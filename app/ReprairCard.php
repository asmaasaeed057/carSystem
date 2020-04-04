<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReprairCard extends Model
{
    //  
    protected $fillable = [

        'status',
        'checkReprort',
        'client_id',
        'car_id' 

		 
    ];
    public function client()
	{
       return $this->HasOne('App\Client','id','client_id');
        // return $this->belongsToMany('App\Client','id','client_id');

        
    }
    public function car()
	{
		return $this->HasOne('App\Car','id','car_id');
    }
    
    public function carCatogray()
	{
		return $this->HasOne('App\CarCatogray','id','car_id');
    }
    
    public function company()
	{
		return $this->HasOne('App\Company','id','car_id');
	}
    public function items()
    {
        return $this->hasMany('App\RepairCardItem','card_id');
    }

}
