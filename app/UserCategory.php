<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    public $timestamps = false;

    protected function user() {
        return $this->belongsTo(User::class);
    }

    protected function category() {
        return $this->belongsTo(Category::class);
    }
}
