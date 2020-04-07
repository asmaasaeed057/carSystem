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
        'car_id' ,
        'card_taxes',
        'card_number',

		 
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
    public function getTotalAttribute()
    {
        $items=$this->items;
        $total=0;
        foreach($items as $item){
            $total+=$item->service_client_cost;
        }
        return ($total);
    }
    public function getTotalWithTaxesAttribute()
    {
        $items=$this->items;
        $total=0;
        foreach($items as $item){
            $total+=$item->service_client_cost;
        }
        $taxes=($this->card_taxes*$total)/100;
        return ($total+$taxes);
    }

    public function getTaxesAttribute(){
        $items=$this->items;
        $total=0;
        foreach($items as $item){
            $total+=$item->service_client_cost;
        }
        $taxes=($this->card_taxes*$total)/100;
        return ($taxes);

    }
    public function getDate(){
    $date= date("d M Y", strtotime($this->created_at));
    return $date;
        
    }

    public function invoice(){
        return $this->hasOne('App\Invoice','id');
	}

}
