<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document_Subject extends Model
{
    protected $table = 'documents_subjects';

    protected $fillable = [
        'name',
        'type',
        'path',
        'subject_id'
    ];
}
