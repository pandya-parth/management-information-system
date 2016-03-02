<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogTime extends Model
{
    protected $table='log_times';

    public $timestamps = true;

    protected $fillable = ['user_id','task_id','date','start_time','end_time','hour','minute','description','billable'];

    public function setUserIdAttribute($value)
    {   
        if(!empty($value))
        {
            $this->attributes['user_id'] = $value;
        }
        else
        {
            $this->attributes['user_id'] = Auth::user()->id;
        }
    }

    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
