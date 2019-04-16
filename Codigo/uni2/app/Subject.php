<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'teacher_id',
        'description'
    ];

    public function teacher() {
        return $this->belongsTo('App\User');
    }

    public function schedule(){
    	return $this->hasMany('App\Schedule_Subject', 'subject_id');
    }
}
