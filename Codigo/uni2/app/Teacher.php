<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id',
        'specialty',
        'biography',
        'level_education_id'
    ];
    
    public function level_education() {
        return $this->belongsTo('App\Levels_education');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
