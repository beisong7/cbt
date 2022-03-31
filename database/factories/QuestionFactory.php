<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'uuid' => (string) Str::uuid(),
        'assessment_id' => '',
        'question' => $faker->sentence(9),
        'minutes_expected' => 2,
        'answer_input' => 'checkbox',
    ];
});
