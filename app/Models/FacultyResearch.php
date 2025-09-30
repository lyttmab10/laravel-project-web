<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyResearch extends Model
{
    protected $table = 'faculty_research';
    
    protected $fillable = [
        'title',
        'type',
        'faculty_id',
        'image',
        'description'
    ];
    
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
