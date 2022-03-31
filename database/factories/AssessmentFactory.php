<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Assessment;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Assessment::class, function (Faker $faker) {
    return [
        'uuid' => (string) Str::uuid(),
        'organization_id' => '',
        'title' => $faker->sentence(3),
        'instructions' => $faker->sentence(10),
        'introduction' => $faker->sentence(10),
        'mode' => 'timed',
        'duration' => $duration = 2,
        'active_from' => $activeFrom = $faker->unixTime('now'),
        'expire_at' => $activeFrom + ($duration * 60 * 60),
        'type' => 'public',
        'answer_number_mode' => 'numeric',
        'published' => true,
        'active' => true,
        'global_name' => 'Test',
        'attempts_allowed' => 1,
        'pass_percent' => 70,
        'show_score' => true,
    ];
});
