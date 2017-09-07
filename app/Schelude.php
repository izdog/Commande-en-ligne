<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schelude extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'morning_start', 'morning_end', 'evening_start', 'evening_end'
    ];
}
