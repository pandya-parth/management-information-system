<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model 
{
    protected $fillable = ['name','logo','website','email','industry','phone','fax','adrs1','adrs2','city','state','country','zipcode'];
}
