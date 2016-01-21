<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
 	protected $table='project_categories';
 	protected $fillable=['name'];
}
