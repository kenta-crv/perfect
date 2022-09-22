<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class BillingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 7; $i++) {
            DB::table('billing_user')->insert([
                'account_id' => $faker->numberBetween(1,5),
                'plan_id'=> $faker->numberBetween(0,3),
                'billing_date' => Carbon::now(),
                'add_user_fee' =>  100,
                'add_property_fee' =>  500,
            ]);
        }

        for ($i = 1; $i <= 7; $i++) {
            DB::table('billing_user')->insert([
                'account_id' => $faker->numberBetween(1,5),
                'plan_id'=> $faker->numberBetween(0,3),
                'billing_date' => '2022-06-25',
                'add_user_fee' =>  100,
                'add_property_fee' =>  500,
            ]);
        }
    }
}
