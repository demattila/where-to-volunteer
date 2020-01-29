<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use Illuminate\Support\Facades\App;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\File;

class Story extends Model implements ViewableContract, HasMedia
{
    use Viewable;
    use HasMediaTrait;

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

    public function image(){
        return $this->hasOne(Media::class,'id','image_id');
    }

    public function getImageUrlAttribute(){
        $image = $this->image;

        if($image == Null){
            return(url('/storage/default/blog.jpg'));
        }
        return $image->getUrl();
    }


    public function registerMediaCollections()
    {
        $this->addMediaCollection('story_image')->singleFile()
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            });

        $this->addMediaCollection('story_additional_images')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            });
    }

//    /**
//     * @param Media|null $media
//     * @throws \Spatie\Image\Exceptions\InvalidManipulation
//     */
//    public function registerMediaConversions(Media $media = null)
//    {
//        $this->addMediaConversion('avatar')
//            ->width(50)
//            ->height(50);
//    }
}
