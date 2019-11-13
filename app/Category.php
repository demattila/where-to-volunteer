<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id','name',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_categories');
    }
}
