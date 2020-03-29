<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{
    protected $fillable = [
		'name_ar',
		'name_en',
		'admin_add',
		'admin_edit',
        'admin_show',
        'admin_delete',
        'admingroup_add',
		'admingroup_edit',
        'admingroup_show',
        'admingroup_delete',
        'clients_add',
		'clients_edit',
        'clients_show',
        'clients_delete',
        'account_add',
		'account_edit',
        'account_show',
        'account_delete',
        'reports_add',
		'reports_edit',
        'reports_show',
        'reports_delete',
        'companies_add',
		'companies_edit',
        'companies_show',
        'companies_delete',
        'car_catograys_add',
		'car_catograys_edit',
        'car_catograys_show',
        'car_catograys_delete',
        'car_types_add',
		'car_types_edit',
        'car_types_show',
        'car_types_delete',
        'reprair_cards_add',
		'reprair_cards_edit',
        'reprair_cards_show',
        'reprair_cards_delete',
        'cars_add',
		'cars_edit',
        'cars_show',
        'cars_delete',
        'box_add',
		'box_edit',
        'box_show',
        'box_delete',
	];
}
