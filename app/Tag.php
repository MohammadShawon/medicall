<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected function userTags() {
        return $this->hasMany(UserTag::class);
    }

    protected function users() {
        return $this->hasManyThrough(UserTag::class, User::class);
    }
}
