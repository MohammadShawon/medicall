<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'address',
        'phone',
        'birthday',
        'bio',
        'occupation',
        'website',

        'status',

        'availability',
        'available_for',
        'hospital',
        'bdmo_no',
        'speciality',
        'online'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function patients() {
        return $this->hasMany(Patient::class, 'user_id');
    }

    protected function scopeUsers($query) {
        return $query->where('status', 0)->orWhere('status', 1);
    }

    protected function scopeVerifiedUsers($query) {
        return $query->where('status', 1);
    }

    protected function scopeDoctors($query) {
        return $query->where('status', 2)->orWhere('status', 3);
    }

    protected function scopeVerifiedDoctors($query) {
        return $query->where('status', 3);
    }

    protected function appointmentsByPatient() {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    protected function appointmentsByDoctor() {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    protected function appointments() {
        return $this->appointmentsByPatient->merge($this->appointmentsByDoctor);
    }

    protected function messageFrom() {
        return $this->hasMany(Message::class, 'from_id');
    }

    protected function messageTo() {
        return $this->hasMany(Message::class, 'to_id');
    }

    protected function messages() {
        return $this->messageFrom->merge($this->messageTo);
    }

    protected function prescriptionBy() {
        return $this->hasMany(Prescription::class, 'doctor_id');
    }
    protected function prescriptionFor() {
        return $this->hasMany(Prescription::class, 'patient_id');
    }
    protected function prescriptions() {
        return $this->prescriptionBy->merge($this->prescriptionFor);
    }

    protected function tags() {
        return $this->hasMany(UserTag::class);
    }

    protected function category() {
        return $this->hasOne(UserCategory::class);
    }
}
