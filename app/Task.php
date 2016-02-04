<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
class Task extends Model implements SluggableInterface
{

	use SluggableTrait;

   	public $timestamps = true;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
        'separator'  => '-',
        'on_update'  => true,
    ]; 

    protected $fillable = ['name','category_id','project_id'];
    

     public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function project(){
        return $this->belongsTo('Project','project_id');
    }
}
