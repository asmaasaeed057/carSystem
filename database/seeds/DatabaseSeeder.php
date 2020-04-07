<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        
		// $this->call(Admin::class);
    // $this->call(permission::class);


    // $this->call(ServiceTableSeeder::class);
    $this->call(CarBrandSeeder::class);
    // $this->call(CarBrandCategorySeeder::class);
    // $this->call(CarSeeder::class);


    }
}
