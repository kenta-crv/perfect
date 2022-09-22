<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreditCardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 1; $i <= 10; $i++){
            DB::table('credit_card')->insert([
                'name' => $faker->name,
                'number' => 'LM-CODE-'.$faker->iban(),
                'expire_month' => $faker->date,
                'expire_year' => $faker->date,
                'security_code' => 'LS-FL-'.$i
            ]);
        }
    }
}
