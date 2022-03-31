<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\EngagedAssessment;

$factory->define(EngagedAssessment::class, function (Faker $faker) {
    return [
        'uuid' => (string) Str::uuid(),
        'assessment_id' => '',
        'candidate_id' => '',
        'to_expire_at' => '',
        'start_time' => '',
        'completed' => false,
        'active' => true,

    ];
});
