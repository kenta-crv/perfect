<?php

use Illuminate\Database\Seeder;

class PlanOfHouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 15; $i++) {
            DB::table('plan_of_house')->insert([
                'one_room' => false,
                '1k' => false,
                '2k' => false,
                '3k' => false,
                '4k' => false,
                '1dk' => false,
                '2dk' => false,
                '3dk' => false,
                '4dk' => false,
                '1ldk' => false,
                '2ldk' => false,
                '3ldk' => false,
                '4ldk' => false,
            ]);
        }
    }
}
