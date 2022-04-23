<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamStructure extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_key',
        'subject_id',
        'chapter_number',
        'difficulty'
    ];
}
