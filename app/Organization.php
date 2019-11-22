<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Organization extends Authenticatable implements HasMedia
{
    use Notifiable, HasMediaTrait;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'owner_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class, 'organization_fields');
    }
}
