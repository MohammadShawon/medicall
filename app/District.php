<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function hospitals()
    {
        return $this->hasMany(Hospital::class);
    }
    public function division() {
        return $this->belongsTo(Division::class);
    }
}
