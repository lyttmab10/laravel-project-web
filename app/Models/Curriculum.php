<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curriculum';
    
    protected $fillable = [
        'degree_name_th',
        'degree_name_en', 
        'degree_abbr_th',
        'degree_abbr_en',
        'program_type',
        'duration_years',
        'credits',
        'language',
        'tuition_fee',
        'description',
        'curriculum_year',
        'pdf_url',
        'video_url'
    ];

    protected $casts = [
        'tuition_fee' => 'decimal:2',
        'duration_years' => 'integer',
        'credits' => 'integer'
    ];
}
