<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected function doctor() {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
    protected function patient() {
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }
    protected function appointment() {
        return $this->belongsTo(Appointment::class);
    }
}
