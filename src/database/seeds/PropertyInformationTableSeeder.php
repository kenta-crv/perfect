<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PropertyInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i= 1; $i <= 10; $i++){

            DB::table('property_information')->insert([
                'img_url' => '',
                'fee'=> 100,
                'management_fee' => 1,
                'room_rate' => 200,
                'deposit' => 1,
                'key_money' => 1,
                'address' => '',
                'station1' => '',
                'station2' => '',
                'type' => 1,
                'plan_of_house' => 100,
                'step' => 100,
                'step_amount' => 100,
                'year_build' => Carbon::now(),
                'area' => 1,
                'address' => $faker->address,
                'station1' => 'sample station',
                'station2' => 'sample station',
                'updated_information_date' => Carbon::now(),
                'listed_site' => '',
                'reward' => 100,
                'registered_company' => 'Company'. $i,
                'advertisements' => 100,
                'trade_style' => 1,
                'tel' => $faker->phoneNumber,

            ]);
        }

    }
}

