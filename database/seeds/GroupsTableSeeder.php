<?php

use App\Models\Group;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$organization = Organization::first();

        factory(Group::class, 2)->create([
        	'organization_id' => $organization->uuid
        ]);
    }
}
