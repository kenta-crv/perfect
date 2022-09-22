<?php

use Illuminate\Database\Seeder;

class PropertyDistributionSiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_distribution_site')->insert([
            'account_id' => 12324,
            'rains' => false,
            'atbb' => false,
            'ielove' => false,
            'itandi' => false,
        ]);
    }
}
