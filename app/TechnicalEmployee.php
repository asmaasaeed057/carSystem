<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnicalEmployee extends Model
{
    protected $table = 'technical_employee';
    protected $fillable = array('employee_name', 'employee_phone');
    protected $primaryKey = 'employee_id';
  
    public $timestamps = false;
    public function cards()
    {
        return $this->hasMany('App\ReprairCard','employee_id');
    }



    
}
