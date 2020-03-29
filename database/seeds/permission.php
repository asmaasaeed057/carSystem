<?php

use Illuminate\Database\Seeder;

class permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\AdminGroup::create([
            'name_en' => 'Admin',
            'name_ar' => 'المشرفين',
            'admin_add' => 'enable',
            'admin_edit' => 'enable',
            'admin_show'=> 'enable',
            'admin_delete'=> 'enable',
            'admingroup_add'=> 'enable',
            'admingroup_edit'=> 'enable',
            'admingroup_show'=> 'enable',
            'admingroup_delete'=> 'enable',
            'clients_add'=> 'enable',
            'clients_edit'=> 'enable',
            'clients_show'=> 'enable',
            'clients_delete'=> 'enable',
            'companies_add'=> 'enable',
            'companies_edit'=> 'enable',
            'companies_show'=> 'enable',
            'companies_delete'=> 'enable',
            'car_catograys_add'=> 'enable',
            'car_catograys_edit'=> 'enable',
            'car_catograys_show'=> 'enable',
            'car_catograys_delete'=> 'enable',
            'car_types_add'=> 'enable',
            'car_types_edit'=> 'enable',
            'car_types_show'=> 'enable',
            'car_types_delete'=> 'enable',
            'reprair_cards_add'=> 'enable',
            'reprair_cards_edit'=> 'enable',
            'reprair_cards_show'=> 'enable',
            'reprair_cards_delete'=> 'enable',
            'cars_add'=> 'enable',
            'cars_edit'=> 'enable',
            'cars_show'=> 'enable',
            'cars_delete'=> 'enable',
        ]);
    }
}
