<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\admin;
class cost extends Model
{
    //
    protected $fillable = [
		'amount',
        'pay_no',
        'pay_date',
        'bankName',
        'note',
        'admin_id',
        'beneficiary',
        'paymentType',
        'type',
        'cardHolder',
    ];

    public function admin()
	{
		return $this->HasOne('App\Admin','id','admin_id');
    }
    

}
