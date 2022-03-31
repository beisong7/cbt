<?php

use App\User;
use App\Models\Assessment;
use Illuminate\Database\Seeder;
use App\Models\EngagedAssessment;
use App\Models\Organization;

class EngagedAssessmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assessment = Assessment::first();
        $organization = Organization::first();
        $user = User::first();

        factory(EngagedAssessment::class)->create([
        	'assessment_id' => $assessment->uuid,
        	'organization_id' => $organization->uuid,
        	'candidate_id' => $user->uuid,
        	'to_expire_at' => $assessment->expire_at,
        	'start_time' => $assessment->active_from,
        ]);
    }
}
