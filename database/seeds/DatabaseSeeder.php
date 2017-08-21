<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserTableSeeder');

        $this->command->info('YEAH! You create admin!');
    }
}

class UserTableSeeder extends Seeder {

  public function run()
  {
    //DB::table('users')->delete();

    DB::table('users')->insert([
      'email' => 'admin@admin.com',
      'name' => 'Leonid',
      'role' => 'A',
      'password' => bcrypt('secret'),
    ]);
  }

}
