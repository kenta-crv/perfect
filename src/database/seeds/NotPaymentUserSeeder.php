<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class NotPaymentUserSeeder extends Seeder
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
            DB::table('not_payment_user')->insert([
                'account_id' => $faker->numberBetween(1,5),
                'amount' => 100,
                'start_date' =>  Carbon::now(),
                'end_date' =>  Carbon::now(),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
