<?php

class SubscriptionsTableSeeder extends Seeder {

	public function run()
	{
		Subscription::create([
			'teacher_id'	=> 2,
			'learner_id'	=> 1
		]);

		Subscription::create([
			'teacher_id'	=> 2,
			'learner_id'	=> 3
		]);
	}

}