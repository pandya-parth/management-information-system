<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
       protected $table='user_profile';
       protected $fillable = ['fname','lname','email','mobile','phone','adrs1','adrs2','city','state','country','pan_number','department','designation','education','google','facebook','website','skype','linkedin','twitter'];
}
