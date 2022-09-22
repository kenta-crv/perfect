<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanOfRentFeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plan_of_rent_fee_')->insert([
            'management_fee' => 1,
            'key_money' => false,
            'deposit' => false,
        ]);
    }
}
