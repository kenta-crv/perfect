<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 1; $i <= 16; $i++){
            DB::table('mt_guide')->insert([
                'guide_name' => $faker->name,
                'guide_place'  => Str::random(10)."Address",
                'guide_body' => $faker->text()
            ]);
        }
    }
}
