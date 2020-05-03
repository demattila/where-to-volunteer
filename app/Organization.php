<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\Models\Media;

class Organization extends Authenticatable implements HasMedia
{
    use Notifiable, HasMediaTrait;

//    protected $fillable = [
//        'name', 'email', 'password',
//    ];
    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'terms_accepted_at' => 'datetime'
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'owner_id');
    }

    public function historyEvents(){
        $events = $this->events()->where('ends_at','<',now())->get();
//        dd($applies);
        return $events;
    }
    public function ongoingEvents(){
        $events = $this->events()->where('ends_at','>',now())->get();
//        dd($applies);
        return $events;
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class, 'organization_fields');
    }


    public function image(){
        return $this->hasOne(Media::class,'id','image_id');
    }

    public function getImageUrlAttribute(){
//        $image_url = $this->getFirstMediaUrl('volunteer_profile_images');
        $image = $this->image;

        if($image == Null){
            return(url('/storage/default/male.jpg'));
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
        $this->addMediaCollection('organization_profile_images')->singleFile()
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            });
    }

    /**
     * @param Media|null $media
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
            $this->addMediaConversion('avatar')
                ->width(50)
                ->height(50);
    }

    public function stories()
    {
        return $this->morphMany('App\Story', 'owner');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'owner');
    }

    public function hasAcceptedLatestTerms(){
        $term = Terms::recentFirst()->first();
        return $this->terms_accepted_at >= $term->published_at;
    }

    public function currentlyAcceptedTerm(){
        if($this->terms_accepted_at){
            $term = Terms::published()->where('published_at','<=',$this->terms_accepted_at)->recentFirst()->first();
        }
        else{
            return null;
        }

        return $term;
    }
}
