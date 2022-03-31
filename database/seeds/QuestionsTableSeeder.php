<?php

use App\Models\Question;
use App\Models\Assessment;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assessment = Assessment::first();

        factory(Question::class, 20)->create([
        	'assessment_id' => $assessment->uuid
        ]);
    }
}
