<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogTime extends Model
{
    protected $table='log_times';

    public $timestamps = true;

    protected $fillable = ['user_id','date','start_time','end_time','hour','minute','billable'];
}
