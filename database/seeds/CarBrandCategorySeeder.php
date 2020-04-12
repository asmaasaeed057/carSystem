<?php

use Illuminate\Database\Seeder;
use App\CarBrandCategory;
use Illuminate\Support\Facades\DB;

class CarBrandCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_brand_category')->insert(array(
            array(
                'name_en' => '370Z',
                'name_ar' => '370Z',
                'car_brand_id'=>'16',
            ),
            array(
                'name_en' => 'Altima',
                'name_ar' => 'Altima',
                'car_brand_id'=>'16',
            ),
            array(
                'name_en' => 'Armada',
                'name_ar' => 'Armada',
                'car_brand_id'=>'16',
            ),
            array(
                'name_en' => 'Frontier',
                'name_ar' => 'Frontier',
                'car_brand_id'=>'16',
            ),
            array(
                'name_en' => 'Kicks',
                'name_ar' => 'Kicks',
                'car_brand_id'=>'16',
            ),
            array(
                'name_en' => 'LEAF',
                'name_ar' => 'LEAFs',
                'car_brand_id'=>'16',
            ),
            array(
                'name_en' => 'Latitude',
                'name_ar' => 'Latitude',
                'car_brand_id'=>'15',
            ),
            array(
                'name_en' => 'Latitude Plus',
                'name_ar' => 'Latitude Plus',              
                'car_brand_id'=>'15',
            ),
            array(
                'name_en' => 'Altitude',
                'name_ar' => 'Altitude',
                'car_brand_id'=>'15',
            ),
            array(
                'name_en' => 'Upland',
                'name_ar' => 'Upland',
                'car_brand_id'=>'15',
            ),
            array(
                'name_en' => 'Limited',
                'name_ar' => 'Limited',
                'car_brand_id'=>'15',
            ),
            array(
                'name_en' => '4Runner',
                'name_ar' => '4Runner',
                'car_brand_id'=>'17',
            ),
            array(
                'name_en' => 'Avalon',
                'name_ar' => 'Avalon',
                'car_brand_id'=>'17',
            ),
            array(
                'name_en' => 'Camry',
                'name_ar' => 'Camry',
                'car_brand_id'=>'17',
            ),
            array(
                'name_en' => 'Corolla',
                'name_ar' => 'Corolla',
                'car_brand_id'=>'17',
            ),
            array(
                'name_en' => 'Highlander',
                'name_ar' => 'Highlander',
                'car_brand_id'=>'17',
            ),

            array(
                'name_en' => 'Accent',
                'name_ar' => 'Accent',
                'car_brand_id'=>'18',
            ),
            array(
                'name_en' => 'Elantra',
                'name_ar' => 'Elantra',
                'car_brand_id'=>'18',
            ),
            array(
                'name_en' => 'Ioniq',
                'name_ar' => 'Ioniq',
                'car_brand_id'=>'18',
            ),
            array(
                'name_en' => 'Cadenza',
                'name_ar' => 'Cadenza',
                'car_brand_id'=>'19',
            ),
            array(
                'name_en' => 'Forte',
                'name_ar' => 'Forte',
                'car_brand_id'=>'19',
            ),
            array(
                'name_en' => 'K900',
                'name_ar' => 'K900',
                'car_brand_id'=>'19',
            ),
        ));
    }

}
