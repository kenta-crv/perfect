<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 15; $i++) {
            DB::table('contacts')->insert([
                'company_name' => $faker->company,
                'license' => 'LS_RM'.$i,
                'tel' => $faker->phoneNumber,
                'prefecture' => 12,
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstName,
                'email' => Str::random(10).'@gmail.com',
                'body' => "Sample body text",
            ]);
        }    
    }
}
