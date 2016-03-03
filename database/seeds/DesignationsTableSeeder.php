<?php

use Illuminate\Database\Seeder;
use App\Designation;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
