<?php

use Illuminate\Database\Seeder;
use App\Models\EngagedQuestion;
use App\Models\EngagedAssessment;

class EngagedQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assessment = EngagedAssessment::first();

        factory(EngagedQuestion::class)->create([
        	'engaged_assessment_id' => $assessment->uuid,
        	'question' => $assessment->question,
        	'resource_id' => $assessment->resource_id,
        	'minutes_expected' => $assessment->minutes_expected,
        	'answer_input' => $assessment->answer_input,
        ]);
    }
}
