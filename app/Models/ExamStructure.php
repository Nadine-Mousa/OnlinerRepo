<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamStructure extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_key',
        'subject_id',
        'chapter_number',
        'difficulty'
    ];
    public function structure_difficulty() : BelongsTo
    {
        return $this->belongsTo(Difficulty::class, 'difficulty');
    }
    public function type_of_question() : BelongsTo
    {
        return $this->belongsTo(QuestionType::class, 'question_type');
    }
}
