<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Group;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'uuid' => (string) Str::uuid(),
        'organization_id' => '',
        'name' => $faker->company,
        'active' => true,
    ];
});
