<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function hospital() {
        return $this->belongsTo(Hospital::class);
    }
    public function prescriptions() {
        return $this->hasMany(Prescription::class);
    }
    public function appointments() {
        return $this->hasMany(Appointment::class);
    }
    public function schedule() {
        return $this->hasMany(Schedule::class);
    }
}
