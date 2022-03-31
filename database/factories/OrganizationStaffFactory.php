<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\OrganizationStaff;

$factory->define(OrganizationStaff::class, function (Faker $faker) {
    return [
    	'uuid' => (string) Str::uuid(),
        'organization_id' => '',
        'staff_id' => '',
        'active' => true,
        'who' => 4,
    ];
});
