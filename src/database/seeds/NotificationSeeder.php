<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('notification')->insert([
            'target_store' => '1',
            'date_in' => '2022-07-01',
            'time_in' => '10:00:00',
            'date_out' => '2022-07-31',
            'time_out' => '10:00:00',
            'date_content' => '2022-07-11',
            'title' => "お知らせのテスト",
            'content' => "これはお知らせのテストです。",
            'flag' => '1',
            'mail_flag' => '1',
        ]);

    }
}
