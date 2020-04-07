<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\CarBrand;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_brands')->insert(array(
            array(
                'name_en' => 'Sheroky',
                'name_ar' => 'شيروكي',
            ),
            array(
                'name_en' => 'Nessan',
                'name_ar' => 'نيسان',
            ),
            array(
                'name_en' => 'Toyota',
                'name_ar' => 'تويوتا',
            ),  array(
                'name_en' => 'Heondi',
                'name_ar' => 'هيونداي',
            ),  array(
                'name_en' => 'Kia',
                'name_ar' => 'كيا',
            ),
            array(
                'name_en' => 'Matrics',
                'name_ar' => 'ماتريكس',
            ),
            array(
                'name_en' => 'Lada',
                'name_ar' => 'لادا',
            ),
            array(
                'name_en' => 'Sizoki',
                'name_ar' => 'سيزوكي',
            ),
            array(
                'name_en' => 'Marsides',
                'name_ar' => 'مارسيدس',
            ),
            array(
                'name_en' => 'hummer',
                'name_ar' => 'هامر',
            ),
        ));
    }
}
