<?php

use Illuminate\Database\Seeder;
use App\ProjectCategory;

class ProjectCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
