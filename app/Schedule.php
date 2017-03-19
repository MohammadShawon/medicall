<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected function user()  {
        return $this->hasManyThrough(Doctor::class, User::class);
    }
    protected function doctor() {
        return $this->belongsTo(Doctor::class);
    }
}
