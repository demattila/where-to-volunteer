<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'id','owner_id','title','description','starts_at','ends_at','reward'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'event_categories');
    }

    public function owner()
    {
        return $this->belongsTo(Organization::class);
    }

    public function applies()
    {
        return $this->belongsToMany(Volunteer::class, 'applies')->withPivot('id','status')->withTimestamps();
    }

    public function favorites()
    {
        return $this->belongsToMany(Volunteer::class, 'favorites')->withTimestamps();
    }

}