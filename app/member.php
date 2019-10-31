<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    
public function subscription()
    {
        return $this->hasMany(subscription::class);
    }

}
