<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    
 protected $fillable = [
        'admin_id', 'client_id', 'sport_id',
    ];

public function sport()
    {
        return $this->belongsTo(sport::class);
    }
public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
