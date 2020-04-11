<?php

use Illuminate\Database\Seeder;
use App\Car;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert(array(
            array(
                'model' => '2017',
                'platNo' => 'FDL158',
                'car_structure_number'=>'95875',
                'car_color'=>'red',
                'carType_id'=>'1',
                'car_brand_category_id'=>'6',//لحد 27
                'client_id'=>'15', //لحد 24

            ),
            array(
                'model' => '2003',
                'platNo' => 'Yml548',
                'car_structure_number'=>'85214',
                'car_color'=>'brown',
                'carType_id'=>'1',
                'car_brand_category_id'=>'21',//لحد 27
                'client_id'=>'15', //لحد 24

            ),

            array(
                'model' => '2010',
                'platNo' => 'FmL175',
                'car_structure_number'=>'65485',
                'car_color'=>'black',
                'carType_id'=>'1',
                'car_brand_category_id'=>'8',
                'client_id'=>'16',  

            ),
            array(
                'model' => '2013',
                'platNo' => 'Yim458',
                'car_structure_number'=>'23895',
                'car_color'=>'yellow',
                'carType_id'=>'1',
                'car_brand_category_id'=>'10',
                'client_id'=>'16',  

            ),

            array(
                'model' => '2015',
                'platNo' => 'Hio586',
                'car_structure_number'=>'54823',
                'car_color'=>'silver',
                'carType_id'=>'1',
                'car_brand_category_id'=>'9',
                'client_id'=>'17',  

            ),
            array(
                'model' => '2002',
                'platNo' => 'PLM565',
                'car_structure_number'=>'78569',
                'car_color'=>'White',
                'carType_id'=>'1',
                'car_brand_category_id'=>'20',
                'client_id'=>'17',  

            ),
            array(
                'model' => '2001',
                'platNo' => 'OPL123',
                'car_structure_number'=>'96347',
                'car_color'=>'Red',
                'carType_id'=>'1',
                'car_brand_category_id'=>'9',
                'client_id'=>'18',  

            ),
            array(
                'model' => '2005',
                'platNo' => 'RE125',
                'car_structure_number'=>'25963',
                'car_color'=>'Silver',
                'carType_id'=>'1',
                'car_brand_category_id'=>'9',
                'client_id'=>'18',  

            ),
            array(
                'model' => '2014',
                'platNo' => 'Elk214',
                'car_structure_number'=>'65478',
                'car_color'=>'white',
                'carType_id'=>'1',
                'car_brand_category_id'=>'21',
                'client_id'=>'19',  

            ),
            array(
                'model' => '2003',
                'platNo' => 'YUI456',
                'car_structure_number'=>'32145',
                'car_color'=>'Black',
                'carType_id'=>'1',
                'car_brand_category_id'=>'18',
                'client_id'=>'20',  

            ),
            array(
                'model' => '2002',
                'platNo' => 'LKI23',
                'car_structure_number'=>'65897',
                'car_color'=>'Orange',
                'carType_id'=>'1',
                'car_brand_category_id'=>'10',
                'client_id'=>'21',  

            ),
            array(
                'model' => '2006',
                'platNo' => 'YUP158',
                'car_structure_number'=>'96874',
                'car_color'=>'White',
                'carType_id'=>'1',
                'car_brand_category_id'=>'17',
                'client_id'=>'22',  

            ),

            array(
                'model' => '2003',
                'platNo' => 'RTO25',
                'car_structure_number'=>'25478',
                'car_color'=>'Yello',
                'carType_id'=>'1',
                'car_brand_category_id'=>'16',
                'client_id'=>'23',  

            ),

    ));
    }
}
