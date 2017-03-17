<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected function categories() {
        return $this->hasMany(UserCategory::class);
    }

    protected function users() {
        return $this->hasManyThrough(UserCategory::class, User::class);
    }
}
