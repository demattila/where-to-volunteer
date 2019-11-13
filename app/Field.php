<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'organization_fields');
    }
}
