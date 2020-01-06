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

    protected $dates = [
        'starts_at','ends_at'
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

    public function ongoingApplies(){
            $applies = $this->applies()->wherePivot('status', '=',0)->get();
            return $applies;
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(Volunteer::class, 'favorites')->withTimestamps();
    }

    public function favorited()
    {
        return (bool) Favorite::where('volunteer_id', auth()->guard('web')->id())
            ->where('event_id', $this->id)
            ->first();

//        return true;
    }

    public function image(){
        return $this->hasOne(Media::class,'id','image_id');
    }

    public function getImageUrlAttribute(){$image = $this->image;

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
