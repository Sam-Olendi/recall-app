<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('BooksTableSeeder');
		$this->call('SubjectsTableSeeder');
		$this->call('ExercisesTableSeeder');
		$this->call('QuestionsTableSeeder');
		$this->call('AnswersTableSeeder');
		$this->call('ScoresTableSeeder');
		// $this->call('PerformancesTableSeeder');

	}

}
