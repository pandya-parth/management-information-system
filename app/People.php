<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class People extends Model
{
       protected $table='user_profile';
       protected $fillable = ['fname','lname','email','mobile','phone','adrs1','adrs2','city','state','country','pan_number','department','designation','education','google','facebook','website','skype','linkedin','twitter','profile'];

       public function user()
    {
        return $this->hasOne('User', 'user_id');
    }



}
