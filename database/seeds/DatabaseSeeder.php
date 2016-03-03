<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(UserProfilesTableSeeder::class);
         $this->call(TasksTableSeeder::class);
         $this->call(TaskCategoriesTableSeeder::class);
         $this->call(ProjectsTableSeeder::class);
         $this->call(ProjectCategoriesTableSeeder::class);
         $this->call(MilestonesTableSeeder::class);
         $this->call(LogtimesTableSeeder::class);
         $this->call(IndustriesTableSeeder::class);
         $this->call(DesignationsTableSeeder::class);
         $this->call(DepartmentsTableSeeder::class);
         $this->call(CompaniesTableSeeder::class);
    }
}
