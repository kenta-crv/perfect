<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('accounts')->insert([
            'group_id' => '333',
            'store_id' => '1',
            'user_id' => '1',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin123'),
            'license' => 'Test 12345',
            'company_name' => "Test Company",
            'address' => "Test Address",
            'tel' => '1234',
            'last_name' => 'Admin',
            'first_name' => 'Admin',
            'plans' => 2,
            'payment_method' => 2,
            'status' => 1,
            'last_access_datetime' => Carbon::now(),
            'contract_number' => '1234567',
            'contract_id' => '1',
            'contract_card_id' => '1',
        ]);

        // for ($i = 0; $i <= 4; $i++) {
        //     DB::table('accounts')->insert([
        //         'group_id' => '12345678',
        //         'store_id' => '1',
        //         'user_id' => '1',
        //         'email' => $faker->email,
        //         'password' => bcrypt('admin123'),
        //         'license' => Str::random(10).'-12345',
        //         'company_name' => $faker->name." Company",
        //         'address' => Str::random(10)."Address",
        //         'tel' => $faker->phoneNumber,
        //         'last_name' => $faker->lastName,
        //         'first_name' => $faker->firstName,
        //         'plans' => 0,
        //         'payment_method' => 2,
        //         'status' => 2,
        //         'last_access_datetime' => Carbon::now(),
        //         'contract_number' => '1234567',
        //         'contract_id' => '1',
        //         'contract_card_id' => '1',
        //         'created_at' => Carbon::now(),
        //         // 'base_id' => '12345678',
        //         // 'email' => Str::random(10).'@gmail.com',
        //         // 'password' => bcrypt('admin123'),
        //         // 'license' => Str::random(10).'12345',
        //         // 'company_name' => Str::random(10)."Company",
        //         // 'address' => Str::random(10)."Address",
        //         // 'tel' => $faker->phoneNumber,
        //         // 'last_name' => $faker->lastName,
        //         // 'first_name' => $faker->firstName,
        //         // 'plans' => 2,
        //         // 'payment_method' => 2,
        //         // 'status' => 2,
        //         // 'last_access_datetime' => Carbon::now(),
        //     ]);
        // }

        for ($i = 0; $i <= 10; $i++) {
            DB::table('accounts')->insert([
                'group_id' => '333',
                'store_id' => '1',
                'user_id' => '1',
                'email' => $faker->email,
                'password' => bcrypt('admin123'),
                'license' => Str::random(10).'-12345',
                'company_name' => $faker->name." Company",
                'address' => Str::random(10)."Address",
                'tel' => $faker->phoneNumber,
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstName,
                'plans' => 1,
                'payment_method' => 2,
                'status' => 0,
                'last_access_datetime' => Carbon::now(),
                'contract_number' => '1234567',
                'contract_id' => '1',
                'contract_card_id' => '1',
                'created_at' => Carbon::now(),
                // 'base_id' => '12345678',
                // 'email' => Str::random(10).'@gmail.com',
                // 'password' => bcrypt('admin123'),
                // 'license' => Str::random(10).'12345',
                // 'company_name' => Str::random(10)."Company",
                // 'address' => Str::random(10)."Address",
                // 'tel' => $faker->phoneNumber,
                // 'last_name' => $faker->lastName,
                // 'first_name' => $faker->firstName,
                // 'plans' => 2,
                // 'payment_method' => 2,
                // 'status' => 2,
                // 'last_access_datetime' => Carbon::now(),
            ]);
        }

        for ($i = 0; $i <= 7; $i++) {
            DB::table('accounts')->insert([
                'group_id' => '12345678',
                'store_id' => '1',
                'user_id' => '1',
                'email' => $faker->email,
                'password' => bcrypt('admin123'),
                'license' => Str::random(10).'-12345',
                'company_name' => $faker->name." Company",
                'address' => Str::random(10)."Address",
                'tel' => $faker->phoneNumber,
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstName,
                'plans' => 2,
                'payment_method' => 2,
                'status' => 1,
                'last_access_datetime' => Carbon::now(),
                'contract_number' => '1234567',
                'contract_id' => '1',
                'contract_card_id' => '1',
                'created_at' => Carbon::now(),
                // 'base_id' => '12345678',
                // 'email' => Str::random(10).'@gmail.com',
                // 'password' => bcrypt('admin123'),
                // 'license' => Str::random(10).'12345',
                // 'company_name' => Str::random(10)."Company",
                // 'address' => Str::random(10)."Address",
                // 'tel' => $faker->phoneNumber,
                // 'last_name' => $faker->lastName,
                // 'first_name' => $faker->firstName,
                // 'plans' => 2,
                // 'payment_method' => 2,
                // 'status' => 2,
                // 'last_access_datetime' => Carbon::now(),
            ]);
        }

        // for ($i = 0; $i <= 4; $i++) {
        //     DB::table('accounts')->insert([
        //         'group_id' => '12345678',
        //         'store_id' => '1',
        //         'user_id' => '1',
        //         'email' => $faker->email,
        //         'password' => bcrypt('admin123'),
        //         'license' => Str::random(10).'-12345',
        //         'company_name' => $faker->name." Company",
        //         'address' => Str::random(10)."Address",
        //         'tel' => $faker->phoneNumber,
        //         'last_name' => $faker->lastName,
        //         'first_name' => $faker->firstName,
        //         'plans' => 3,
        //         'payment_method' => 2,
        //         'status' => 2,
        //         'last_access_datetime' => Carbon::now(),
        //         'contract_number' => '1234567',
        //         'contract_id' => '1',
        //         'contract_card_id' => '1',
        //         'created_at' => Carbon::now(),
        //         // 'base_id' => '12345678',
        //         // 'email' => Str::random(10).'@gmail.com',
        //         // 'password' => bcrypt('admin123'),
        //         // 'license' => Str::random(10).'12345',
        //         // 'company_name' => Str::random(10)."Company",
        //         // 'address' => Str::random(10)."Address",
        //         // 'tel' => $faker->phoneNumber,
        //         // 'last_name' => $faker->lastName,
        //         // 'first_name' => $faker->firstName,
        //         // 'plans' => 2,
        //         // 'payment_method' => 2,
        //         // 'status' => 2,
        //         // 'last_access_datetime' => Carbon::now(),
        //     ]);
        // }

    }
}
