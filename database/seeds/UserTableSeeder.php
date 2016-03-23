<?php
use App\User;
use Illuminate\Database\Seeder;
use App\People;
use App\ProjectCategory;
use App\TaskCategory;
use App\Department;
use App\Designation;
use App\Industry;
use App\Company;
use App\Project;
use App\Task;
use App\LogTime;
use App\Milestone;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->delete();

  
        User::create(
        	['email' => 'nicolecross1579@gmail.com',
        	  'password'=>bcrypt('admin123'),
        	  'roles'=>'admin',
        	  'active'=>1,
        	]);
        User::create(
            ['email' => 'one@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'owner',
              'active'=>1,
            ]);
        User::create(
            ['email' => 'two@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'employee',
              'active'=>1,
            ]);
        User::create(
            ['email' => 'three@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'employee',
              'active'=>1,
            ]);
        User::create(
            ['email' => 'four@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'employee',
              'active'=>1,
            ]);
        User::create(
            ['email' => 'five@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'employee',
              'active'=>1,
            ]);

        DB::table('user_profile')->delete();

        People::create(
          ['user_id' =>1,
            'fname' =>'nicole',
            'lname' =>'cross',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'sdsdsdsd',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'department' =>1,
            'designation' =>1,
            'google' =>'sdsdsdsd',
            'facebook' =>'sdsdsdsd',
            'website' =>'sdsdsdsd',
            'skype' =>'sdsdsdsd',
            'linkedin' =>'sdsdsdsd',
            'twitter' =>'sdsdsdsd',
          ]);

  
        People::create(
          ['user_id' =>2,
            'fname' =>'one',
            'lname' =>'one',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'sdsdsdsd',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'department' =>1,
            'designation' =>1,
            'google' =>'sdsdsdsd',
            'facebook' =>'sdsdsdsd',
            'website' =>'sdsdsdsd',
            'skype' =>'sdsdsdsd',
            'linkedin' =>'sdsdsdsd',
            'twitter' =>'sdsdsdsd',
          ]);

        People::create(
          ['user_id' =>3,
            'fname' =>'two',
            'lname' =>'two',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'sdsdsdsd',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'department' =>1,
            'designation' =>1,
            'google' =>'sdsdsdsd',
            'facebook' =>'sdsdsdsd',
            'website' =>'sdsdsdsd',
            'skype' =>'sdsdsdsd',
            'linkedin' =>'sdsdsdsd',
            'twitter' =>'sdsdsdsd',
          ]);

        People::create(
          ['user_id' =>4,
            'fname' =>'three',
            'lname' =>'three',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'sdsdsdsd',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'department' =>1,
            'designation' =>1,
            'google' =>'sdsdsdsd',
            'facebook' =>'sdsdsdsd',
            'website' =>'sdsdsdsd',
            'skype' =>'sdsdsdsd',
            'linkedin' =>'sdsdsdsd',
            'twitter' =>'sdsdsdsd',
          ]);

        People::create(
          ['user_id' =>5,
            'fname' =>'four',
            'lname' =>'four',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'sdsdsdsd',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'department' =>1,
            'designation' =>1,
            'google' =>'sdsdsdsd',
            'facebook' =>'sdsdsdsd',
            'website' =>'sdsdsdsd',
            'skype' =>'sdsdsdsd',
            'linkedin' =>'sdsdsdsd',
            'twitter' =>'sdsdsdsd',
          ]);

        People::create(
          ['user_id' =>6,
            'fname' =>'five',
            'lname' =>'five',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'sdsdsdsd',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'department' =>1,
            'designation' =>1,
            'google' =>'sdsdsdsd',
            'facebook' =>'sdsdsdsd',
            'website' =>'sdsdsdsd',
            'skype' =>'sdsdsdsd',
            'linkedin' =>'sdsdsdsd',
            'twitter' =>'sdsdsdsd',
          ]);

        DB::table('project_categories')->delete();

  
        ProjectCategory::create(
            ['name' => 'pc1',
            'slug' => 'pc1',
              ]);

        ProjectCategory::create(
            ['name' => 'pc2',
            'slug' => 'pc2',
              ]);

        ProjectCategory::create(
            ['name' => 'pc3',
            'slug' => 'pc3',
              ]);

        ProjectCategory::create(
            ['name' => 'pc4',
            'slug' => 'pc4',
              ]);

        ProjectCategory::create(
            ['name' => 'pc5',
            'slug' => 'pc5',
              ]);

        DB::table('task_categories')->delete();

  
        TaskCategory::create(
            ['name' => 'tc1',
            'slug' => 'tc1',
              ]);

        TaskCategory::create(
            ['name' => 'tc2',
            'slug' => 'tc2',
              ]);

        TaskCategory::create(
            ['name' => 'tc3',
            'slug' => 'tc3',
              ]);

        TaskCategory::create(
            ['name' => 'tc4',
            'slug' => 'tc4',
              ]);

        TaskCategory::create(
            ['name' => 'tc5',
            'slug' => 'tc5',
              ]);
        DB::table('departments')->delete();

  
        Department::create(
          ['name' => 'dep1',
            'slug' => 'dep1',


            ]);

        Department::create(
          ['name' => 'dep2',
            'slug' => 'dep2',


            ]);

        Department::create(
          ['name' => 'dep3',
            'slug' => 'dep3',


            ]);

        Department::create(
          ['name' => 'dep4',
            'slug' => 'dep4',


            ]);

        Department::create(
          ['name' => 'dep5',
          'slug' => 'dep5',


            ]);

        DB::table('designations')->delete();

  
        Designation::create(
          ['name' => 'desone',
          'slug' => 'desone',
            ]);

        Designation::create(
          ['name' => 'destwo',
          'slug' => 'destwo',
            ]);

        Designation::create(
          ['name' => 'des3',
          'slug' => 'des3',
            ]);

        Designation::create(
          ['name' => 'des4',
          'slug' => 'des4',
            ]);

        Designation::create(
          ['name' => 'des5',
          'slug' => 'des5',
            ]);

        DB::table('industries')->delete();

  
        Industry::create(
          ['name' => 'indone',
            'slug' => 'indone',
            ]);

        Industry::create(
          ['name' => 'indtwo',
            'slug' => 'indtwo',
            ]);

        Industry::create(
          ['name' => 'ind3',
            'slug' => 'ind3',
            ]);

        Industry::create(
          ['name' => 'ind4',
            'slug' => 'ind4',
            ]);

        Industry::create(
          ['name' => 'ind5',
            'slug' => 'ind5',
            ]);


        DB::table('companies')->delete();

  
        Company::create([  'name' => 'company1',
                        'website' => 'http://www.google.com',
                        'email' => 'company1@gmail.com',
                        'industry_id' => '1',
                        'phone' => '3353213123',
                        'fax' => '332323',
                        'adrs1' => 'gfgcfgfg',
                        'adrs2' => 'gfgfg',
                        'city' => 'gfgfgf',
                        'state' => 'fgfgfgfgfg',
                        'country' => 'IN',
                        'zipcode' => '5596898985',]);

        Company::create([  'name' => 'company2',
                        'website' => 'http://www.google.com',
                        'email' => 'company2@gmail.com',
                        'industry_id' => '2',
                        'phone' => '3353213123',
                        'fax' => '332323',
                        'adrs1' => 'gfgcfgfg',
                        'adrs2' => 'gfgfg',
                        'city' => 'gfgfgf',
                        'state' => 'fgfgfgfgfg',
                        'country' => 'IN',
                        'zipcode' => '5596898985',]);

        Company::create([  'name' => 'company3',
                        'website' => 'http://www.google.com',
                        'email' => 'company3@gmail.com',
                        'industry_id' => '3',
                        'phone' => '3353213123',
                        'fax' => '332323',
                        'adrs1' => 'gfgcfgfg',
                        'adrs2' => 'gfgfg',
                        'city' => 'gfgfgf',
                        'state' => 'fgfgfgfgfg',
                        'country' => 'IN',
                        'zipcode' => '5596898985',]);

        Company::create([  'name' => 'company4',
                        'website' => 'http://www.google.com',
                        'email' => 'company4@gmail.com',
                        'industry_id' => '4',
                        'phone' => '3353213123',
                        'fax' => '332323',
                        'adrs1' => 'gfgcfgfg',
                        'adrs2' => 'gfgfg',
                        'city' => 'gfgfgf',
                        'state' => 'fgfgfgfgfg',
                        'country' => 'IN',
                        'zipcode' => '5596898985',]);

        Company::create([  'name' => 'company5',
                        'website' => 'http://www.google.com',
                        'email' => 'company5@gmail.com',
                        'industry_id' => '5',
                        'phone' => '3353213123',
                        'fax' => '332323',
                        'adrs1' => 'gfgcfgfg',
                        'adrs2' => 'gfgfg',
                        'city' => 'gfgfgf',
                        'state' => 'fgfgfgfgfg',
                        'country' => 'IN',
                        'zipcode' => '5596898985',]);

        DB::table('projects')->delete();

  
        Project::create([  'category_id' => '1',
                        'client_id' => '1',
                        'name' => 'projectone',
                        'slug' => 'projectone',
                        'description' => 'fgfgfgg',
                        'start_date' => '2016-03-22 06:24:50',
                        'end_date' => '2016-03-22 06:24:50',
                        'notes' => 'gfgfgfg',
                        ]);

        Project::create([  'category_id' => '2',
                        'client_id' => '2',
                        'name' => 'projecttwo',
                        'slug' => 'projecttwo',
                        'description' => 'fgfgfg',
                        'start_date' => '2016-03-23 06:24:50',
                        'end_date' => '2016-03-23 06:24:50',
                        'notes' => 'fgfgfgfgf',
                        ]);

        Project::create([  'category_id' => '3',
                        'client_id' => '3',
                        'name' => 'project3',
                        'slug' => 'project3',
                        'description' => 'fgfgfgf',
                        'start_date' => '2016-03-24 06:24:50',
                        'end_date' => '2016-03-24 06:24:50',
                        'notes' => 'gfgfgfgfg',
                        ]);

        Project::create([  'category_id' => '4',
                        'client_id' => '4',
                        'name' => 'project4',
                        'slug' => 'project4',
                        'description' => 'fgfgfgfg',
                        'start_date' => '2016-03-25 06:24:50',
                        'end_date' => '2016-03-25 06:24:50',
                        'notes' => 'fgfgfg',
                        ]);

        Project::create([  'category_id' => '5',
                        'client_id' => '5',
                        'name' => 'project5',
                        'slug' => 'project5',
                        'description' => 'gfgfgfgfgg',
                        'start_date' => '2016-03-26 06:24:50',
                        'end_date' => '2016-03-26 06:24:50',
                        'notes' => 'gfgfgfgf',
                        ]);

        DB::table('tasks')->delete();

  
        Task::create(
            ['project_id' => '1',
              'category_id'=>'1',
              'name'=>'task1',
              'slug'=>'task1',
              'start_date' => '2016-03-22 06:24:50',
              'due_date' => '2016-03-22 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);

        Task::create(
            ['project_id' => '1',
              'category_id'=>'1',
              'name'=>'task2',
              'slug'=>'task2',
              'start_date' => '2016-03-23 06:24:50',
              'due_date' => '2016-03-23 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);

        Task::create(
            ['project_id' => '1',
              'category_id'=>'1',
              'name'=>'task3',
              'slug'=>'task3',
              'start_date' => '2016-03-24 06:24:50',
              'due_date' => '2016-03-24 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);

        Task::create(
            ['project_id' => '2',
              'category_id'=>'2',
              'name'=>'task4',
              'slug'=>'task4',
              'start_date' => '2016-03-25 06:24:50',
              'due_date' => '2016-03-25 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);

        Task::create(
            ['project_id' => '3',
              'category_id'=>'3',
              'name'=>'task5',
              'slug'=>'task5',
              'start_date' => '2016-03-26 06:24:50',
              'due_date' => '2016-03-26 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);

        Task::create(
            ['project_id' => '4',
              'category_id'=>'4',
              'name'=>'task6',
              'slug'=>'task6',
              'start_date' => '2016-03-27 06:24:50',
              'due_date' => '2016-03-27 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);

        Task::create(
            ['project_id' => '5',
              'category_id'=>'5',
              'name'=>'task7',
              'slug'=>'task7',
              'start_date' => '2016-03-28 06:24:50',
              'due_date' => '2016-03-28 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);







        DB::table('log_times')->delete();

  
        LogTime::create(
            ['user_id' => '1',
              'task_id'=>'1',
              'description'=>'klklkl',
              'date' => '2016-03-22 06:24:50',
            ]);

        LogTime::create(
            ['user_id' => '2',
              'task_id'=>'2',
              'description'=>'klklkl',
              'date' => '2016-03-23 06:24:50',
            ]);

        LogTime::create(
            ['user_id' => '3',
              'task_id'=>'3',
              'description'=>'klklkl',
              'date' => '2016-03-24 06:24:50',
            ]);

        LogTime::create(
            ['user_id' => '4',
              'task_id'=>'4',
              'description'=>'klklkl',
              'date' => '2016-03-25 06:24:50',
            ]);

        LogTime::create(
            ['user_id' => '5',
              'task_id'=>'5',
              'description'=>'klklkl',
              'date' => '2016-03-26 06:24:50',
            ]);









        DB::table('milestones')->delete();

  
        Milestone::create(
            ['project_id' => '1',
              'name'=>'milestone1',
              'description'=>'rffsdfsdfd',
              'notes'=>'rffsdfsdfd',
            ]);

        Milestone::create(
                    ['project_id' => '2',
                      'name'=>'milestone2',
                      'description'=>'rffsdfsdfd',
                      'notes'=>'rffsdfsdfd',
                    ]);

        Milestone::create(
                    ['project_id' => '3',
                      'name'=>'milestone3',
                      'description'=>'rffsdfsdfd',
                      'notes'=>'rffsdfsdfd',
                    ]);

        Milestone::create(
                    ['project_id' => '4',
                      'name'=>'milestone4',
                      'description'=>'rffsdfsdfd',
                      'notes'=>'rffsdfsdfd',
                    ]);

        Milestone::create(
                    ['project_id' => '5',
                      'name'=>'milestone5',
                      'description'=>'rffsdfsdfd',
                      'notes'=>'rffsdfsdfd',
                    ]);
   
    }
}
