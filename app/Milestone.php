<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;	
use Event;

class Milestone extends Model 
{

	public $timestamps = true;

	protected $fillable = ['name','description','notes','due_date','project_id','reminder'];

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

	public function project()
    {
        return $this->belongsToMany('App\Project');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','milestone_users','milestone_id','user_id');
    }

}
