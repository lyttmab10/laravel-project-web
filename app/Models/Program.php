<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'title',
        'duration',
        'description',
        'activity',
        'image',
        'date'
    ];
}
