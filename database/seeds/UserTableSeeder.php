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
          ['user_id' =>2,
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
          ['user_id' =>3,
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
          ['user_id' =>4,
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
          ['user_id' =>5,
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
            ['name' => 'one',
            'slug' => 'one',
              ]);

        ProjectCategory::create(
            ['name' => 'two',
            'slug' => 'two',
              ]);

        ProjectCategory::create(
            ['name' => 'three',
            'slug' => 'three',
              ]);

        ProjectCategory::create(
            ['name' => 'four',
            'slug' => 'four',
              ]);

        ProjectCategory::create(
            ['name' => 'five',
            'slug' => 'onfivee',
              ]);

        DB::table('task_categories')->delete();

  
        TaskCategory::create(
            ['name' => 'one',
            'slug' => 'one',
              ]);

        TaskCategory::create(
            ['name' => 'two',
            'slug' => 'two',
              ]);

        TaskCategory::create(
            ['name' => 'three',
            'slug' => 'three',
              ]);

        TaskCategory::create(
            ['name' => 'four',
            'slug' => 'four',
              ]);

        TaskCategory::create(
            ['name' => 'five',
            'slug' => 'onfivee',
              ]);
        DB::table('departments')->delete();

  
        Department::create(
          ['name' => 'one',
            'slug' => 'one',


            ]);

        Department::create(
          ['name' => 'two',
            'slug' => 'two',


            ]);

        Department::create(
          ['name' => 'three',
            'slug' => 'three',


            ]);

        Department::create(
          ['name' => 'four',
            'slug' => 'four',


            ]);

        Department::create(
          ['name' => 'five',
          'slug' => 'five',


            ]);

        DB::table('designations')->delete();

  
        Designation::create(
          ['name' => 'one',
          'slug' => 'one',
            ]);

        Designation::create(
          ['name' => 'two',
          'slug' => 'two',
            ]);

        Designation::create(
          ['name' => 'three',
          'slug' => 'three',
            ]);

        Designation::create(
          ['name' => 'four',
          'slug' => 'four',
            ]);

        Designation::create(
          ['name' => 'five',
          'slug' => 'five',
            ]);

        DB::table('industries')->delete();

  
        Industry::create(
          ['name' => 'one',
            'slug' => 'one',
            ]);

        Industry::create(
          ['name' => 'two',
            'slug' => 'two',
            ]);

        Industry::create(
          ['name' => 'three',
            'slug' => 'three',
            ]);

        Industry::create(
          ['name' => 'four',
            'slug' => 'four',
            ]);

        Industry::create(
          ['name' => 'five',
            'slug' => 'onfivee',
            ]);


        DB::table('companies')->delete();

  
        Company::create([  'name' => 'fdfdff',
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

        Company::create([  'name' => 'fdwewewefdff',
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

        Company::create([  'name' => 'fdfsdsasasasdff',
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

        Company::create([  'name' => 'aaaaddsd',
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

        Company::create([  'name' => 'aasdtryr',
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
                        'name' => 'fdfdf',
                        'slug' => 'fdfdf',
                        'description' => 'fgfgfgg',
                        'notes' => 'gfgfgfg',
                        ]);

        Project::create([  'category_id' => '2',
                        'client_id' => '2',
                        'name' => 'qqweqwq',
                        'slug' => 'qqweqwq',
                        'description' => 'fgfgfg',
                        'notes' => 'fgfgfgfgf',
                        ]);

        Project::create([  'category_id' => '3',
                        'client_id' => '3',
                        'name' => 'dsdsdsd',
                        'slug' => 'dsdsdsd',
                        'description' => 'fgfgfgf',
                        'notes' => 'gfgfgfgfg',
                        ]);

        Project::create([  'category_id' => '4',
                        'client_id' => '4',
                        'name' => 'jjjjhjhjgy',
                        'slug' => 'jjjjhjhjgy',
                        'description' => 'fgfgfgfg',
                        'notes' => 'fgfgfg',
                        ]);

        Project::create([  'category_id' => '5',
                        'client_id' => '5',
                        'name' => 'jkjkjkjk',
                        'slug' => 'jkjkjkjk',
                        'description' => 'gfgfgfgfgg',
                        'notes' => 'gfgfgfgf',
                        ]);

        DB::table('tasks')->delete();

  
        Task::create(
            ['project_id' => '1',
              'category_id'=>'1',
              'name'=>'fdfdfd',
              'slug'=>'fdfdfd',
              'notes' => 'dasedasedskjhvjhvghv'
            ]);

        Task::create(
            ['project_id' => '2',
              'category_id'=>'2',
              'name'=>'fdfdfd',
              'slug'=>'fdfdfd',
              'notes' => 'dasedasedskjhvjhvghv'
            ]);

        Task::create(
            ['project_id' => '3',
              'category_id'=>'3',
              'name'=>'fdfdfd',
              'slug'=>'fdfdfd',
              'notes' => 'dasedasedskjhvjhvghv'
            ]);

        Task::create(
            ['project_id' => '4',
              'category_id'=>'4',
              'name'=>'fdfdfd',
              'slug'=>'fdfdfd',
              'notes' => 'dasedasedskjhvjhvghv'
            ]);

        Task::create(
            ['project_id' => '5',
              'category_id'=>'5',
              'name'=>'fdfdfd',
              'slug'=>'fdfdfd',
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
              'name'=>'dfdfd',
              'description'=>'rffsdfsdfd',
              'notes'=>'rffsdfsdfd',
            ]);

        Milestone::create(
                    ['project_id' => '2',
                      'name'=>'jjhjh',
                      'description'=>'rffsdfsdfd',
                      'notes'=>'rffsdfsdfd',
                    ]);

        Milestone::create(
                    ['project_id' => '3',
                      'name'=>'jjghj',
                      'description'=>'rffsdfsdfd',
                      'notes'=>'rffsdfsdfd',
                    ]);

        Milestone::create(
                    ['project_id' => '4',
                      'name'=>'hghdfg',
                      'description'=>'rffsdfsdfd',
                      'notes'=>'rffsdfsdfd',
                    ]);

        Milestone::create(
                    ['project_id' => '5',
                      'name'=>'nhnbng',
                      'description'=>'rffsdfsdfd',
                      'notes'=>'rffsdfsdfd',
                    ]);
    }
}
