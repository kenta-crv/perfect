<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SettingScrapingIdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i =0; $i < 10; $i++){
            DB::table('setting_scraping_id')->insert([
                'account_id' => $faker->numberBetween(1,5),
                'login_id' => $faker->isbn10(),
                'password' => 'password',
                'site_id' =>  $faker->numberBetween(0,5),
            ]);
        }
        //
    }
}
