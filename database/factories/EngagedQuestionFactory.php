<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\EngagedQuestion;

$factory->define(EngagedQuestion::class, function (Faker $faker) {
    return [
        'uuid' => (string) Str::uuid(),
        'engaged_assessment_id' => '',
        'seen' => true,
        'seen_time' => $seenTime = $faker->unixTime('now'),
        'answered' => true,
        'answered_time' => $seenTime + 40, // Add 40 seconds to the seen time
    ];
});
