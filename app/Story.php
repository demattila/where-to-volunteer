<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use Illuminate\Support\Facades\App;

class Story extends Model implements ViewableContract
{
    use Viewable;
    protected $guarded = [];
    protected $dates = ['created_at'];

    public function owner()
    {
        return $this->morphTo();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'story_id');
    }

    public function previous(){
        $previous = Story::where('id', '<', $this->id)->orderBy('id','desc')->first();
        return $previous;
    }
    public function next(){
        $next = Story::where('id', '>', $this->id)->orderBy('id')->first();
        return $next;
    }
}
