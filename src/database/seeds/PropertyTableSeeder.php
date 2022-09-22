<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        for($i = 0; $i <= 10; $i++){
            DB::table('properties')->insert([
                'company_id' =>  525,
                'users_id' =>  $i,
                'email' => $faker->email,
                'contact_no' =>  $faker->phoneNumber,
                'line_id' =>  'LN_00'.$i,
                'contact_no' =>  $faker->phoneNumber,
                'fax_no' =>  'FX_LN_00'.$i,
                'license_no' =>  'LS_RM'. $i,
                'hb_license_no' =>  'HB_LS_RM'. $i,
                'no_listed_properties' => $faker->numberBetween(5, 2, 1),
                'registered_members' => $faker->numberBetween(5, 2, 1),
                'comment_pr' => $faker->text,
                'price' => $faker->numberBetween(100, 500, 265, 925),
                'capacity' => $faker->numberBetween(5, 8, 4,),
                'google_location' => $faker->latitude,
                'postal_code' => '55156',
                'postal_code' => $faker->address,
            ]);
        }
    }
}
