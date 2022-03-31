<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\EngagedAnswer;

$factory->define(EngagedAnswer::class, function (Faker $faker) {
    return [
        'uuid' => (string) Str::uuid(),
        'engaged_assessment_id' => '',
        'engaged_question_id' => '',
        'answer' => strtolower($faker->randomLetter),
        'correct' => true,
    ];
});
