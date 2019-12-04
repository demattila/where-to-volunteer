<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\Models\Media;

class Event extends Model implements HasMedia
{
    use HasMediaTrait;
//    protected $fillable = [
//        'id','owner_id','title','description','starts_at','ends_at','reward'
//    ];
//
    protected $guarded = [];

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

    public function image(){
        return $this->hasOne(Media::class,'id','image_id');
    }

    public function getImageUrlAttribute(){
//        $image_url = $this->getFirstMediaUrl('volunteer_profile_images');
        $image = $this->image;

        if($image == Null){
            return(url('/storage/default/event.jpg'));
        }
        return $image->getUrl();
    }

    public function getAvatarUrlAttribute(){
        $image = $this->image;
        if($image == Null){
            return(url('/storage/default/male_avatar.jpg'));
        }

        return $image->getUrl('avatar');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('event_profile_images')->singleFile()
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            });
    }

    /**
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
            $this->addMediaConversion('avatar')
                ->width(50)
                ->height(50);
    }
}
