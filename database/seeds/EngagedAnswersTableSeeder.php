<?php

use App\Models\EngagedAnswer;
use Illuminate\Database\Seeder;
use App\Models\EngagedQuestion;
use App\Models\EngagedAssessment;

class EngagedAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assessment = EngagedAssessment::first();
        $question = EngagedQuestion::first();

        factory(EngagedAnswer::class)->create([
        	'engaged_assessment_id' => $assessment->uuid,
        	'engaged_question_id' => $question->uuid,
        ]);
    }
}
