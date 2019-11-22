<?php

namespace App;

use http\Env\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\File;

class Volunteer extends Authenticatable implements HasMedia
{
    use Notifiable,HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','password','posy','mobile','city','region','works_at','birth','image','sex','driving_licence',
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

    public function favorites()
    {
        return $this->belongsToMany(Event::class, 'favorites')->withPivot('id')->withTimestamps();
    }

    public function getProfileImagePath(){
        $image_url = $this->getFirstMediaUrl('volunteer_profile_images');

        if($image_url == Null){
            if($this->sex == 'M'){
                return(url('/storage/default_male.jpg'));
            }
            else{
                return(url('/storage/default_female.jpg'));
            }
        }
        return $image_url;
    }

    public function historyEvents(){
        $applies = $this->applies()->wherePivot('status', 1)->where('ends_at','<',now())->get();
//        dd($applies);
        return $applies;
    }
    public function ongoingApplies(){
        $applies = $this->applies()->wherePivot('status', 0)->get();
//        $applies = $this->applies()->pivot->w(isOngoing(),'true')->get();
//        dd($applies);
        return $applies;
    }
    public function acceptedApplies(){
        $applies = $this->applies()->wherePivot('status', 1)->get();
//        $applies = $this->applies()->wherePivot(isAccepted(),'true')->get();
//        dd($applies);
        return $applies;
    }
    public function rejectedApplies(){
        $applies = $this->applies()->wherePivot('status', 2)->get();
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

    public function registerMediaCollections()
    {
        $this->addMediaCollection('volunteer_profile_images')->singleFile()
             ->acceptsFile(function (File $file) {
            return $file->mimeType === 'image/jpeg';
        });;
    }

}
