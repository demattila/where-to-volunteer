<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = [
        'id','volunteer_id','event_id','status',
    ];

    public function isOngoing(){
        return $this->status == 0;
    }
    public function isAccepted(){
        return $this->status == 1;
    }
    public function isRejected(){
        return $this->status == 2;
    }
}
