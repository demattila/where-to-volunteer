<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function owner()
    {
        return $this->morphTo();
    }

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
