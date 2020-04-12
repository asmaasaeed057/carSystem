<?php

use App\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {
        DB::table('car_services')->insert(array(
            array(
              'service_name' => 'تغير زجاج',
              'service_number' => '1',
              'service_type' => '1',
              'service_cost' => '1000',
              'service_client_cost' => '300',
              'service_working_hours' => '5'
            ),
            array(
                'service_name' => 'تغير موتور',
                'service_number' => '2',
                'service_type' => '1',
                'service_cost' => '2000',
                'service_client_cost' => '600',
                'service_working_hours' => '3'
              ),
              array(
                'service_name' => 'تغير زيت',
                'service_number' => '3',
                'service_type' => '1',
                'service_cost' => '200',
                'service_client_cost' => '300',
                'service_working_hours' => '1'
              ),

              array(
                'service_name' => 'تركيب باب',
                'service_number' => '4',
                'service_type' => '2',
                'service_cost' => '2000',
                'service_client_cost' => '2500',
                'service_working_hours' => '7'
              ),
              array(
                'service_name' => 'تركيب كاوتش',
                'service_number' => '5',
                'service_type' => '2',
                'service_cost' => '200',
                'service_client_cost' => '250',
                'service_working_hours' => '1'
              ),
              array(
                'service_name' => ' سمركه',
                'service_number' => '6',
                'service_type' => '2',
                'service_cost' => '500',
                'service_client_cost' => '600',
                'service_working_hours' => '5'
              ),
              array(
                'service_name' => ' باب',
                'service_number' => '7',
                'service_type' => '3',
                'service_cost' => '1000',
                'service_client_cost' => '1200',
                'service_working_hours' => '3'
              ),
              array(
                'service_name' => ' زجاج',
                'service_number' => '8',
                'service_type' => '3',
                'service_cost' => '500',
                'service_client_cost' => '600',
                'service_working_hours' => '7'
              ),
              array(
                'service_name' => ' ماتور',
                'service_number' => '9',
                'service_type' => '4',
                'service_cost' => '3000',
                'service_client_cost' => '3500',
                'service_working_hours' => '8'
              ),
              array(
                'service_name' => ' شاكمان',
                'service_number' => '10',
                'service_type' => '4',
                'service_cost' => '3200',
                'service_client_cost' => '3500',
                'service_working_hours' => '9'
              ),






          ));
    }
}
