<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Project extends Model  implements SluggableInterface
{
 	use SluggableTrait;

   	public $timestamps = true;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
        'separator'  => '-',
        'on_update'  => true,
    ]; 

    protected $fillable = ['name','category_id','client_id','description'];

 //    public function category()
	// {
	// 	return $this->belongsTo('ProjectCategory','category_id');
	// }

 //    public function users()
 //    {
 //        return $this->hasMany('User','user_id');
 //    }

 public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
