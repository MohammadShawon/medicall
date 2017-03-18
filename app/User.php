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

    public function scopeUsers($query) {
        return $query->where('status', 0)->orWhere('status', 1);
    }

    public function scopeVerifiedUsers($query) {
        return $query->where('status', 1);
    }

    public function scopeDoctors($query) {
        return $query->where('status', 2)->orWhere('status', 3);
    }

    public function scopeVerifiedDoctors($query) {
        return $query->where('status', 3);
    }

    public function appointmentsByPatient() {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function appointmentsByDoctor() {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function messageFrom() {
        return $this->hasMany(Message::class, 'from_id');
    }

    public function messageTo() {
        return $this->hasMany(Message::class, 'to_id');
    }

    public function prescriptionsByDoctor() {
        return $this->hasMany(Prescription::class, 'doctor_id');
    }
    public function prescriptionsForPatient() {
        return $this->hasMany(Prescription::class, 'patient_id');
    }

    public function tags() {
        return $this->hasMany(UserTag::class);
    }

    public function category() {
        return $this->hasOne(UserCategory::class);
    }
}
