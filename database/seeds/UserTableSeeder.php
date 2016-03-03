<?php
use App\User;
use Illuminate\Database\Seeder;

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
    }
}
