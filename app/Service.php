<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'car_services';
    protected $fillable = array('service_name', 'service_number', 'service_type',
                                'service_cost', 'service_client_cost','service_working_hours');
    protected $primaryKey = 'service_id';
  
    public $timestamps = false;
    
    public function items()
    {
        return $this->hasMany('App\ReparCardItem','service_id');
    }


}
