<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class TaskCategory extends Model implements SluggableInterface
{
   use SluggableTrait;

   	public $timestamps = true;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
        'separator'  => '-',
        'on_update'  => true,
    ]; 

    protected $fillable = ['name'];

    public function tasks()
	{
		return $this->hasMany('Task','category_id');
	}
}
