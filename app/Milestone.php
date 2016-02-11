<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;	
use Event;

class Milestone extends Model 
{

	public $timestamps = true;

	protected $fillable = ['name','description','notes','due_date','user','reminder'];

}
