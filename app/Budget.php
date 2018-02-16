<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $guarded = ['id'];
    public $dates = ['start', 'end'];

    public function scopeCurrent()
    {
        return self::latest()->limit(1)->get()->first();
    }
}
