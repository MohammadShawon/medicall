<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTag extends Model
{
    protected function user() {
        return $this->belongsTo(User::class);
    }

    protected function tag() {
        return $this->belongsTo(Tag::class);
    }
}
