<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    protected $fillable = [
        'eps',        
        'user_id',
        'type_id'        
    ];    

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function type() {
        return $this->belongsTo('App\Student_Type');
    }
}