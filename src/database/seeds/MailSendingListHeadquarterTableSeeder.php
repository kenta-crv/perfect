<?php

use Illuminate\Database\Seeder;

class MailSendingListHeadquarterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 15; $i++) {
            DB::table('mail_sending_list_headquarter')->insert([
                'group_id' => '333',
                'email' => Str::random(10). '@gmail.com',
                'name' =>  $faker->name,
                'created_at' => Carbon::now(),
            ]);
        }



    }
}
