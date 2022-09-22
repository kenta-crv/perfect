<?php

use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
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
            DB::table('favorites')->insert([
                'account_id' => 1000 + $i,
                'name' => $faker->name,
                'target_site' => 1,
                'img_url'=> '',
                'room_name' => '', 
                'fee' => 1,
                'management_fee' => 1,
                'deposit' => 1,
                'key_money' => 1,
                'address' => $faker->address,
                'station1' => '',
                'station2' => '',
                'type' => 1,
                'plan_of_house' => 1,
                'step' => 1,
                'step_amount' => 1,
                'year_build' => Carbon::now(),
                'area' => 1,
                'update_information_date' => Carbon::now(),
                'listed_site' => '',
                'reward' => 1,
                'registered_company' => '',
                'advertisements' => 1,
                'trade_style' => 2,
                'tel' => $faker->phoneNumber,

            ]);
        }
        
    }
}
