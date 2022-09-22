<?php

use Illuminate\Database\Seeder;

class BuildingStructuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 15; $i++) {
            DB::table('building_structures')->insert([
                'wooden' => false,
                'block' => false,
                'steel' => false,
                'rc' => false,
                'src' => false,
                'pc' => false,
                'hpc' => false,
                'lightweight_steel' => false,
                'alc' => false,
                'others' => false,

            ]);
        }
    }
}
