<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function doctor() {
        return $this->belongsTo(User::class, 'id', 'doctor_id');
    }
    public function patient() {
        return $this->belongsTo(User::class, 'id','user_id');
    }
    public function prescription() {
        return $this->hasOne(Prescription::class);
    }
}
