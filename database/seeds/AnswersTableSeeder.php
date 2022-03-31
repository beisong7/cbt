<?php

use App\Models\Answer;
use App\Models\Question;
use App\Models\Assessment;
use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assessment = Assessment::first();
        $questions = Question::where('assessment_id', $assessment->uuid)->get();

        foreach ($questions as $question) {
	        factory(Answer::class, 1)->create([
	        	'assessment_id' => $assessment->uuid,
	        	'question_id' => $question->uuid,
	        ]);
        }
    }
}
