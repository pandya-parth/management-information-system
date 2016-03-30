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

    protected $fillable = ['name','category_id','client_id','description','price_types','notes','status','start_date','end_date'];

    public function setStartDateAttribute($value)
    {   
        if(!empty($value))
        {
            $this->attributes['start_date'] = $value;
        }
        else
        {
            $this->attributes['start_date'] = NULL;
        }
    }

    public function setEndDateAttribute($value)
    {   
        if(!empty($value))
        {
            $this->attributes['end_date'] = $value;
        }
        else
        {
            $this->attributes['end_date'] = NULL;
        }
    }


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
        return $this->belongsToMany('App\User','project_users','project_id','user_id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }


    public function milestones()
    {
        return $this->hasMany('App\Milestone');
    }

    public function company()
    {
        return $this->belongsTo('App\Company','client_id');
    }

    public function category()
    {
        return $this->belongsTo('App\ProjectCategory');
    }

    

  // }
  //   public function tasks(){
  //       return $this->hasMany('Task','project_id');
  //   }
}
