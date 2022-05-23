<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_key',
        'exam_name',
        'duration',
        'start_from',
        'is_accessed_anytime',
        'is_accepting_responses',
        'professor_id',
        'subject_id',
        'department_id',
        'level_id',
        'is_dynamic',
        'created_at',
        'updated_at',
        'marks'

    ];
    
}
