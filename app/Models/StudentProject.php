<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProject extends Model
{
    protected $fillable = [
        'title',
        'student_name',
        'year',
        'image',
        'description'
    ];
    
    protected $casts = [
        'year' => 'integer'
    ];
}
