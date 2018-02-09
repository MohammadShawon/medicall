<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    public function district() {
        return $this->belongsTo(District::class);
    }
    public function doctors() {
        return $this->hasMany(Doctor::class);
    }
    public function schedules() {
        return $this->hasMany(Schedule::class);
    }
    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
}
