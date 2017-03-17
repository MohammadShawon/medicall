<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected function user() {
        return $this->belongsTo(User::class);
    }
    protected function doctor() {
        return $this->hasOne(User::class, 'id', 'doctor_id');
    }
    protected function prescription() {
        return $this->hasOne(Prescription::class);
    }
}
