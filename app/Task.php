<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
class Task extends Model implements SluggableInterface
{

	use SluggableTrait;

   	public $timestamps = true;

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

    public function setDueDateAttribute($value)
    {   
        if(!empty($value))
        {
            $this->attributes['due_date'] = $value;
        }
        else
        {
            $this->attributes['due_date'] = NULL;
        }
    }

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
        'separator'  => '-',
        'on_update'  => true,
    ]; 

    protected $fillable = ['name','category_id','project_id','notes','start_date','due_date','priority'];
    

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function category()
    {
        return $this->belongsToMany('App\TaskCategory');
    }

   public function project()
    {
        return $this->belongsTo('App\Project');
    }
    
}
