<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
