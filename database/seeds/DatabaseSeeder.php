<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(OrganizationsTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(OrganizationStaffTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(AssessmentsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(GroupMembersTableSeeder::class);
        $this->call(EngagedAssessmentsTableSeeder::class);
        $this->call(EngagedQuestionsTableSeeder::class);
        $this->call(EngagedAnswersTableSeeder::class);
        $this->call(OrganizationMembersTableSeeder::class);
    }
}
