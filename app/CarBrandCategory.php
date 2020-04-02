<?php

namespace App;
use App\CarBrand;
use App\Car;
use Illuminate\Database\Eloquent\Model;

class CarBrandCategory extends Model
{
    protected $table = 'car_brand_category';

    protected $fillable = [
        'name_ar',
        'name_en',
        'car_brand_id'
    ];
    protected $primarykey = 'id';

    public function brand()
    {
        return $this->belongsTo('App\CarBrand', 'car_brand_id');
    }

    public function car(){
        return $this->hasMany('App\Car','id');
    }
     
}
