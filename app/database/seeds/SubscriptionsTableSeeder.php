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

		Subscription::create([
			'teacher_id'	=> 2,
			'learner_id'	=> 4
		]);

		Subscription::create([
			'teacher_id'	=> 2,
			'learner_id'	=> 5
		]);

		Subscription::create([
			'teacher_id'	=> 2,
			'learner_id'	=> 6
		]);
	}

}