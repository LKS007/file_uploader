<?php

use Illuminate\Database\Seeder;


class UserFakerSeeder extends Seeder {

  public function run()
  {

    $faker = Faker\Factory::create();

    $limit = 100;

    for ($i = 0; $i < $limit; $i++) {

      DB::table('users')->insert([
        'email' => $faker->unique()->email,
        'name' => $faker->name,
        'role' => 'A',
        'password' => bcrypt($faker->password),
      ]);
    }
  }

}
