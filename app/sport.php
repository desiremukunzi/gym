<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sport extends Model
{
    public function subscription()
    {
        return $this->hasMany(subscription::class);
    }public function attendance()
    {
        return $this->hasMany(attendance::class);
    }
}
