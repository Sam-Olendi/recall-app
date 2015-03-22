<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RoleUserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('role_user')->insert(array(
			['user_id' => 1, 'role_id' => 2],
			['user_id' => 2, 'role_id' => 1],
			['user_id' => 3, 'role_id' => 2]
		));
	}

}