<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    // for protection
    protected $guarded = [];

    // tweet model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
