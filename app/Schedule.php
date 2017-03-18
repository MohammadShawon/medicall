<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected function doctor() {
        return $this->belongsTo(User::class);
    }
}
