<?php

use Illuminate\Database\Seeder;
use App\TaskCategory;

class TaskCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
