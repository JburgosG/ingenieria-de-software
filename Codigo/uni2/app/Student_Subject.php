<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_Subject extends Model
{
    protected $table = 'students_subjects';

    public function student() {
        return $this->belongsTo('App\User');
    }

    public function subject() {
        return $this->belongsTo('App\Subject');
    }
}
