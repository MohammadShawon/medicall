<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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
        'city',
        'mail_validation',
        'photo',
        'blood_group',
        'status',
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
    public function isPendingUser() {
        return $this->status==0;
    }
    public function isUser() {
        return $this->status==1;
    }
    public function isPendingDoctor() {
        return $this->status==2;
    }
    public function isBDMODoctor() {
        return $this->status==3;
    }
    public function isDoctor() {
        return $this->status==4;
    }
    public function isModerator() {
        return $this->status==5;
    }
    public function isAdmin() {
        return $this->status==6;
    }
    public function getRoleAttribute() {
        $role = 'User';
        switch ($this->status){
            case 1:
                $role = 'Patient';
                break;
            case 2:
                $role = 'Doctor (Mail Unverified)';
                break;
            case 3:
                $role = 'Doctor (BDMO Unverified)';
                break;
            case 4:
                $role = 'Doctor';
                break;
            case 5:
                $role = 'Moderator';
                break;
            case 6:
                $role = 'Admin';
                break;
            default:
                $role = 'Unverified';
        }
        return $role;
    }
    public function scopeUsers($query) {
        return $query->where('status', 0)->orWhere('status', 1);
    }

    public function scopeVerifiedUsers($query) {
        return $query->where('status', 1);
    }

    public function scopeDoctors($query) {
        return $query->where('status', 2)->orWhere('status', 3)->orWhere('status', 4);
    }

    public function scopeMailVerifiedDoctors($query) {
        return $query->where('status', 3);
    }
    public function scopeVerifiedDoctors($query) {
        return $query->where('status', 4);
    }

    public function appointmentsByPatient() {
        return $this->hasMany(Appointment::class, 'user_id');
    }

    public function appointmentsByDoctor() {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function prescriptionsByDoctor() {
        return $this->hasManyThrough(Prescription::class, Appointment::class, 'doctor_id');
    }
    public function prescriptionsForPatient() {
        return $this->hasManyThrough(Prescription::class, Appointment::class);
    }

    public function tags() {
        return $this->hasMany(UserTag::class);
    }

    public function category() {
        return $this->hasOne(UserCategory::class);
    }

    public function doctor() {
        return $this->hasOne(Doctor::class);
    }

    public function post(){
        return $this->hasMany(Post::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
