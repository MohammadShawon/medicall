<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function doctor() {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function prescription() {
        return $this->hasOne(Prescription::class);
    }
    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }
}
