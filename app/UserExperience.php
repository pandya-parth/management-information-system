<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    protected $table='user_experiences';
    
    protected $fillable = ['user_id','company_name', 'from', 'to','salary','reason'];

    public function users()
    {
    	$this->belongsTo('App\User');
    }

    public function setFromAttribute($value)
    {   
        if(!empty($value))
        {
            $this->attributes['from'] = $value;
        }
        else
        {
            $this->attributes['from'] = NULL;
        }
    }

    public function setToAttribute($value)
    {   
        if(!empty($value))
        {
            $this->attributes['to'] = $value;
        }
        else
        {
            $this->attributes['to'] = NULL;
        }
    }
}
