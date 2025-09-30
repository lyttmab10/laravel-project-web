<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni'; // Specify table name since 'alumni' is already plural
    
    protected $fillable = [
        'name',
        'position',
        'company',
        'role',
        'image',
        'graduation_year'
    ];
    
    protected $casts = [
        'graduation_year' => 'integer'
    ];
}
