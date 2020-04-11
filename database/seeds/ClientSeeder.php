<?php

use Illuminate\Database\Seeder;
use App\Client;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
       public function run()
    {
        DB::table('clients')->insert(array(
            array(
                'fullName' => 'Menna',
                'phone' => '01003004369',
                'address'=>'wengt',
                'email'=>'menna@gmail.com',
                'client_type'=>'contract',
            ),
            array(
                'fullName' => 'Asmaa',
                'phone' => '010025656565',
                'address'=>'mahrmbieh',
                'email'=>'asmaa@gmail.com',
                'client_type'=>'contract',
            ),
            array(
                'fullName' => 'Mariam',
                'phone' => '01005700314',
                'address'=>'sidibasher',
                'email'=>'mariam@gmail.com',
                'client_type'=>'contract',
            ),
            array(
                'fullName' => 'Ahmed',
                'phone' => '01656568568',
                'address'=>'mostafakamel',
                'email'=>'ahmed@gmail.com',
                'client_type'=>'contract',
            ),
            array(
                'fullName' => 'samah Kobiah',
                'phone' => '01656568568',
                'address'=>'mostafakamel',
                'email'=>'samah@gmail.com',
                'client_type'=>'contract',
            ),
            array(
                'fullName' => 'amira',
                'phone' => '01658544496',
                'address'=>'mahrmbieh',
                'email'=>'amira@gmail.com',
                'client_type'=>'noneContract',
            ),
            array(
                'fullName' => 'islam',
                'phone' => '01236858444',
                'address'=>'agami',
                'email'=>'islam@gmail.com',
                'client_type'=>'noneContract',
            ),
            array(
                'fullName' => 'sherouk',
                'phone' => '01656565654',
                'address'=>'smoha',
                'email'=>'sherouk@gmail.com',
                'client_type'=>'noneContract',
            ),
            array(
                'fullName' => 'sara',
                'phone' => '0126868644',
                'address'=>'smoha',
                'email'=>'sara@gmail.com',
                'client_type'=>'noneContract',
            ),
            array(
                'fullName' => 'youstina',
                'phone' => '01656565654',
                'address'=>'victoria',
                'email'=>'youstina@gmail.com',
                'client_type'=>'noneContract',
            ),







        ));
    }
    
}
