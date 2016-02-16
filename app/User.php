<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    
    public function people()
    {
        return $this->belongsTo('People', 'user_id');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    
    public function tasks()
    {
        return $this->belongsToMany('App\Task','task_users','task_id','user_id');
    }
    public function milestones()
    {
        return $this->belongsToMany('App\Milestone','milestone_users','milestone_id','user_id');
    }


}
