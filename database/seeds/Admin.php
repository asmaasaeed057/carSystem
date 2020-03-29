<?php

use Illuminate\Database\Seeder;

class Admin extends Seeder {
	public function run() {
		\App\Admin::create([
				'name'     => 'admin',
				'email'    => 'test@test.com',
				'group_id'    => \App\AdminGroup::where('id',1)->first(),
				'password' => bcrypt(123456),
			]);
	}
}
