<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		$teacher = Role::create(['role' => 'teacher']);
		$learner = Role::create(['role' => 'learner']);
	}


}