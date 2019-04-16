<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_Type extends Model {

    protected $table = 'students_types';
    protected $fillable = [
        'name',
        'descriptcion'
    ];

}
