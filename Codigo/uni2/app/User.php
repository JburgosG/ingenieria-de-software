<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'photo',
        'email',
        'phone',
        'gender',
        'address',
        'password',
        'group_id',
        'birthdate',
        'identification',
        'identification_type_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function group() {
        return $this->belongsTo('App\Group');
    }

    public function identification_type() {
        return $this->belongsTo('App\Identification_type');
    }

    public function student() {
        return $this->hasOne('App\Student');
    }

    public function teacher() {
        return $this->hasOne('App\Teacher');
    }

    public function subjects() {
        return $this->hasMany('App\Student_Subject', 'student_id');
    }

    public function subjects_teacher() {
        return $this->hasMany('App\Subject', 'teacher_id');
    }

}
