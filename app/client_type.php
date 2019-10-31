<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client_type extends Model
{

	 protected $fillable = [
        'name'
    ];
    
public function subscription()
    {
        return $this->hasMany(subscription::class);
    }

}
