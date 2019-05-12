<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule_Subject extends Model
{
    public $timestamps = true;
    protected $table = 'schedules_subjects';

    protected $fillable = [
        'start_Time',
        'end_Time',
        'day_id',
        'subject_id'
    ];
    
    public function day() {
        return $this->belongsTo('App\Day');
    }
}
