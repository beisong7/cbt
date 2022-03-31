<?php

use App\Models\Assessment;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class AssessmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organization = Organization::first();

        factory(Assessment::class, 2)->create([
        	'organization_id' => $organization->uuid
        ]);
    }
}
