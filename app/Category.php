<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected function users() {
        return $this->hasManyThrough(UserCategory::class, User::class);
    }
}
