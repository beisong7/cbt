<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Answer;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'uuid' => (string) Str::uuid(),
        'assessment_id' => '',
        'question_id' => '',
        'answer' => strtolower($faker->randomLetter),
        'correct' => true,
    ];
});
