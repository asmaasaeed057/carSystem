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
              'service_name' => 'car repair',
              'service_number' => 'Laravel',
              'service_type' => '1',
              'service_cost' => '1000',
              'service_client_cost' => '300',
              'service_working_hours' => '5'
            ),
            array(
                'service_name' => 'sevice car',
                'service_number' => 'Laravel',
                'service_type' => '1',
                'service_cost' => '1000',
                'service_client_cost' => '300',
                'service_working_hours' => '5'
              ),
          ));
    }
}
