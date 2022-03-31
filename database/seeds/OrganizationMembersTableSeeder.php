<?php

use App\User;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use App\Models\OrganizationMember;

class OrganizationMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$organization = Organization::first();
        $users = User::all();

        foreach ($users as $user) {
	        factory(OrganizationMember::class)->create([
	        	'organization_id' => $organization->uuid,
	        	'candidate_id' => $user->uuid,
	        ]);
	    }
    }
}
