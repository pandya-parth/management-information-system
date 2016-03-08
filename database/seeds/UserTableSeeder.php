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
            ['email' => 'kajal@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'admin',
              'active'=>1,
            ]);
        User::create(
            ['email' => 'baldev@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'admin',
              'active'=>1,
            ]);
        User::create(
            ['email' => 'ravi@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'admin',
              'active'=>1,
            ]);
        User::create(
            ['email' => 'nirav@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'admin',
              'active'=>1,
            ]);
        User::create(
            ['email' => 'bijal@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'admin',
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
            'fname' =>'kajal',
            'lname' =>'kanzaria',
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
            'fname' =>'baldev',
            'lname' =>'parmar',
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
            'fname' =>'ravi',
            'lname' =>'mehta',
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
            'fname' =>'nirav',
            'lname' =>'panchal',
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
            'fname' =>'bijal',
            'lname' =>'gajjar',
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
            ['name' => 'pcone',
            'slug' => 'pcone',
              ]);

        ProjectCategory::create(
            ['name' => 'pctwo',
            'slug' => 'pctwo',
              ]);

        ProjectCategory::create(
            ['name' => 'pcthree',
            'slug' => 'pcthree',
              ]);

        ProjectCategory::create(
            ['name' => 'pcfour',
            'slug' => 'pcfour',
              ]);

        ProjectCategory::create(
            ['name' => 'pcfive',
            'slug' => 'pcfive',
              ]);

        DB::table('task_categories')->delete();

  
        TaskCategory::create(
            ['name' => 'tcone',
            'slug' => 'tcone',
              ]);

        TaskCategory::create(
            ['name' => 'tctwo',
            'slug' => 'tctwo',
              ]);

        TaskCategory::create(
            ['name' => 'tcthree',
            'slug' => 'tcthree',
              ]);

        TaskCategory::create(
            ['name' => 'tcfour',
            'slug' => 'tcfour',
              ]);

        TaskCategory::create(
            ['name' => 'tcfive',
            'slug' => 'tcfive',
              ]);
        DB::table('departments')->delete();

  
        Department::create(
          ['name' => 'depone',
            'slug' => 'depone',


            ]);

        Department::create(
          ['name' => 'deptwo',
            'slug' => 'deptwo',


            ]);

        Department::create(
          ['name' => 'depthree',
            'slug' => 'depthree',


            ]);

        Department::create(
          ['name' => 'depfour',
            'slug' => 'depfour',


            ]);

        Department::create(
          ['name' => 'depfive',
          'slug' => 'depfive',


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
          ['name' => 'desthree',
          'slug' => 'desthree',
            ]);

        Designation::create(
          ['name' => 'desfour',
          'slug' => 'desfour',
            ]);

        Designation::create(
          ['name' => 'desfive',
          'slug' => 'desfive',
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
          ['name' => 'indthree',
            'slug' => 'indthree',
            ]);

        Industry::create(
          ['name' => 'indfour',
            'slug' => 'indfour',
            ]);

        Industry::create(
          ['name' => 'indfive',
            'slug' => 'indfive',
            ]);


        DB::table('companies')->delete();

  
        Company::create([  'name' => 'company1',
                        'website' => 'http://www.google.com',
                        'email' => 'kajal@gmail.com',
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
                        'email' => 'bldev@gmail.com',
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
                        'email' => 'ravi@gmail.com',
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
                        'email' => 'nirav@gmail.com',
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
                        'email' => 'bijal@gmail.com',
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
                        'notes' => 'gfgfgfg',
                        ]);

        Project::create([  'category_id' => '2',
                        'client_id' => '2',
                        'name' => 'projecttwo',
                        'slug' => 'projecttwo',
                        'description' => 'fgfgfg',
                        'notes' => 'fgfgfgfgf',
                        ]);

        Project::create([  'category_id' => '3',
                        'client_id' => '3',
                        'name' => 'projectthree',
                        'slug' => 'projectthree',
                        'description' => 'fgfgfgf',
                        'notes' => 'gfgfgfgfg',
                        ]);

        Project::create([  'category_id' => '4',
                        'client_id' => '4',
                        'name' => 'projectfour',
                        'slug' => 'projectfour',
                        'description' => 'fgfgfgfg',
                        'notes' => 'fgfgfg',
                        ]);

        Project::create([  'category_id' => '5',
                        'client_id' => '5',
                        'name' => 'projectfive',
                        'slug' => 'projectfive',
                        'description' => 'gfgfgfgfgg',
                        'notes' => 'gfgfgfgf',
                        ]);

        DB::table('tasks')->delete();

  
        Task::create(
            ['project_id' => '1',
              'category_id'=>'1',
              'name'=>'taskone',
              'slug'=>'taskone',
              'notes' => 'dasedasedskjhvjhvghv'
            ]);

        Task::create(
            ['project_id' => '2',
              'category_id'=>'2',
              'name'=>'tasktwo',
              'slug'=>'tasktwo',
              'notes' => 'dasedasedskjhvjhvghv'
            ]);

        Task::create(
            ['project_id' => '3',
              'category_id'=>'3',
              'name'=>'taskthree',
              'slug'=>'taskthree',
              'notes' => 'dasedasedskjhvjhvghv'
            ]);

        Task::create(
            ['project_id' => '4',
              'category_id'=>'4',
              'name'=>'taskfour',
              'slug'=>'taskfour',
              'notes' => 'dasedasedskjhvjhvghv'
            ]);

        Task::create(
            ['project_id' => '5',
              'category_id'=>'5',
              'name'=>'taskfive',
              'slug'=>'taskfive',
              'notes' => 'dasedasedskjhvjhvghv'
            ]);







        DB::table('log_times')->delete();

  
        LogTime::create(
            ['user_id' => '1',
              'task_id'=>'1',
              'description'=>'klklkl',
            ]);

        LogTime::create(
            ['user_id' => '2',
              'task_id'=>'2',
              'description'=>'klklkl',
            ]);

        LogTime::create(
            ['user_id' => '3',
              'task_id'=>'3',
              'description'=>'klklkl',
            ]);

        LogTime::create(
            ['user_id' => '4',
              'task_id'=>'4',
              'description'=>'klklkl',
            ]);

        LogTime::create(
            ['user_id' => '5',
              'task_id'=>'5',
              'description'=>'klklkl',
            ]);









        DB::table('milestones')->delete();

  
        Milestone::create(
            ['project_id' => '1',
              'name'=>'milestoneone',
              'description'=>'rffsdfsdfd',
              'notes'=>'rffsdfsdfd',
            ]);

        Milestone::create(
                    ['project_id' => '2',
                      'name'=>'milestonetwo',
                      'description'=>'rffsdfsdfd',
                      'notes'=>'rffsdfsdfd',
                    ]);

        Milestone::create(
                    ['project_id' => '3',
                      'name'=>'milestonethree',
                      'description'=>'rffsdfsdfd',
                      'notes'=>'rffsdfsdfd',
                    ]);

        Milestone::create(
                    ['project_id' => '4',
                      'name'=>'milestonefour',
                      'description'=>'rffsdfsdfd',
                      'notes'=>'rffsdfsdfd',
                    ]);

        Milestone::create(
                    ['project_id' => '5',
                      'name'=>'milestonefive',
                      'description'=>'rffsdfsdfd',
                      'notes'=>'rffsdfsdfd',
                    ]);
    }
}
