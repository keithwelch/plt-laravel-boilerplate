<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
    $faker = Faker\Factory::create();

    for ($i=0;$i<30;$i++) {
      $user = User::create(array(
        'email' => $faker->email,
        'password' => Hash::make($faker->word),
      ));
    }
	}

}
