<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SrapingTargetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        for($i = 0; $i <= 3; $i++) {
            DB::table('setting_scraping_target')->insert([
                'account_id' => 1,
                'site_id' => $faker->numberBetween(1,6),
            ]);
        }

    }
}
