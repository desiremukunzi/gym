<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscription extends Model
{
	protected $fillable = [
        'duration_id', 'sport_id', 'client_type_id', 'password','tel',
    ];

    public function sport()
    {
        return $this->belongsTo(sport::class);
    }
     public function member()
    {
        return $this->belongsTo(member::class);
    }
    public function client_type()
    {
        return $this->belongsTo(client_type::class);
    }
    public function duration()
    {
        return $this->belongsTo(duration::class);
    }
}
