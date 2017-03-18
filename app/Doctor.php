<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected function user() {
        return $this->belongsTo(User::class);
    }
    protected function prescriptions() {
        return $this->hasMany(Prescription::class);
    }
    protected function appointments() {
        return $this->hasMany(Appointment::class);
    }
}
