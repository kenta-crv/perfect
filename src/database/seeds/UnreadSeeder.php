<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UnreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i <= 3; $i++) {
            DB::table('unreads')->insert([
                'user_id' => 1,
                'alerts_id' => 1,
                'read_flag' => 0,               
            ]);
        }
    }
}
