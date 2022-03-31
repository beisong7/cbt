<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\OrganizationMember;

$factory->define(OrganizationMember::class, function (Faker $faker) {
    return [
        'uuid' => (string) Str::uuid(),
        'organization_id' => '',
        'candidate_id' => '',
        'active' => true,
    ];
});
