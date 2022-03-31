<?php

use App\Models\Organization;
use App\Models\OrganizationStaff;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class OrganizationStaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organization = Organization::first();
        $users = Staff::all();

        foreach ($users as $user) {
	        factory(OrganizationStaff::class)->create([
	        	'organization_id' => $organization->uuid,
	        	'staff_id' => $user->uuid,
	        ]);
	    }
    }
}
