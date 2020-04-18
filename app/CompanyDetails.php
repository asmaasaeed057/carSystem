<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    protected $table = 'company_details';
    protected $fillable = array('company_name','company_logo', 'company_phone','company_notes','company_address');
    protected $primaryKey = 'company_id';
  
    public $timestamps = false;



    
}
