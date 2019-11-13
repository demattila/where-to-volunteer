<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'id','name',
    ];

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }
}
