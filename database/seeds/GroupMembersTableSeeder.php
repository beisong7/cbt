<?php

use App\User;
use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Database\Seeder;

class GroupMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group1 = Group::all()->first();
        $userGroup1 = User::all()->take(10);

        $group2 = Group::all()->last();
        $userGroup2 = User::all()->take(-10);

        foreach ($userGroup1 as $user) {
	        factory(GroupMember::class)->create([
	        	'group_id' => $group1->uuid,
	        	'candidate_id' => $user->uuid,
	        ]);
        }

        foreach ($userGroup2 as $user) {
	        factory(GroupMember::class)->create([
	        	'group_id' => $group2->uuid,
	        	'candidate_id' => $user->uuid,
	        ]);
        }
    }
}
