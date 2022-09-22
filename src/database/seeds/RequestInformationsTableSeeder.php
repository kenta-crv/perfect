<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class RequestInformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('request_informations')->insert([
            'license' => 'LIS_00' . $i,
            'tel'=> $faker->phoneNumber,
            'prefecture' => 1,
            'company_name' => $faker->company,
            'last_name' => $faker->lastname,
            'first_name' =>  $faker->firstname,
            'email' => $faker->safeEmail,
            'body' => $faker->text(),
            'status1' => true,
            'status2' => true,
            'status3' => true,
            'status4' => true,

            ]);
        }
    }
}
