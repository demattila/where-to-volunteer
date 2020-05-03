<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    protected $guarded=[];
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopePublished($query)
    {
        return $query->where('published_at','!=', null);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('published_at',null);
    }

    public function scopeRecentFirst($query){
        return $query->orderBy('published_at', 'desc');
    }
}
