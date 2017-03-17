<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected function doctor() {
        return $this->belongsTo(User::class, 'id', 'doctor_id');
    }
    protected function patient() {
        return $this->belongsTo(Patient::class, 'id', 'user_id');
    }
    protected function appointment() {
        return $this->belongsTo(Appointment::class);
    }
}
