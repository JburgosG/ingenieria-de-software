<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'name',
        'date',
        'image',
        'state_id',
        'important',
        'description'
    ];

    public function state() {
        return $this->belongsTo('App\State');
    }
}
