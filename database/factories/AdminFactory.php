<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Admin::class, function (Faker $faker) {
    return [
    	'who' => 4,
        'uuid' => (string) Str::uuid(),
        'title' => $faker->title,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'active' => true,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'last_seen' => $faker->unixTime,
        'dob' => $faker->date('Y-m-d'),
        'theme_type' => 'light',
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
    ];
});
