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
            ['email' => 'sammills254@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'owner',
              'active'=>1,
            ]);
        User::create(
            ['email' => 'daisycampbell29@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'employee',
              'active'=>1,
            ]);
        User::create(
            ['email' => 'kianstokes@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'employee',
              'active'=>1,
            ]);
        User::create(
            ['email' => 'ameliecook86@gmail.com',
              'password'=>bcrypt('admin123'),
              'roles'=>'employee',
              'active'=>1,
            ]);
        User::create(
            ['email' => 'jamesgardiner134@gmail.com',
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
            'city' =>'jamanagar',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'dob' => '2016-03-22 06:24:50',
            'join_date' => '2016-03-23 06:24:50',
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
            'fname' =>'sam',
            'lname' =>'mills',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'junagadh',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'dob' => '2016-03-22 06:24:50',
            'join_date' => '2016-03-23 06:24:50',
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
            'fname' =>'daisy',
            'lname' =>'campbell',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'rajkot',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'dob' => '2016-03-23 06:24:50',
            'join_date' => '2016-03-23 06:24:50',
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
            'fname' =>'kian',
            'lname' =>'stokes',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'surat',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'dob' => '2016-03-24 06:24:50',
            'join_date' => '2016-03-23 06:24:50',
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
            'fname' =>'amelie',
            'lname' =>'cook',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'ahmedabad',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'dob' => '2016-03-25 06:24:50',
            'join_date' => '2016-03-23 06:24:50',
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
            'fname' =>'james',
            'lname' =>'gardiner',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'keshod',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'dob' => '2016-03-26 06:24:50',
            'join_date' => '2016-03-23 06:24:50',
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
            ['name' => 'WebDesign',
            'slug' => 'webdesign',
              ]);

        ProjectCategory::create(
            ['name' => 'MobileApp',
            'slug' => 'mobileapp',
              ]);

        ProjectCategory::create(
            ['name' => 'HumanResource',
            'slug' => 'humanresource',
              ]);

        ProjectCategory::create(
            ['name' => 'DigitalMarketing',
            'slug' => 'digitalmarketing',
              ]);

        ProjectCategory::create(
            ['name' => 'Accounts',
            'slug' => 'accounts',
              ]);

        DB::table('task_categories')->delete();

  
        TaskCategory::create(
            ['name' => 'Planning',
            'slug' => 'planning',
              ]);

        TaskCategory::create(
            ['name' => 'Operations',
            'slug' => 'operations',
              ]);

        TaskCategory::create(
            ['name' => 'Research',
            'slug' => 'research',
              ]);

        TaskCategory::create(
            ['name' => 'Development',
            'slug' => 'development',
              ]);

        TaskCategory::create(
            ['name' => 'Testing',
            'slug' => 'testing',
              ]);
        DB::table('departments')->delete();

  
        Department::create(
          ['name' => 'Framework',
            'slug' => 'framework',


            ]);

        Department::create(
          ['name' => 'Html',
            'slug' => 'html',


            ]);

        Department::create(
          ['name' => 'Design',
            'slug' => 'design',


            ]);

        Department::create(
          ['name' => 'Seo',
            'slug' => 'seo',


            ]);

        Department::create(
          ['name' => 'Wp',
          'slug' => 'wp',


            ]);

        DB::table('designations')->delete();

  
        Designation::create(
          ['name' => 'JuniorDeveloper',
          'slug' => 'juniordeveloper',
            ]);

        Designation::create(
          ['name' => 'SeniorDeveloper',
          'slug' => 'seniordeveloper',
            ]);

        Designation::create(
          ['name' => 'ProjectManager',
          'slug' => 'projectmanager',
            ]);

        Designation::create(
          ['name' => 'Accountant',
          'slug' => 'accountant',
            ]);

        Designation::create(
          ['name' => 'Hr',
          'slug' => 'hr',
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

  
        Company::create([  'name' => 'Krishaweb',
                        'website' => 'http://www.google.com',
                        'email' => 'info@krishaweb.com',
                        'industry_id' => '1',
                        'phone' => '3353213123',
                        'fax' => '332323',
                        'adrs1' => 'gfgcfgfg',
                        'adrs2' => 'gfgfg',
                        'city' => 'gfgfgf',
                        'state' => 'fgfgfgfgfg',
                        'country' => 'IN',
                        'zipcode' => '5596898985',]);

        Company::create([  'name' => 'ZealousWeb',
                        'website' => 'http://www.mybooks.com',
                        'email' => 'ZealousWeb@ZealousWeb.com',
                        'industry_id' => '2',
                        'phone' => '3353213123',
                        'fax' => '332323',
                        'adrs1' => 'gfgcfgfg',
                        'adrs2' => 'gfgfg',
                        'city' => 'gfgfgf',
                        'state' => 'fgfgfgfgfg',
                        'country' => 'IN',
                        'zipcode' => '5596898985',]);

        Company::create([  'name' => 'David',
                        'website' => 'http://www.dailynews.com',
                        'email' => 'David@David.com',
                        'industry_id' => '3',
                        'phone' => '3353213123',
                        'fax' => '332323',
                        'adrs1' => 'gfgcfgfg',
                        'adrs2' => 'gfgfg',
                        'city' => 'gfgfgf',
                        'state' => 'fgfgfgfgfg',
                        'country' => 'IN',
                        'zipcode' => '5596898985',]);

        Company::create([  'name' => 'Etraffic',
                        'website' => 'http://www.trackotime.com',
                        'email' => 'Etraffic@Etraffic.com',
                        'industry_id' => '4',
                        'phone' => '3353213123',
                        'fax' => '332323',
                        'adrs1' => 'gfgcfgfg',
                        'adrs2' => 'gfgfg',
                        'city' => 'gfgfgf',
                        'state' => 'fgfgfgfgfg',
                        'country' => 'IN',
                        'zipcode' => '5596898985',]);

        Company::create([  'name' => 'Brad',
                        'website' => 'http://www.facebook.com',
                        'email' => 'brad@yourwebnut.com',
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
                        'name' => 'MIS',
                        'slug' => 'mis',
                        'description' => 'fgfgfgg',
                        'start_date' => '2016-03-22 06:24:50',
                        'end_date' => '2016-03-22 06:24:50',
                        'notes' => 'gfgfgfg',
                        ]);

        Project::create([  'category_id' => '2',
                        'client_id' => '2',
                        'name' => 'CommunityConnect',
                        'slug' => 'communityconnect',
                        'description' => 'fgfgfg',
                        'start_date' => '2016-03-23 06:24:50',
                        'end_date' => '2016-03-23 06:24:50',
                        'notes' => 'fgfgfgfgf',
                        ]);

        Project::create([  'category_id' => '3',
                        'client_id' => '3',
                        'name' => 'C4belts',
                        'slug' => 'c4belts',
                        'description' => 'fgfgfgf',
                        'start_date' => '2016-03-24 06:24:50',
                        'end_date' => '2016-03-24 06:24:50',
                        'notes' => 'gfgfgfgfg',
                        ]);

        Project::create([  'category_id' => '4',
                        'client_id' => '4',
                        'name' => 'Dejager',
                        'slug' => 'dejager',
                        'description' => 'fgfgfgfg',
                        'start_date' => '2016-03-25 06:24:50',
                        'end_date' => '2016-03-25 06:24:50',
                        'notes' => 'fgfgfg',
                        ]);

        Project::create([  'category_id' => '5',
                        'client_id' => '5',
                        'name' => 'HGC',
                        'slug' => 'hgc',
                        'description' => 'gfgfgfgfgg',
                        'start_date' => '2016-03-26 06:24:50',
                        'end_date' => '2016-03-26 06:24:50',
                        'notes' => 'gfgfgfgf',
                        ]);

        DB::table('tasks')->delete();

  
        Task::create(
            ['project_id' => '1',
              'category_id'=>'1',
              'name'=>'DoneThemeIntegration',
              'slug'=>'donethemeintegration',
              'start_date' => '2016-03-22 06:24:50',
              'due_date' => '2016-03-22 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);

        Task::create(
            ['project_id' => '1',
              'category_id'=>'1',
              'name'=>'LoginFunctionality',
              'slug'=>'loginfunctionality',
              'start_date' => '2016-03-23 06:24:50',
              'due_date' => '2016-03-23 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);

        Task::create(
            ['project_id' => '1',
              'category_id'=>'1',
              'name'=>'PeopleModule',
              'slug'=>'peoplemodule',
              'start_date' => '2016-03-24 06:24:50',
              'due_date' => '2016-03-24 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);

        Task::create(
            ['project_id' => '2',
              'category_id'=>'2',
              'name'=>'AdminPanel',
              'slug'=>'adminpanel',
              'start_date' => '2016-03-25 06:24:50',
              'due_date' => '2016-03-25 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);

        Task::create(
            ['project_id' => '3',
              'category_id'=>'3',
              'name'=>'WebServices',
              'slug'=>'webservices',
              'start_date' => '2016-03-26 06:24:50',
              'due_date' => '2016-03-26 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);

        Task::create(
            ['project_id' => '4',
              'category_id'=>'4',
              'name'=>'Translation',
              'slug'=>'translation',
              'start_date' => '2016-03-27 06:24:50',
              'due_date' => '2016-03-27 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);

        Task::create(
            ['project_id' => '5',
              'category_id'=>'5',
              'name'=>'Testing',
              'slug'=>'testing',
              'start_date' => '2016-03-28 06:24:50',
              'due_date' => '2016-03-28 06:24:50',
              'notes' => 'dasedasedskjhvjhvghv',
            ]);







        DB::table('log_times')->delete();

  
        LogTime::create(
            ['user_id' => '1',
              'task_id'=>'1',
              'description'=>'DoneThemeIntegration',
              'date' => '2016-03-22 06:24:50',
            ]);

        LogTime::create(
            ['user_id' => '2',
              'task_id'=>'2',
              'description'=>'AdminPanel',
              'date' => '2016-03-23 06:24:50',
            ]);

        LogTime::create(
            ['user_id' => '3',
              'task_id'=>'3',
              'description'=>'WebServices',
              'date' => '2016-03-24 06:24:50',
            ]);

        LogTime::create(
            ['user_id' => '4',
              'task_id'=>'4',
              'description'=>'Translation',
              'date' => '2016-03-25 06:24:50',
            ]);

        LogTime::create(
            ['user_id' => '5',
              'task_id'=>'5',
              'description'=>'Testing',
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

        // DB::table('project_users')->delete();

  
        // ProjectUser::create(
        //     ['user_id' => '1',
        //       'project_id'=>'1',
        //     ]);

        // ProjectUser::create(
        //     ['user_id' => '1',
        //       'project_id'=>'2',
        //     ]);

        // ProjectUser::create(
        //     ['user_id' => '1',
        //       'project_id'=>'3',
        //     ]);

        // ProjectUser::create(
        //     ['user_id' => '2',
        //       'project_id'=>'4',
        //     ]);

        // ProjectUser::create(
        //     ['user_id' => '3',
        //       'project_id'=>'5',
        //     ]);

        // ProjectUser::create(
        //     ['user_id' => '4',
        //       'project_id'=>'2',
        //     ]);

        // ProjectUser::create(
        //     ['user_id' => '4',
        //       'project_id'=>'3',
        //     ]);

        // ProjectUser::create(
        //     ['user_id' => '5',
        //       'project_id'=>'3',
        //     ]);

        // ProjectUser::create(
        //     ['user_id' => '6',
        //       'project_id'=>'3',
        //     ]);

        
   
    }
}
