<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class duration extends Model
{
    public function subscription()
    {
        return $this->hasMany(subscription::class);
    }
}
