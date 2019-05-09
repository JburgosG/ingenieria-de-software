<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model {

    protected $fillable = [
        'name',
        'end_date',
        'end_hour',
        'start_date',
        'start_hour',
        'subject_id',
        'description'
    ];

}
