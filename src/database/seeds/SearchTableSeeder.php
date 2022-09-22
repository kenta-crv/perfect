<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class SearchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i <= 10; $i++) {
                DB::table('search')->insert([
                'account_id' => '12345678',
                'railway_name' => 12,
                'station' => '13',
                'city' => $faker->numberBetween(1, 2, 3, 4, 5),
                'town' => 23,
                'name' => 2,
                'fee_min' => $faker->numberBetween(500, 200, 100),
                'fee_max' => $faker->numberBetween(500, 200, 100),
                'plan_of_rent_fee_id' => 1323,
                'plan_of_house' => $faker->numberBetween(3, 2, 1),
                'area_min' => $faker->numberBetween(5, 2, 1),
                'area_max' => $faker->numberBetween(5, 2, 1),
                'building_structure' => 2,
                'step_min' => 2,
                'step_max' => 2,
                'step_flag' => 2,
                'keyword' => 2,
                'publishing_date' => $faker->date,
                'trade_style_id' => 132321,
                'image_flag' => true,
                'drawing_flag' => true,
            ]);
        }
    }
}
