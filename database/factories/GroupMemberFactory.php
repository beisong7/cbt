<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\GroupMember;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(GroupMember::class, function (Faker $faker) {
    return [
        'uuid' => (string) Str::uuid(),
        'group_id' => '',
        'candidate_id' => '',
        'active' => true,
    ];
});
