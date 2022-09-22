<?php

use Illuminate\Database\Seeder;

class ArrearsTableSeeder extends Seeder
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
            DB::table('arrears')->insert([
                'payment_flag' => true,
                'account_id' => 1000 + $i,
                'arrears' => 12,
            ]);
        }
    }
}
