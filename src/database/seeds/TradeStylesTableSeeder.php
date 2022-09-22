<?php

use Illuminate\Database\Seeder;

class TradeStylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trade_styles')->insert([
            'rent' => false,
            'agent' => false,
            'intermediary' => false,
        ]);
    }
}
