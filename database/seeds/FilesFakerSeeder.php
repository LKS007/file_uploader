<?php

use Illuminate\Database\Seeder;

class FilesFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {

          $path = $faker->word . '.jpg';

          DB::table('files')->insert([
            'uploader_email' => $faker->email,
            'file_path' => $path,
            'filename' => $path,
            'file_size' => $faker->randomNumber()
          ]);
        }
    }
}
