<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;	
use Event;

class Milestone extends Model 
{

	public $timestamps = true;

	protected $fillable = ['name','description','notes','due_date','user_id','project_id','reminder'];

	public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function project()
    {
        return $this->belongsToMany('App\Project');
    }

}
