<?php

use Illuminate\Database\Seeder;

class AdministratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();


        DB::table('administrator')->insert([
            'email' => 'test_admin@gmail.com',
            'password'=> bcrypt('admin123'),
            'role' => 1,
            'last_name' =>  'Admin',
            'first_name' =>  'Admin',
            'last_access_datetime' => Carbon::now(),
        ]);

        for ($i = 1; $i <= 15; $i++) {
            DB::table('administrator')->insert([
                'email' => Str::random(10). '@gmail.com',
                'password'=> bcrypt('admin123'),
                'role' => 1,
                'last_name' =>  $faker->lastName,
                'first_name' =>  $faker->firstName,
                'last_access_datetime' => Carbon::now(),
            ]);
        }
    }
}
