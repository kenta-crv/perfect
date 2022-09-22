<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'base_id' => '12345678',
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('admin123'),
            'license' => Str::random(10).'12345',
            'company_name' => Str::random(10)."Company",
            'address' => Str::random(10)."Address",
            'tel' => "123213",
            'last_name' => "lastName",
            'first_name' => "firstName",
            'plans' => 2,
            'payment_method' => 2,
            'status' => 2,
            'last_access_datetime' => Carbon::now(),
    ];
});
