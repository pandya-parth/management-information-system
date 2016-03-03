<?php

use Illuminate\Database\Seeder;
use App\Industry;

class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
