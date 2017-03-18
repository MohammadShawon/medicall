<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected function users() {
        return $this->hasManyThrough(UserTag::class, User::class);
    }
}
