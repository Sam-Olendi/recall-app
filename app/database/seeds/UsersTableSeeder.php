<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'first_name'	=> 'Jonathan',
			'last_name'		=> 'Doe',
			'email'			=> 'jonathan@doe.com',
			'password'		=> Hash::make('iamjon1')
		]);

		User::create([
			'first_name'	=> 'Janet',
			'last_name'		=> 'Doe',
			'email'			=> 'janet@doe.com',
			'password'		=> Hash::make('iamjanet1')
		]);

		User::create([
			'first_name'	=> 'Alison',
			'last_name'		=> 'Sudol',
			'email'			=> 'alison@sudol.com',
			'password'		=> Hash::make('iamalison1')
		]);

	}

}