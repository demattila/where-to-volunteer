<?php

namespace App;

use http\Env\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\Models\Media;

class Volunteer extends Authenticatable implements HasMedia
{
    use Notifiable,HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','password','posy','mobile','city','region','works_at','birth','image_id','sex','driving_licence',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = [
        'birth'
    ];

    public function applies()
    {
        return $this->belongsToMany(Event::class, 'applies')->withPivot('id','status')->withTimestamps();
    }

    public function applyStatus(Event $event)
    {
//        dump($event);
//        $a = $this->applies()->where('events.id','=', $event->id)->pivot;
        $a = $this->applies()->where('events.id','=',$event->id)->first()->pivot->status;
//        dd($a);
        return $a;
    }

    public function favorites()
    {
        return $this->belongsToMany(Event::class, 'favorites')->withPivot('id')->withTimestamps();
    }

    public function historyEvents(){
        $applies = $this->applies()->wherePivot('status', 1)->where('ends_at','<',now())->get();
//        dd($applies);
        return $applies;
    }
    public function ongoingApplies(){
        $applies = $this->applies()->wherePivot('status', 0)->where('ends_at','>=',now())->get();
//        $applies = $this->applies()->pivot->w(isOngoing(),'true')->get();
//        dd($applies);
        return $applies;
    }
    public function acceptedApplies(){
        $applies = $this->applies()->wherePivot('status', 1)->where('ends_at','>=',now())->get();
//        $applies = $this->applies()->wherePivot(isAccepted(),'true')->get();
//        dd($applies);
        return $applies;
    }
    public function rejectedApplies(){
        $applies = $this->applies()->wherePivot('status', 2)->where('ends_at','>=',now())->get();
//        $applies = $this->applies()->wherePivot(isRejected(),'true')->get();
//        dd($applies);
        return $applies;
    }

    public function isApplied(Event $event){
//       $query = $this->applies()->where('volunteer_id',$this->id)->where('event_id', $event->id)->get();
//        dd($query);
//       if( $query) return true;
//       return false;
        if(Apply::all()->where('volunteer_id',$this->id)->where('event_id',$event->id)->count() > 0){
            return true;
        }
        return false;
    }

    public function isFavorite(Event $event){
        if(Favorite::all()->where('volunteer_id',$this->id)->where('event_id',$event->id)->count() > 0){
            return true;
        }
        return false;
    }

    public function image(){
        return $this->hasOne(Media::class,'id','image_id');
    }

    public function getImageUrlAttribute(){
//        $image_url = $this->getFirstMediaUrl('volunteer_profile_images');
        $image = $this->image;

        if($image == Null){
            if($this->sex == 'M'){
                return(url('/storage/default/male.jpg'));
            }
            else{
                return(url('/storage/default/female.jpg'));
            }
        }
        return $image->getUrl();
    }

    public function getAvatarUrlAttribute(){
        $image = $this->image;
        if($image == Null){
            if($this->sex == 'M'){
                return(url('/storage/default/male_avatar.jpg'));
            }
            else{
                return(url('/storage/default/female_avatar.jpg'));
            }
        }
        return $image->getUrl('avatar');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('volunteer_profile_images')->singleFile()
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
        return $this->morphMany(Story::class, 'owner');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'owner');
    }
}
