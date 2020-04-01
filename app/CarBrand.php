<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    protected $table = 'car_brands';

    protected $fillable = [
        'name_ar',
        'name_en',
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function carBrandCategory()
    {
        return $this->hasMany('App\CarBrandCatogray','id');
    }
}
