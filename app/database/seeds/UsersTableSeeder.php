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

		User::create([
			'first_name'	=> 'Angela',
			'last_name'		=> 'Mulehi',
			'email'			=> 'angela@mulehi.com',
			'password'		=> Hash::make('iamangela1')
		]);

		User::create([
			'first_name'	=> 'Wesley',
			'last_name'		=> 'Chege',
			'email'			=> 'wesley@chege.com',
			'password'		=> Hash::make('iamwesley1')
		]);

		User::create([
			'first_name'	=> 'Raphael',
			'last_name'		=> 'Owino',
			'email'			=> 'raphael@owino.com',
			'password'		=> Hash::make('iamralph1')
		]);

		User::create([
			'first_name'	=> 'Nicole',
			'last_name'		=> 'Ojwando',
			'email'			=> 'nicole@ojwando.com',
			'password'		=> Hash::make('iamnikki1')
		]);

	}

}