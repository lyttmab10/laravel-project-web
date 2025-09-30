<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculty';
    
    protected $fillable = [
        'name',
        'position',
        'image'
    ];
    
    public function research()
    {
        return $this->hasMany(FacultyResearch::class);
    }
}
