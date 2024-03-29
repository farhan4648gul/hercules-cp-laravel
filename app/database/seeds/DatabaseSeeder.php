<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();
		
		//$this->call('UserTableSeeder');

		//$this->command->info('User table seeded!');
	}

}

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create(array(
			'id'	   => 1,
			'username' => 'admin',
			'password' => Hash::make('admin'),
			'email'    => 'admin@admin.com',
			'name' 	   => 'Admin',
			'created_at' => new DateTime,
			'updated_at' => new DateTime
		));
	}

}