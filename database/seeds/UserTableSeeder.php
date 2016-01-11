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
        	['email' => 'admin@gmail.com',
        	  'password'=>bcrypt('admin123'),
        	  'roles'=>'admin',
        	  'active'=>1,
        	]);
    }
}
